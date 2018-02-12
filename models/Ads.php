<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ads".
 *
 * @property string $id
 * @property string $customerID
 * @property string $title
 * @property string $data
 * @property string $cityID
 * @property string $sex
 * @property string $date
 * @property string $content
 * @property string $timeCreate
 * @property string $interestsArray
 * @property string $sortDate
 * @property string $views
 * @property string $active
 *
 * @property AdsInterests[] $adsInterests
 */
class Ads extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;

    const STATUS_NOT_ACTIVE = 0;

    public $interestsArray;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerID', 'title', 'data', 'sex', 'content', 'interestsArray'], 'required'],
//            [['cityID'], 'integer'],
            [['sex', 'content'], 'string'],
            [['date', 'timeCreate', 'sortDate', 'views', 'cityID'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customerID' => Yii::t('app', 'Пользователь'),
            'title' => Yii::t('app', 'Заголовок'),
            'data' => Yii::t('app', 'Мои данные'),
            'interestsArray' => Yii::t('app', 'Интересы'),
            'cityID' => Yii::t('app', 'Расположение'),
            'sex' => Yii::t('app', 'С кем'),
            'date' => Yii::t('app', 'Когда'),
            'content' => Yii::t('app', 'Текст объявления'),
            'timeCreate' => Yii::t('app', 'Создан'),
            'sortDate' => Yii::t('app', 'Сортировка'),
            'views' => Yii::t('app', 'Просмотры'),
            'active' => Yii::t('app', 'Активен'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'cityID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interest::className(), ['id' => 'interestID'])
            ->viaTable('ads_interests', ['adsID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipants()
    {
        return $this->hasMany(Customer::className(), ['id' => 'participantID'])
            ->viaTable('ads_participant', ['adsID' => 'id']);
    }

    /**
     * @return int|string
     */
    public function getParticipantsCount()
    {
        return AdsParticipant::find()->where('adsID = :thisID', [':thisID' => $this->id])->count();
    }

    /**
     * @param $userId
     *
     * @return int|string
     */
    public function isParticipant($userId)
    {
        return AdsParticipant::find()->where('adsID = :thisID AND participantID = :participantID', [':thisID' => $this->id, ':participantID' => $userId])->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customerID']);
    }

    /**
     * Типы состава.
     *
     * @return array
     */
    public static function getSexTypes()
    {
        return [
            'M' => 'Мужчина',
            'F' => 'Женщина',
            'C' => 'Компания',
        ];
    }

    /**
     * Меняет статус обьявления.
     *
     * @param $id
     * @param $status
     */
    public static function changeStatus($id, $status)
    {
        $model = self::findOne($id);

        $model->active = $status;
        $model->save(false);
    }

    /**
     * Возвращает место записи в общем списке.
     *
     * @return int|string
     */
    public function getPosition()
    {
        // считаем количество строк по убыванию до даты нашей записи
        return self::find()
            ->where(['>=', 'sortDate', $this->sortDate])
            ->orderBy('sortDate DESC')
            ->count();
    }

    /**
     * Выполняет поиск обьявлений по парамтрам.
     *
     * @param array $params
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function searchByParams($params = [])
    {
        $query = self::find()->with('interests')
            ->where(['like', 'title', $params['text']])
            ->andWhere(['or',
                ['cityID' => $params['city']],
                ['cityID' => NULL]
            ]);

        if (!empty($params['interest'])) {
            $query->joinWith('interests')->andFilterWhere(['in','interest.id', $params['interest']]);
        }

        if (!empty($params['sex'])) {
            $query->andFilterWhere(['=', 'sex', $params['sex']]);
        }

        if (!empty($params['date']) && $params['date'] == 1) {
                $query->andFilterWhere(['like', 'date', $params['date_year'] . '-' . $params['date_month'] . '-' . $params['date_day']]);
        }

        if (!empty($params['sort'])) {
                $query->orderBy($params['sort'] . ' desc');
        }

        return $query->all();
    }
}
