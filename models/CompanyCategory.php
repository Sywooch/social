<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_category".
 *
 * @property string $id
 * @property string $companyID
 * @property string $categoryID
 *
 * @property Company $company
 * @property Category $category
 */
class CompanyCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companyID', 'categoryID'], 'required'],
            [['companyID', 'categoryID'], 'integer'],
            [['companyID'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['companyID' => 'id']],
            [['categoryID'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['categoryID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'companyID' => Yii::t('app', 'Company ID'),
            'categoryID' => Yii::t('app', 'Category ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'companyID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'categoryID']);
    }
}
