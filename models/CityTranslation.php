<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city_translation".
 *
 * @property string $id
 * @property string $sourceID
 * @property string $language
 * @property string $name
 */
class CityTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city_translation';
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
}
