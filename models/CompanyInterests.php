<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_interests".
 *
 * @property string $id
 * @property string $companyID
 * @property string $interestID
 *
 * @property Interest $interest
 * @property Company $company
 */
class CompanyInterests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_interests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companyID', 'interestID'], 'required'],
            [['companyID', 'interestID'], 'integer'],
            [['interestID'], 'exist', 'skipOnError' => true, 'targetClass' => Interest::className(), 'targetAttribute' => ['interestID' => 'id']],
            [['companyID'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['companyID' => 'id']],
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
            'interestID' => Yii::t('app', 'Interest ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterest()
    {
        return $this->hasOne(Interest::className(), ['id' => 'interestID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'companyID']);
    }
}
