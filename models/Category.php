<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $name
 *
 * @property CompanyCategory[] $companyCategories
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyCategories()
    {
        return $this->hasMany(CompanyCategory::className(), ['categoryID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslation()
    {
        $translation = $this->hasOne(CategoryTranslation::className(), ['sourceID' => 'id'])
            ->andOnCondition(['category_translation.language' => \Yii::$app->language]);

        if (empty($translation->name))
            $translation = $this->hasOne(CategoryTranslation::className(), ['sourceID' => 'id']);

        return $translation;
    }
}
