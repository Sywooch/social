<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interest_translation".
 *
 * @property string $id
 * @property string $sourceID
 * @property string $language
 * @property string $name
 *
 * @property Interest $source
 */
class InterestTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interest_translation';
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
            [['sourceID'], 'exist', 'skipOnError' => true, 'targetClass' => Interest::className(), 'targetAttribute' => ['sourceID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sourceID' => Yii::t('app', 'Интерес'),
            'language' => Yii::t('app', 'Язык'),
            'name' => Yii::t('app', 'Наименование'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Interest::className(), ['id' => 'sourceID']);
    }
}
