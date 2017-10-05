<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interest_category".
 *
 * @property string $id
 * @property integer $sort
 *
 * @property Interest[] $interests
 * @property InterestCategoryTranslation[] $interestCategoryTranslations
 */
class InterestCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interest_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sort' => Yii::t('app', 'Сортировка'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interest::className(), ['categoryID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslation()
    {
        return $this->hasOne(InterestCategoryTranslation::className(), ['sourceID' => 'id'])
            ->andOnCondition(['interest_category_translation.language' => \Yii::$app->language]);
    }
}
