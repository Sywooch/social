<?php
/**
 * Контроллер AJAX обращений.
 */
namespace app\controllers;

use app\components\Mailer;
use app\components\Registry;
use app\models\AdsParticipant;
use app\models\Area;
use app\models\City;
use app\models\CompanyParticipant;
use app\models\ContactForm;
use app\models\Country;
use app\models\CustomerFriend;
use app\models\CustomerImage;
use app\models\Interest;
use app\models\RestoreForm;
use app\models\SupportForm;
use Yii;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\widgets\ActiveForm;

class AjaxController extends AbstractController
{
    /**
     * Пост данные.
     *
     * @var
     */
    private $_post;

    /**
     * Базовая инициализация.
     *
     * @throws \yii\web\NotFoundHttpException
     */
    public function init()
    {
        parent::init();

        if (!Yii::$app->request->isAjax) {
            throw new \yii\web\NotFoundHttpException();
        }

        $this->_post = Yii::$app->request->post();

        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    public function actionSupportValidation()
    {
        $model = new SupportForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {

            return ActiveForm::validate($model);
        }
    }

    /**
     * Валидация формы восстановления
     *
     * @return array
     */
    public function actionRestoreValidation()
    {
        $model = new RestoreForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $errors = ActiveForm::validate($model);
            end($errors);

            return ['restoreform-captcha' => array_shift($errors)];
        }
    }

    /**
     * Валидация формы контакта.
     *
     * @return array
     */
    public function actionContactValidation()
    {
        $model = new ContactForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {

            return ActiveForm::validate($model);
        }
    }

    public function actionSupport()
    {
        $model = new SupportForm();
        if ($model->load(Yii::$app->request->post())) {
            Mailer::sendMail([
                'from' => $model->email,
                'fromName' => $model->name,
                'to' => Yii::$app->params['adminEmail'],
                'subject' => Yii::$app->params['mailSubject']['support'],
                'body' => $this->renderPartial('templates/support', ['model' => $model]),
            ]);

            \Yii::$app->session->setFlash('messageSend', true);

            return [];
        }
    }

    /**
     * Отправка по контакту.
     *
     * @return array
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            Mailer::sendMail([
                'from' => Yii::$app->params['adminEmail'],
                'fromName' => Yii::$app->params['adminEmail'],
                'to' => Yii::$app->params['adminEmail'],
                'subject' => Yii::$app->params['mailSubject']['contact'],
                'body' => $this->renderPartial('templates/contact', ['text' => $model->text]),
            ]);

            return [];
        }
    }

    /**
     * Восстановление пароля.
     *
     * @return array
     */
    public function actionRestore()
    {
        $model = new RestoreForm();

        if ($model->load(Yii::$app->request->post())) {
            $customer = $model->passwordRestore();

            Mailer::sendMail([
               'from' => Yii::$app->params['adminEmail'],
               'fromName' => Yii::$app->params['adminEmail'],
               'to' => $customer->email,
               'subject' => Yii::$app->params['mailSubject']['restore'],
               'body' => $this->renderPartial('templates/restore', ['password' => $customer->newPassword]),
            ]);

            return ['email' => $customer->email];
        }
    }

    public function actionGetJsonList()
    {
        Yii::$app->response->format = Response::FORMAT_HTML;

        // Страны
        if (empty($this->_post['country']) && empty($this->_post['area']) && empty($this->_post['city'])) {
            $query = Country::find()
                ->select('country.id, country_translation.name, country.sort')
                ->joinWith('translation', false)
                ->orderBy('country.sort desc, country_translation.name');

            if (!empty($this->_post['search']))
                $query->where(['like', 'country_translation.name', $this->_post['search'] . '%', false]);

            $countries = $query->asArray()->all();
            return $this->renderPartial('templates/country-selector', compact('countries'));
        }

        // Областя
        if (!empty($this->_post['country']) && empty($this->_post['area']) && empty($this->_post['city'])) {
            $country = Country::findOne($this->_post['country']);

            $query = Area::find()
                ->select('area.id, area_translation.name, area.sort')
                ->where(['area.countryId' => $this->_post['country']])
                ->joinWith('translation', false)
                ->orderBy('area.sort desc, area_translation.name');

            if (!empty($this->_post['search']))
                $query->andWhere(['like', 'area_translation.name', $this->_post['search'] . '%', false]);

            $areas = $query->asArray()->all();
            return $this->renderPartial('templates/area-selector', compact('country', 'areas'));
        }

        // Города
        if (empty($this->_post['country']) && !empty($this->_post['area']) && empty($this->_post['city'])) {
            $area = Area::findOne($this->_post['area']);

            $query = City::find()
                ->select('city.id, city_translation.name, city.sort')
                ->where(['city.areaId' => $this->_post['area']])
                ->joinWith('translation', false)
                ->orderBy('city.sort desc, city_translation.name');

            if (!empty($this->_post['search']))
                $query->andWhere(['like', 'city_translation.name', $this->_post['search'] . '%', false]);

            $cities = $query->asArray()->all();
            return $this->renderPartial('templates/city-selector', compact('area', 'cities'));
        }
    }

