<?php

namespace app\models;

use app\components\Registry;
use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $id
 * @property string $language
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
            [['id'], 'required'],
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
    public function getAreas()
    {
        return $this->hasMany(Area::className(), ['countryId' => 'id']);
    }
}
