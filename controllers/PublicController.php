<?php

namespace app\controllers;

use app\models\Ads;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use \BW\Vkontakte as Vk;
use yii\web\NotFoundHttpException;

class PublicController extends AbstractController
{
    public $layout = 'main';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    public function init()
    {
        parent::init();

        if (empty($this->user->id)) {
            \Yii::$app->response->redirect('/');
        }

        $facebook = new \Facebook\Facebook([
            'app_id' => Yii::$app->params['social']['facebook']['id'],
            'app_secret' => Yii::$app->params['social']['facebook']['secret'],
        ]);

        $vk = new Vk([
            'client_id' => Yii::$app->params['social']['vk']['id'],
            'client_secret' => Yii::$app->params['social']['vk']['secret'],
            'redirect_uri' => 'http://' . Yii::$app->getRequest()->serverName . '/social/vk',
        ]);

        Yii::$app->view->params['vk'] = $vk;
        Yii::$app->view->params['facebook'] = $facebook;
        Yii::$app->view->params['user'] = $this->user;
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
    }

    public function actionAds($id)
    {
        $item = Ads::findOne($id);

        if (empty($item))
            throw new NotFoundHttpException();

        return $this->render(\Yii::$app->controller->action->id, compact('item'));
    }
}
