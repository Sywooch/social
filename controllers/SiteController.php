<?php
/**
 * Базовый контроллер сайта.
 *
 * @version 1.0
 */
namespace app\controllers;

use app\models\InfoPage;

use Yii;

use \BW\Vkontakte as Vk;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use Abraham\TwitterOAuth\TwitterOAuth;

class SiteController extends AbstractController
{
    /**
     * Шаблон по умолчанию.
     *
     * @var string
     */
    public $layout = 'main';

    /**
     * Авторизации facebook.
     *
     * @var
     */
    public $facebook;

    /**
     * Авторизации Twitter.
     *
     * @var
     */
    public $twitter;

    /**
     * Авторизация ВК.
     *
     * @var
     */
    public $vk;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Базовая инициализация.
     */
    public function init()
    {
        parent::init();

        $this->twitter = new TwitterOAuth(
            Yii::$app->params['social']['twitter']['CONSUMER_KEY'],
            Yii::$app->params['social']['twitter']['CONSUMER_SECRET'],
            Yii::$app->params['social']['twitter']['access_token'],
            Yii::$app->params['social']['twitter']['access_token_secret']
        );

        $this->facebook = new \Facebook\Facebook([
            'app_id' => Yii::$app->params['social']['facebook']['id'],
            'app_secret' => Yii::$app->params['social']['facebook']['secret'],
        ]);

        $this->vk = new Vk([
            'client_id' => Yii::$app->params['social']['vk']['id'],
            'client_secret' => Yii::$app->params['social']['vk']['secret'],
            'scope' => ['email'],
            'redirect_uri' => 'http://' . Yii::$app->getRequest()->serverName . '/social/vk',
        ]);

        Yii::$app->view->params['vk'] = $this->vk;
        Yii::$app->view->params['facebook'] = $this->facebook;
        Yii::$app->view->params['twitter'] = $this->twitter;
        Yii::$app->view->params['user'] = $this->user;

        Yii::$app->view->params['login'] = new LoginForm();
    }

    /**
     * Главная.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render(Yii::$app->controller->action->id, []);
    }

    /**
     * Страничка авторизации/регистрации.
     *
     * @return string
     */
    public function actionEnter()
    {
        return $this->render(Yii::$app->controller->action->id, []);
    }

    public function actionSearch()
    {
        $search = \Yii::$app->request->get('s');

        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => " Поиск по \"{$search}\"",
            'url' => false
        ];

        return $this->render(Yii::$app->controller->action->id, [
            'value' => " Поиск по \"{$search}\"",
        ]);
    }

    public function actionStatic($url)
    {
        $page = InfoPage::find()->where(['code' => $url])->one();

        if (empty($page))
            throw new \yii\web\NotFoundHttpException();

        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => " {$page->title}",
            'url' => false
        ];

        return $this->render(Yii::$app->controller->action->id, [
            'page' => $page
        ]);
    }

    public function actionSubscribe()
    {

    }

    public function actionSubscribeApprove($code)
    {

    }

    public function actionDeactivationSubscribe($id)
    {

    }
}
