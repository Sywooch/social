<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_log".
 *
 * @property string $id
 * @property string $customerID
 * @property string $action
 * @property string $time
 * @property string $place
 * @property string $ip
 *
 * @property Customer $customer
 */
class CustomerLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerID'], 'required'],
            [['customerID'], 'integer'],
            [['time'], 'safe'],
            [['action'], 'string', 'max' => 255],
            [['place', 'ip'], 'string', 'max' => 32],
            [['customerID'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customerID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customerID' => Yii::t('app', 'Customer ID'),
            'action' => Yii::t('app', 'Action'),
            'time' => Yii::t('app', 'Time'),
            'place' => Yii::t('app', 'Place'),
            'ip' => Yii::t('app', 'Ip'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customerID']);
    }
}
