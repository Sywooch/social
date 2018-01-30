<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property string $id
 * @property string $code
 * @property integer $system
 *
 * @property LanguagesTranslation[] $languagesTranslations
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['system'], 'integer'],
            [['code'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => \Yii::t('app', 'Код'),
            'system' => \Yii::t('app', 'Отображать как системный'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslation()
    {
        $translation = $this->hasOne(LanguagesTranslation::className(), ['sourceID' => 'id'])
            ->andOnCondition(['languages_translation.language' => \Yii::$app->language]);

        if (empty($translation->name))
            $translation = $this->hasOne(LanguagesTranslation::className(), ['sourceID' => 'id']);

        return $translation;

    }
}
