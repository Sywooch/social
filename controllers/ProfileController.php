<?php

namespace app\controllers;

use app\models\CustomerComment;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use \BW\Vkontakte as Vk;

class ProfileController extends AbstractController
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

    public function actionIndex()
    {
        return $this->render(Yii::$app->controller->action->id, []);
    }

    public function actionLoadComment()
    {
        $query = CustomerComment::find()
            ->where(['customerID' => $this->user->id]);

        $countQuery = clone $query;
        $pages = new Pagination([
                'totalCount' => $countQuery->count(),
                'pageSize' => Yii::$app->params['imagePerPageMain'],
                'defaultPageSize' => Yii::$app->params['imagePerPageMain']
            ]
        );

        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        echo $this->renderPartial($this->_theme . 'ajax-image-load', ['posts' => $posts]);
        Yii::$app->end();
    }
}
