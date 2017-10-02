<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country_translation".
 *
 * @property string $id
 * @property string $sourceID
 * @property string $language
 * @property string $name
 *
 * @property Country $source
 */
class CountryTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sourceID', 'language', 'name'], 'required'],
            [['sourceID'], 'integer'],
            [['language'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 255],
            [['sourceID'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['sourceID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sourceID' => 'Source ID',
            'language' => 'Язык перевода',
            'name' => 'Наименование',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Country::className(), ['id' => 'sourceID']);
    }
}
