<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interest".
 *
 * @property string $id
 * @property string $categoryID
 * @property integer $sort
 *
 * @property InterestCategory $category
 * @property InterestTranslation[] $interestTranslations
 */
class Interest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryID', 'sort'], 'required'],
            [['categoryID', 'sort'], 'integer'],
            [['categoryID'], 'exist', 'skipOnError' => true, 'targetClass' => InterestCategory::className(), 'targetAttribute' => ['categoryID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'categoryID' => Yii::t('app', 'Категория'),
            'sort' => Yii::t('app', 'Сортировка'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(InterestCategory::className(), ['id' => 'categoryID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslation()
    {
        $translation = $this->hasOne(InterestTranslation::className(), ['sourceID' => 'id'])
            ->andOnCondition(['interest_translation.language' => \Yii::$app->language]);

        if (empty($translation->name))
            $translation = $this->hasOne(InterestTranslation::className(), ['sourceID' => 'id']);

        return $translation;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAds()
    {
        return $this->hasMany(Ads::className(), ['id' => 'adsID'])
            ->viaTable('ads_interests', ['interestID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsInterests()
    {
        return $this->hasMany(AdsInterests::className(), ['interestID' => 'id']);
    }
}
