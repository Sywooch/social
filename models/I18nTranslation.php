<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "main_i18n_translation".
 *
 * @property string $id
 * @property string $sourceId
 * @property string $language
 * @property string $message
 *
 * @property I18n $source
 */
class I18nTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_i18n_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sourceId'], 'required'],
            [['sourceId'], 'integer'],
            [['message'], 'string'],
            [['language'], 'string', 'max' => 5],
            [['sourceId'], 'exist', 'skipOnError' => true, 'targetClass' => I18n::className(), 'targetAttribute' => ['sourceId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sourceId' => Yii::t('app', 'Source ID'),
            'language' => Yii::t('app', 'Language'),
            'message' => Yii::t('app', 'Message'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(I18n::className(), ['id' => 'sourceId']);
    }
}
