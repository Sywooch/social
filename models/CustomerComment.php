<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_comment".
 *
 * @property string $id
 * @property string $customerID
 * @property string $text
 * @property string $date
 * @property integer $likePoint
 *
 * @property Customer $customer
 * @property CustomerCommentAnswer[] $customerCommentAnswers
 * @property CustomerCommentImage[] $customerCommentImages
 */
class CustomerComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerID', 'likePoint'], 'required'],
            [['customerID', 'likePoint'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
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
            'text' => Yii::t('app', 'Text'),
            'date' => Yii::t('app', 'Date'),
            'likePoint' => Yii::t('app', 'Like Point'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customerID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(CustomerCommentAnswer::className(), ['commentID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(CustomerCommentImage::className(), ['commentID' => 'id']);
    }
}
