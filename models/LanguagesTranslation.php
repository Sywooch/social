<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "languages_translation".
 *
 * @property string $id
 * @property string $sourceID
 * @property string $language
 * @property string $name
 *
 * @property Languages $source
 */
class LanguagesTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sourceID'], 'required'],
            [['sourceID'], 'integer'],
            [['language'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 255],
            [['sourceID'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['sourceID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sourceID' => 'Код языка',
            'language' => 'Язык',
            'name' => 'Наименование',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Languages::className(), ['id' => 'sourceID']);
    }
}
