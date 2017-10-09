<?php
/**
 * Базовый контроллер сайта.
 *
 * @version 1.0
 */
namespace app\controllers;

use app\models\Country;
use app\models\Customer;
use app\models\CustomerInterests;
use app\models\CustomerLanguages;
use app\models\InfoPage;

use app\models\InterestCategory;
use app\models\Languages;
use app\models\RegisterForm;
use Yii;

use \BW\Vkontakte as Vk;
use yii\base\Model;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use Abraham\TwitterOAuth\TwitterOAuth;

use yii\web\Response;
use yii\widgets\ActiveForm;

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
        $countries = Country::find()
            ->select('country.id, country_translation.name')
            ->joinWith('translation', false)
            ->joinWith('cities', false)
            ->joinWith('cities.translation')
            ->asArray()->all();


        $countriesGroup = [];
        foreach ($countries as $country) {
            foreach ($country['cities'] as $city) {
                $countriesGroup[$city['id']] = $country['name'] . ', ' . $city['translation']['name'];
            }
        }

        return $this->render(Yii::$app->controller->action->id, compact('countriesGroup'));
    }

    /**
     * Второй шаг регистрации.
     */
    public function actionRegisterStepTwo()
    {
        $model = new RegisterForm();

        $birthday =  Yii::$app->request->post('b_year') . '-' . Yii::$app->request->post('b_month') . '-' . Yii::$app->request->post('b_day');
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            if (
                !empty(Yii::$app->request->post('b_day')) &&
                !empty(Yii::$app->request->post('b_month')) &&
                !empty(Yii::$app->request->post('b_year'))
            ) {
                $model->birthday = $birthday;
            }

            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->birthday = $birthday;
            $customer = $model->register();

            \Yii::$app->session->set('registration', [
                'customerID' => $customer->id,
                'step' => 'register-step-two'
            ]);
        }

        if (\Yii::$app->session->get('registration')) {
            $interestCategories = InterestCategory::find()
                ->joinWith('translation')
                ->joinWith('interests')
                ->joinWith('interests.translation')
                ->asArray()->all();

            $languages = Languages::find()
                ->joinWith('translation')
                ->asArray()->all();
            return $this->render(
                Yii::$app->controller->action->id,
                compact('interestCategories', 'languages')
            );
        }
    }

    /**
     * Завершение регистрации.
     *
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionRegisterComplete()
    {
        $customer = Customer::findOne($this->registration['customerID']);

        if (empty($customer))
            throw new \yii\web\NotFoundHttpException();

        if ($customer->load(\Yii::$app->request->post()) && $customer->validate()) {
            $customer->save();
        }

        if (\Yii::$app->request->post('interests')) {
            foreach (\Yii::$app->request->post('interests') as $interest) {
                $model = new CustomerInterests();
                $model->customerID = $this->registration['customerID'];
                $model->interestID = $interest;
                $model->save();
            }
        }

        if (\Yii::$app->request->post('language')) {
                $model = new CustomerLanguages();
                $model->customerID = $this->registration['customerID'];
                $model->languageID = Yii::$app->request->post('language');
                $model->save();
        }

        \Yii::$app->session->set('user', $customer);

        \Yii::$app->response->redirect('/profile');
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
