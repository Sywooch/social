<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_comment_answer".
 *
 * @property string $id
 * @property string $commentID
 * @property string $customerID
 * @property string $text
 * @property string $date
 * @property integer $likePoint
 *
 * @property Customer $customer
 * @property CompanyComment $comment
 */
class CompanyCommentAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_comment_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['commentID', 'customerID'], 'required'],
            [['commentID', 'customerID', 'likePoint'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['customerID'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customerID' => 'id']],
            [['commentID'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyComment::className(), 'targetAttribute' => ['commentID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'commentID' => Yii::t('app', 'Comment ID'),
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
    public function getComment()
    {
        return $this->hasOne(CompanyComment::className(), ['id' => 'commentID']);
    }
}
