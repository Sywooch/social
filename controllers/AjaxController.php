<?php
/**
 * Контроллер AJAX обращений.
 */
namespace app\controllers;

use app\models\AdsParticipant;
use app\models\CompanyParticipant;
use app\models\CustomerFriend;
use app\models\CustomerImage;
use Yii;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;

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
