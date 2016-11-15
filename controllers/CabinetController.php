<?php
/**
 *
 *
 * @version 1.0
 */
namespace app\controllers;

use app\models\Customer;
use app\models\User;
use Yii;
use app\models\Category;
use app\models\LoginForm;
use \BW\Vkontakte as Vk;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
class CabinetController extends AbstractController
{
    public $layout = 'main';

    public $facebook;

    public $vk;

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

    public function init()
    {
        parent::init();

        $this->facebook = new \Facebook\Facebook([
            'app_id' => Yii::$app->params['social']['facebook']['id'],
            'app_secret' => Yii::$app->params['social']['facebook']['secret'],
        ]);

        $this->vk = new Vk([
            'client_id' => Yii::$app->params['social']['vk']['id'],
            'client_secret' => Yii::$app->params['social']['vk']['secret'],
            'redirect_uri' => 'http://' . Yii::$app->getRequest()->serverName . '/social/vk',
        ]);

        Yii::$app->view->params['vk'] = $this->vk;
        Yii::$app->view->params['facebook'] = $this->facebook;
        Yii::$app->view->params['user'] = $this->user;

        Yii::$app->view->params['categories'] = Category::find()
            ->where(['isActive' => 1])
            ->andWhere(['level' => 0])
            ->orderBy('sortOrder', SORT_DESC)
            ->all();

        Yii::$app->view->params['login'] = new LoginForm();

        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => ' Мой кабинет',
            'url' => ['/cabinet']
        ];
    }

    /**
     * Главная.
     *
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => ' Личные данные',
            'url' => ['/cabinet']
        ];

        return $this->render(Yii::$app->controller->action->id, [
        ]);
    }

    public function actionChange()
    {
        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => ' Личные данные',
            'url' => ['/cabinet']
        ];

        $model = Customer::findOne($this->user->id);
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->address->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return array_merge(ActiveForm::validate($model), ActiveForm::validate($model->address));
        }

        if (
            $model->load(Yii::$app->request->post()) && $model->validate() &&
            $model->address->load(Yii::$app->request->post()) && $model->address->validate()
        ) {
            $model->save();
            $model->address->save();
            \Yii::$app->session->set('user', $model);
        }

        return $this->render(Yii::$app->controller->action->id, [
        ]);
    }

    public function actionViewed()
    {
        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => ' Просмотренные товары',
            'url' => false
        ];

        $models = $this->getLastViewListProduct();
        $totalAmount = 0;

        foreach ($models as $model) {
            $totalAmount+= $model->realPrice;
        }

        return $this->render(Yii::$app->controller->action->id, [
            'totalAmount' => $totalAmount,
            'productsCount' => count($models),
            'viewProductList' => array_chunk($models, 5),
        ]);
    }

    public function actionOrders()
    {
        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => ' Мои заказы',
            'url' => false
        ];

        return $this->render(Yii::$app->controller->action->id, [
        ]);
    }

    public function actionWaitingList()
    {
        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => ' Лист ожидания',
            'url' => false
        ];

        return $this->render(Yii::$app->controller->action->id, [
        ]);
    }

    public function actionBasket()
    {
        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => ' Корзина',
            'url' => false
        ];

        return $this->render(Yii::$app->controller->action->id, [
        ]);
    }

    public function actionWishList()
    {
        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => ' Список желаний',
            'url' => false
        ];

        $model = Customer::findOne($this->user->id);
        $models = $model->wishProducts;
        $totalAmount = 0;

        foreach ($models as $model) {
            $totalAmount+= $model->realPrice;
        }

        return $this->render(Yii::$app->controller->action->id, [
            'totalAmount' => $totalAmount,
            'productsCount' => count($models),
            'wishProducts' => array_chunk($models, 5),
        ]);
    }

    public function actionOrderProcess()
    {
        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => ' Оформление заказа',
            'url' => false
        ];

        if (empty($this->_basket->basketProducts))
            throw new \yii\web\NotFoundHttpException();

        return $this->render(Yii::$app->controller->action->id, [
        ]);
    }

    public function actionOrderComplete()
    {
        Yii::$app->view->params['breadcrumbs'][] = [
            'template' => "<li>{link}</li>\n",
            'label' => ' Cпасибо за ваш заказ!',
            'url' => false
        ];

        if (empty($this->_basket->basketProducts))
            throw new \yii\web\NotFoundHttpException();

        return $this->render(Yii::$app->controller->action->id, [
        ]);
    }
}
