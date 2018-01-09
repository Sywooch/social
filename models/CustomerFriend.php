<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_friend".
 *
 * @property string $id
 * @property string $customerID
 * @property string $friendID
 */
class CustomerFriend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_friend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerID', 'friendID'], 'required'],
            [['customerID', 'friendID'], 'integer'],
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
            'friendID' => Yii::t('app', 'Friend ID'),
        ];
    }
}
