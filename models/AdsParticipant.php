<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ads_participant".
 *
 * @property string $id
 * @property string $adsID
 * @property string $participantID
 *
 * @property Customer $participant
 * @property Ads $ads
 */
class AdsParticipant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_participant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['adsID', 'participantID'], 'required'],
            [['adsID', 'participantID'], 'integer'],
            [['participantID'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['participantID' => 'id']],
            [['adsID'], 'exist', 'skipOnError' => true, 'targetClass' => Ads::className(), 'targetAttribute' => ['adsID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'adsID' => Yii::t('app', 'Ads ID'),
            'participantID' => Yii::t('app', 'Participant ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(Customer::className(), ['id' => 'participantID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAds()
    {
        return $this->hasOne(Ads::className(), ['id' => 'adsID']);
    }
}
