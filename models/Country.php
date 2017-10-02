<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $id
 * @property string $language
 * @property string $name
 *
 * @property City[] $cities
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslation()
    {
        return $this->hasOne(CountryTranslation::className(), ['sourceID' => 'id'])
            ->andOnCondition(['country_translation.language' => \Yii::$app->language]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['countryId' => 'id']);
    }
}
