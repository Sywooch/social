<?php

namespace app\controllers;

use app\models\Ads;
use app\models\AdsInterests;
use app\models\CommonImages;
use app\models\Country;
use app\models\Customer;
use app\models\CustomerComment;
use app\models\CustomerCommentAnswer;
use app\models\CustomerCommentImage;
use app\models\InterestCategory;
use app\models\Messages;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use \BW\Vkontakte as Vk;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
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

    /**
     * Кабинет, Моя страница.
     *
     * @return string
     */
    public function actionIndex()
    {
        $comment = new CustomerComment();
        $answer = new CustomerCommentAnswer();

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

                $commentImage = new CustomerCommentImage();
                $commentImage->attributes = [
                    'commentID' => $comment->id,
                    'imageID' => $image->id,
                ];
                $commentImage->save();
            }
        }

        $query = CustomerComment::find()
            ->where(['customerID' => $this->user->id])
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

        return $this->render(Yii::$app->controller->action->id,
            compact('comments', 'pages'));
    }

    public function actionUser($id)
    {
        $customer = Customer::findOne($id);
        if (empty($customer))
            throw new \yii\web\NotFoundHttpException();

        return $this->render(Yii::$app->controller->action->id, compact('customer'));
    }

    /**
     * Подгрузка коментариев.
     */
    public function actionLoadComment()
    {
        $query = CustomerComment::find()
            ->where(['customerID' => $this->user->id])
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

        echo $this->renderPartial(Yii::$app->controller->action->id, compact('comments'));
        Yii::$app->end();
    }

    /**
     * Кабинет, Мои сообщения.
     *
     * @return string
     */
    public function actionMessages()
    {
        $query = Messages::find()
            ->where(['receiverID' => $this->user->id])
            ->orWhere(['senderID' => $this->user->id])
            ->with('sender')
            ->with('sender.mainImage')
            ->orderBy('date desc');

        $customDate = date('d-m-Y', strtotime("-1 month")) . ' - ' . date('d-m-Y', time());
        $filterDate = \Yii::$app->request->get('date', $customDate);
        if ($filterDate) {
            $filterDate = explode(' - ', $filterDate);
            $query->andWhere('date >= :dateFrom', [':dateFrom' => date('Y-m-d 00:00:00', strtotime($filterDate[0]))]);
            $query->andWhere('date <= :dateEnd', [':dateEnd' => date('Y-m-d 23:59:59', strtotime($filterDate[1]))]);
        }

        if (Yii::$app->request->get('text')) {
            $query->andWhere(['like', 'text', Yii::$app->request->get('text')]);
        }

        $messages = $query->asArray()->all();

        $groups = $this->groupMessages($messages);

        return $this->render(Yii::$app->controller->action->id, compact('groups', 'customDate'));
    }

    /**
     * Диалог с пользователем.
     *
     * @param $id
     *
     * @return string
     */
    public function actionDialog($id)
    {
        $message = Messages::findOne($id);

        // Определяет получателя.
        $receiver = array_diff([$message->senderID, $message->receiverID], [$this->user->id]);
        $receiverID = end($receiver);

        $model = new Messages();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
        }

        $dialog = Messages::find()
            ->where(['receiverID' => [$message->senderID, $message->receiverID]])
            ->orWhere(['senderID' => [$message->senderID, $message->receiverID]])
            ->with('sender')
            ->with('sender.mainImage')
            ->orderBy('date asc')
            ->asArray()
            ->all();

        // Отмечаем свои не прочитаные сообщения.
        if ($message->receiverID == $this->user->id) {
            Messages::updateAll(
                ['flag' => Messages::READ],
                ['and', ['=', 'receiverID', $this->user->id], ['!=', 'flag', Messages::READ]]
            );
        }

        return $this->render(Yii::$app->controller->action->id, compact('dialog', 'receiverID'));
    }

    /**
     * Выполняет групировку по диалогам.
     *
     * @param $messages
     *
     * @return array
     */
    private function groupMessages($messages)
    {
        $groups = [];

        foreach ($messages as $message)
        {
            $keys = [$message['senderID'], $message['receiverID']];
            asort($keys);

            $groups[implode($keys)][] = $message;
        }

        return $groups;
    }

    /**
     * Кабинет, Мои объявления
     *
     * @return string
     */
    public function actionAds($id)
    {
        return $this->render(Yii::$app->controller->action->id, []);
    }

    /**
     * Кабинет, Мои объявления создаие обьявления.
     *
     * @return string
     */
    public function actionCreateAds()
    {
        $createModel = new Ads();

        if ($createModel->load(\Yii::$app->request->post()) && $createModel->validate()) {
            $createModel->save();

            foreach ($createModel->interestsArray as $interest) {
                $interestModel = new AdsInterests();
                $interestModel->interestID = $interest;
                $interestModel->adsID = $createModel->id;
                $interestModel->save();
            }

            switch (\Yii::$app->request->post('location')) {
                case 'null':
                    $createModel->city = null;
                    break;
                default:
                    break;
            }

            $date =  \Yii::$app->request->post('date_year') . '-' . Yii::$app->request->post('date_month') . '-' . Yii::$app->request->post('date_day');
            switch (\Yii::$app->request->post('date')) {
                case '1':
                    $createModel->date = $date;
                    break;
                default:
                    $createModel->date = null;
                    break;
            }
            $createModel->save();

            \Yii::$app->response->redirect('/profile/ads/' . $createModel->id);
        }

        $interestCategories = InterestCategory::find()
            ->joinWith('translation')
            ->joinWith('interests')
            ->joinWith('interests.translation')
            ->asArray()->all();

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

        return $this->render(Yii::$app->controller->action->id, compact('createModel', 'interestCategories', 'countriesGroup'));
    }

    /**
     * Кабинет, Мои друзья
     *
     * @return string
     */
    public function actionFriends()
    {
        return $this->render(Yii::$app->controller->action->id, []);
    }

    /**
     * Кабинет, Мои компании
     *
     * @return string
     */
    public function actionCompanies()
    {
        return $this->render(Yii::$app->controller->action->id, []);
    }
}
