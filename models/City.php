<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property string $id
 * @property string $countryId
 * @property string $language
 * @property integer $name
 *
 * @property Country $country
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['countryId', 'name'], 'required'],
            [['countryId', 'name'], 'integer'],
            [['language'], 'string', 'max' => 5],
            [['countryId'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['countryId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countryId' => 'Country ID',
            'language' => 'Language',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslation()
    {
        return $this->hasOne(CityTranslation::className(), ['sourceID' => 'id'])
            ->andOnCondition(['city_translation.language' => \Yii::$app->language]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'countryId']);
    }
}
