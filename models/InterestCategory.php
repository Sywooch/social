<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
        $translation = $this->hasOne(InterestCategoryTranslation::className(), ['sourceID' => 'id'])
            ->andOnCondition(['interest_category_translation.language' => \Yii::$app->language]);

        if (empty($translation->name))
            $translation = $this->hasOne(InterestCategoryTranslation::className(), ['sourceID' => 'id']);

        return $translation;
    }

    /**
     * @param $categories
     */
    public static function attachAdsCount(&$categories)
    {
        $categoryIds = ArrayHelper::map($categories, 'id', 'id');

        $interestMap = AdsInterests::find()
            ->select('interestID, COUNT(DISTINCT `adsID`) as adsCount')
            ->groupBy('interestID')
            ->asArray()
            ->all();
        $interestMap = ArrayHelper::map($interestMap, 'interestID', 'adsCount');

        $interestCategoryMap = AdsInterests::find()
            ->select('interestID, COUNT(DISTINCT `adsID`) as adsCount, interest_category.id as CID')
            ->joinWith('interest', false)
            ->joinWith('interest.category', false)
            ->groupBy('CID')
            ->asArray()
            ->all();

        $interestCategoryMap = ArrayHelper::map($interestCategoryMap, 'CID', 'adsCount');

        foreach ($categories as $c => $category) {
            $categories[$c]['adsCount'] = !empty($interestCategoryMap[$category['id']]) ? $interestCategoryMap[$category['id']] : 0;
            foreach ($category['interests'] as $i => $interest) {
                if (empty($interestMap[$interest['id']]))
                    $interestMap[$interest['id']] = 0;

                $categories[$c]['interests'][$i]['adsCount'] = $interestMap[$interest['id']];
            }
        }
    }

    /**
     * @param $categories
     */
    public static function attachCompanyCount(&$categories)
    {
        $categoryIds = ArrayHelper::map($categories, 'id', 'id');

        $interestMap = CompanyInterests::find()
            ->select('interestID, COUNT(DISTINCT `companyID`) as companyCount')
            ->groupBy('interestID')
            ->asArray()
            ->all();
        $interestMap = ArrayHelper::map($interestMap, 'interestID', 'companyCount');

        $interestCategoryMap = CompanyInterests::find()
            ->select('interestID, COUNT(DISTINCT `companyID`) as companyCount, interest_category.id as CID')
            ->joinWith('interest', false)
            ->joinWith('interest.category', false)
            ->groupBy('CID')
            ->asArray()
            ->all();

        $interestCategoryMap = ArrayHelper::map($interestCategoryMap, 'CID', 'companyCount');

        foreach ($categories as $c => $category) {
            $categories[$c]['companyCount'] = !empty($interestCategoryMap[$category['id']]) ? $interestCategoryMap[$category['id']] : 0;
            foreach ($category['interests'] as $i => $interest) {
                if (empty($interestMap[$interest['id']]))
                    $interestMap[$interest['id']] = 0;

                $categories[$c]['interests'][$i]['companyCount'] = $interestMap[$interest['id']];
            }
        }
    }
}
