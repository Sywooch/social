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
 * @property string $city
 * @property string $sex
 * @property string $date
 * @property string $content
 * @property string $timeCreate
 * @property string $interestsArray
 * @property string $active
 *
 * @property AdsInterests[] $adsInterests
 */
class Ads extends \yii\db\ActiveRecord
{
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
            [['city'], 'integer'],
            [['sex', 'content'], 'string'],
            [['date', 'timeCreate'], 'safe'],
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
            'city' => Yii::t('app', 'Расположение'),
            'sex' => Yii::t('app', 'С кем'),
            'date' => Yii::t('app', 'Когда'),
            'content' => Yii::t('app', 'Текст объявления'),
            'timeCreate' => Yii::t('app', 'Создан'),
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
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customerID']);
    }

    /**
     * Типы состава.
     *
     * @return array
     */
    public function getSexTypes()
    {
        return [
            'M' => 'Мужчина',
            'F' => 'Женщина',
            'C' => 'Компания',
        ];
    }
}