    /**
     * Поиск по интересам.
     */
    public function actionInterestSearch()
    {
        $interest = Interest::find()->select('interest.id, interest_category.id as cid, interest_translation.name')
            ->joinWith('category', false)
            ->joinWith('translation', false)
            ->where(['like', 'interest_translation.name', $this->_post['search'] . '%', false])
            ->asArray()->all();

        return $interest;
    }

    /**
     * Подписка компании.
     */
    public function actionCompanyInvite()
    {
        $model = new CompanyParticipant();

        $model->companyID = $this->_post['companyID'];
        $model->participantID = $this->_post['participantID'];

        $model->save();

        return [];
    }

    /**
     * Подписка.
     */
    public function actionAdsInvite()
    {
        $model = new AdsParticipant();

        $model->adsID = $this->_post['adsID'];
        $model->participantID = $this->_post['participantID'];

        $model->save();

        return [];
    }

    /**
     * Отписка.
     */
    public function actionAdsUnsubscribe()
    {
        AdsParticipant::deleteAll('adsID = :adsID AND participantID = :participantID', [
            ':adsID' => $this->_post['adsID'],
            ':participantID' => $this->_post['participantID']
        ]);

        return [];
    }

    /**
     *
     */
    public function actionFriendInvite()
    {
        $model = new CustomerFriend();

        $model->customerID = $this->_post['customerID'];
        $model->friendID = $this->_post['friendID'];

        $model->save();

        $model = new CustomerFriend();

        $model->customerID = $this->_post['friendID'];
        $model->friendID = $this->_post['customerID'];

        $model->save();

        return [];
    }

    /**
     * Загрузка картинки c регистрации.
     *
     * @return string
     */
    public function actionImageUpload()
    {
        $image = new CustomerImage();

        return $this->uploadImage($image, [
            'customerID' => $this->registration['customerID'],
            'date' => date('Y-m-d H:i:s', time()),
            'isMain' => true,
        ]);
    }

    /**
     * Загрузка картинки c профиля.
     *
     * @return string
     */
    public function actionImageUploadProfile()
    {
        $image = new CustomerImage();

        return $this->uploadImage($image, [
            'customerID' => $this->user->id,
            'date' => date('Y-m-d H:i:s', time()),
            'isMain' => false,
        ]);
    }

    /**
     * Выполняет загрузку картинки.
     *
     * @param $model
     * @param array $params
     *
     * @return array
     */
    private function uploadImage($model, $params = [])
    {
        foreach ($params as $key => $param) {
            $model->{$key} = $param;
        }

        if ($model->validate()) {
            $model->save();
            $path = Yii::getAlias('@webroot') . '/uploads/' . $params['customerID'];
            if (!is_dir($path)) {
                BaseFileHelper::createDirectory($path);
            }
            $uploadPhotos = UploadedFile::getInstances($model, 'image');

            if (!empty($uploadPhotos)) {
                foreach ($uploadPhotos as $file) {
                    $photo = md5($file->baseName) . '.' . $file->extension;
                    $file->saveAs($path . '/' . $photo);
                }
            }
            $model->file = $photo;
            $model->save();

            return [$photo];
        }

        return $model->getErrors();
    }
}
