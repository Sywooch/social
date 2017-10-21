<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ads_interests".
 *
 * @property string $id
 * @property string $adsID
 * @property string $interestID
 *
 * @property Ads $ads
 * @property Interest $interest
 */
class AdsInterests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_interests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['adsID', 'interestID'], 'required'],
            [['adsID', 'interestID'], 'integer'],
            [['adsID'], 'exist', 'skipOnError' => true, 'targetClass' => Ads::className(), 'targetAttribute' => ['adsID' => 'id']],
            [['interestID'], 'exist', 'skipOnError' => true, 'targetClass' => Interest::className(), 'targetAttribute' => ['interestID' => 'id']],
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
            'interestID' => Yii::t('app', 'Interest ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAds()
    {
        return $this->hasOne(Ads::className(), ['id' => 'adsID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterest()
    {
        return $this->hasOne(Interest::className(), ['id' => 'interestID']);
    }
}
