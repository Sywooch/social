<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_participant".
 *
 * @property string $id
 * @property string $companyID
 * @property string $participantID
 *
 * @property Company $company
 * @property Customer $participant
 */
class CompanyParticipant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_participant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companyID', 'participantID'], 'required'],
            [['companyID', 'participantID'], 'integer'],
            [['companyID'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['companyID' => 'id']],
            [['participantID'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['participantID' => 'id']],
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
            'participantID' => Yii::t('app', 'Participant ID'),
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
    public function getParticipant()
    {
        return $this->hasOne(Customer::className(), ['id' => 'participantID']);
    }
}
