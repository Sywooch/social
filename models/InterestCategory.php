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
        return $this->hasOne(InterestCategoryTranslation::className(), ['sourceID' => 'id'])
            ->andOnCondition(['interest_category_translation.language' => \Yii::$app->language]);
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

        foreach ($categories as $c => $category) {
            $categories[$c]['adsCount'] = 0;
            foreach ($category['interests'] as $i => $interest) {
                if (empty($interestMap[$interest['id']]))
                    $interestMap[$interest['id']] = 0;

                $categories[$c]['interests'][$i]['adsCount'] = $interestMap[$interest['id']];
//                $categories[$c]['adsCount']+= $interestMap[$interest['id']];
            }
        }
    }
}
