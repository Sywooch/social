<?php
/**
 * Базовый контроллер содержит общие методы и параметры.
 *
 * @version 1.0
 */
namespace app\controllers;

use app\components\Registry;
use app\models\InfoPage;
use app\models\RecoverForm;
use app\models\RegisterForm;
use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use yii\web\Response;
use yii\widgets\ActiveForm;

$phpMailer = Yii::getAlias('@app/vendor/phpmailer/PHPMailer.php');
require_once($phpMailer);

class AbstractController extends Controller
{
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
        if (\Yii::$app->session->get('user')) {
            $this->user = \Yii::$app->session->get('user');
            Registry::set('user', $this->user);
        }

        if (\Yii::$app->session->get('registration')) {
            $this->registration = \Yii::$app->session->get('registration');
        }

        foreach (InfoPage::find()->all() as $page) {
            Yii::$app->view->params['pages'][$page->code] = $page;
        }

        if (!empty($this->user->id)) {
            // Заходит авторизированый пользователь.

        } else {
            // Заходит гость.

        }

        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => 'Главная',
            'url' => ['/']
        ];
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
}
