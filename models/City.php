<?php

namespace app\models;

use app\components\Registry;
use Yii;

/**
 * This is the model class for table "city".
 *
 * @property string $id
 * @property string $areaId
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
            [['areaId'], 'required'],
            [['areaId'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['areaId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'areaId' => 'Country ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslation()
    {
        $translation = $this->hasOne(CityTranslation::className(), ['sourceID' => 'id'])
            ->andOnCondition(['city_translation.language' => \Yii::$app->language]);

        if (empty($translation->name))
            $translation = $this->hasOne(CityTranslation::className(), ['sourceID' => 'id']);

        return $translation;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'areaId']);
    }

    /**
     * Возвращает групировку по городам.
     *
     * @return array
     */
    public function getCountriesGroup()
    {
        $countriesGroup = [];

        $data = self::find()
            ->select('city.id, country_translation.name as country, city_translation.name as city')
            ->where(['country.id' => Registry::get('countryID')])
            ->joinWith('translation', false)
            ->joinWith('area', false)
            ->joinWith('area.country', false)
            ->joinWith('area.country.translation', false)
            ->asArray()->limit(5)->all();

        foreach ($data as $item) {
            $countriesGroup[$item['id']] = $item['country'] . ', ' . $item['city'];
        }

        return $countriesGroup;
    }
}
