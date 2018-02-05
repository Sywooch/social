<?php
/**
 * Базовый контроллер содержит общие методы и параметры.
 *
 * @version 1.0
 */
namespace app\controllers;

use app\components\Registry;
use app\models\CommonImages;
use app\models\CompanyComment;
use app\models\CompanyCommentAnswer;
use app\models\CompanyCommentImage;
use app\models\Customer;
use app\models\InfoPage;
use app\models\RecoverForm;
use app\models\RegisterForm;
use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\Languages;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
$phpMailer = Yii::getAlias('@app/vendor/phpmailer/PHPMailer.php');
require_once($phpMailer);

class AbstractController extends Controller
{
    const DEFAULT_CITY = 4400;

    /**
     * Пользователь в регистрацие.
     */
    public $registration = false;

    /**
     * Сессия
     *
     * @var bool
     */
    public $session = false;

    /**
     * Пользователь.
     *
     * @var bool
     */
    public $user = false;

    /**
     * Тема.
     *
     * @var string
     */
    public $_theme = '';

    /**
     * Идентификатор сессия.
     *
     * @var
     */
    public $_sessionId;

    /**
     * Базовая инициализация.
     */
    public function init()
    {
        if (empty(\Yii::$app->session->get('language')) && function_exists('geoip_country_code_by_name')) {
            Registry::set('geoData', geoip_record_by_name($_SERVER['REMOTE_ADDR']), true);

            if (in_array(geoip_country_code_by_name($_SERVER['REMOTE_ADDR']), ['RU', 'UA'])) {
                \Yii::$app->session->set('language', 'ru');
            } else {
                \Yii::$app->session->set('language', 'en');
            }
        }

        Registry::set('countryID', 3159, true);

        if (\Yii::$app->session->get('user')) {
            $this->user = Customer::findOne(\Yii::$app->session->get('user')->id);
            $this->user->setDefaultsPrivate();

            Registry::set('user', $this->user, true);
        }

        if (\Yii::$app->session->get('registration')) {
            $this->registration = \Yii::$app->session->get('registration');
        }

        foreach (InfoPage::find()->all() as $page) {
            Yii::$app->view->params['pages'][$page->code] = $page;
        }

        $languages = Languages::find()
            ->select('languages.id, languages.code, languages_translation.name')
            ->joinWith('translation', false)
            ->asArray()
            ->all();

        Registry::set('languages', $languages, true);

        if (\Yii::$app->request->get('language')) {
            \Yii::$app->session->set('language', \Yii::$app->request->get('language'));
            return Yii::$app->getResponse()->redirect(strtok($_SERVER["REQUEST_URI"],'?'));
        }

        if (\Yii::$app->session->get('language')) {
            \Yii::$app->language = \Yii::$app->session->get('language');
        }
    }

    /**
     * Авторизация.
     *
     * @return array|Response
     */
    public function actionLogin()
    {
        if (!\Yii::$app->session->get('user')) {
            $model = new LoginForm();
            if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goHome();
            }

        }

        return $this->goHome();
    }

    /**
     * Регистрация.
     *
     * @return array|string
     */
    public function actionRegistration()
    {
        $model = new RegisterForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $customer = $model->register();

            $this->sendEmail(
                $model->email,
                Yii::$app->params['NewRegistrationSubject'],
                $this->renderPartial('emailTemplates/registration', ['customer' => $customer])
            );

            return $this->render(
                Yii::$app->controller->action->id,
                [
                    'customer' => $customer
                ]
            );
        }
    }

    /**
     * Подтверждение регистрации.
     *
     * @param $code
     *
     * @return string
     */
    public function actionRegistrationConfirm($code)
    {
        return $this->render(Yii::$app->controller->action->id, []);
    }

    /**
     * Восстановление пароля.
     *
     * @return array|string
     */
    public function actionRecover()
    {
        $model = new RecoverForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $newPassword = uniqid();

            $this->sendEmail(
                $model->email,
                Yii::$app->params['RecoverSubject'],
                $this->renderPartial('emailTemplates/recover', ['newPassword' => $newPassword])
            );

            return $this->render(
                Yii::$app->controller->action->id,
                [
                    'newPassword' => $newPassword
                ]
            );
        }
    }

    /**
     * Exit.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        \Yii::$app->session->remove('user');

        return $this->goHome();
    }

    /**
     * Отправляет почту.
     *
     * @param $email
     * @param $subject
     * @param $body
     */
    protected function sendEmail($email, $subject, $body)
    {
        $mailer = new \PHPMailer();
        $mailer->setFrom(Yii::$app->params['adminEmail']);
        $mailer->addAddress($email);
        $mailer->isHTML(true);

        $mailer->Subject = $subject;
        $mailer->Body = $body;
        if (!$mailer->send()) {
            error_log($mailer->ErrorInfo);
        }
    }

    /**
     * Добавление комментария компании.
     */
    protected function commentListen($companyID)
    {
        $comment = new CompanyComment();
        $answer = new CompanyCommentAnswer();

        $comment->companyID = $companyID;

        if ($answer->load(\Yii::$app->request->post()) && $answer->validate()) {
            $answer->save();
        }

        if ($comment->load(\Yii::$app->request->post()) && $comment->validate()) {
            $comment->save();

            $appPath = '/uploads/custom/' . md5(date('Y-m-d', time()));
            $path = Yii::getAlias('@webroot') . $appPath;
            if (!is_dir($path)) {
                BaseFileHelper::createDirectory($path);
            }

            $uploadPhotos = UploadedFile::getInstances($comment, 'image');

            if (!empty($uploadPhotos)) {
                foreach ($uploadPhotos as $file) {
                    $photo = md5($file->baseName) . '.' . $file->extension;
                    $file->saveAs($path . '/' . $photo);
                }

                $image = new CommonImages();
                $image->file = $appPath . '/' . $photo;
                $image->save();

                $commentImage = new CompanyCommentImage();
                $commentImage->attributes = [
                    'commentID' => $comment->id,
                    'imageID' => $image->id,
                ];
                $commentImage->save();
            }
        }
    }
}
