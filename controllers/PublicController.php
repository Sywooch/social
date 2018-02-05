<?php

namespace app\controllers;

use app\models\Ads;
use app\models\Company;
use app\models\CompanyComment;
use app\models\CompanyCommentImage;
use app\models\Customer;
use app\models\Messages;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\CustomerComment;
use yii\data\Pagination;

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

    public function actionProfile($id)
    {
        $item = Customer::findOne($id);

        if (empty($item))
            throw new NotFoundHttpException();

        $this->customerCommentListen($id);

        $model = new Messages();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            \Yii::$app->session->setFlash('messageSend', true);
            $model->save();
        }

        $query = CustomerComment::find()
            ->where(['customerID' => $id])
            ->with('customer')
            ->with('customer.mainImage')
            ->with('images')
            ->with('answers')
            ->with('answers.customer')
            ->with('answers.customer.mainImage');

        $countQuery = clone $query;
        $pages = new Pagination([
                'totalCount' => $countQuery->count(),
                'pageSize' => Yii::$app->params['commentsOnPage'],
                'defaultPageSize' => Yii::$app->params['commentsOnPage']
            ]
        );

        $comments = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->all();

        return $this->render(\Yii::$app->controller->action->id, compact('item','comments', 'pages'));
    }

    public function actionAds($id)
    {
        $item = Ads::findOne($id);

        if (empty($item))
            throw new NotFoundHttpException();

        return $this->render(\Yii::$app->controller->action->id, compact('item'));
    }

    public function actionCompany($id)
    {
        $item = Company::findOne($id);

        if (empty($item))
            throw new NotFoundHttpException();

        $this->companyCommentListen($id);

        $query = CompanyComment::find()
            ->where(['companyID' => $id])
            ->with('images')
            ->with('answers')
            ->with('customer')
            ->with('customer.mainImage')
            ->with('answers.customer')
            ->with('answers.customer.mainImage')
            ->orderBy('date DESC')
        ;

        $countQuery = clone $query;
        $pages = new Pagination([
                'totalCount' => $countQuery->count(),
                'pageSize' => Yii::$app->params['commentsOnPage'],
                'defaultPageSize' => Yii::$app->params['commentsOnPage']
            ]
        );

        $comments = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->all();

        return $this->render(\Yii::$app->controller->action->id, compact('item', 'comments', 'pages'));
    }
}
