<?php

namespace app\controllers;

use app\models\Ads;
use app\models\Company;
use app\models\Customer;
use app\models\Interest;
use app\models\SearchForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use \BW\Vkontakte as Vk;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class SearchController extends AbstractController
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
     * Поиск заходит сюда, исходя из результата отображаем разные варианты поисковых страниц.
     *
     * @return string
     *
     * @throws NotFoundHttpException
     */
    public function actionIndex()
    {
        $post = \Yii::$app->request->post('SearchForm');

        if (empty($post))
            throw new NotFoundHttpException();

        switch ($post['cityCheckbox']) {
            case '0':
                if (empty($this->user)) {
                    $post['city'] = self::DEFAULT_CITY;
                } else {
                    $post['city'] = $this->user->cityID;
                }
                break;
            case '1':
                break;
            default:
                $post['city'] = self::DEFAULT_CITY;
                break;
        }

        $searchResult = $this->getSearchResults($post);

        list($interestCategoriesAds, $countriesGroup) = Interest::loadAdsData();

        list($interestCategoriesCompany, $countriesGroup) = Company::loadCompanyData();

        return $this->render(Yii::$app->controller->action->id,
            ArrayHelper::merge(
                ['interestCategoriesAds' => $interestCategoriesAds, 'interestCategoriesCompany' => $interestCategoriesCompany, 'countriesGroup' => $countriesGroup],
                $searchResult
            )
        );
    }

    /**
     * Возвращает поисковые параметры.
     *
     * @param array $params
     *
     * @return array
     */
    protected function getSearchResults($params = [])
    {
        $result = [
            'users' => false,
            'ads' => false,
            'companies' => false,
        ];

        if (is_array($params['type'])) {
            foreach ($params['type'] as $type) {
                $result[$type] = SearchForm::searchByParams($type, $params);
            }
//            var_dump($result); exit;
            return $result;
        }

        if ($params['type'] == SearchForm::ALL_TYPE) {
            $result ['users'] = Customer::searchByParams($params);
            $result ['ads'] = Ads::searchByParams($params);
            $result ['companies'] = Company::searchByParams($params);

            return $result;
        }

        $result[$params['type']] = SearchForm::searchByParams($params['type'], $params);

        return $result;
    }
}
