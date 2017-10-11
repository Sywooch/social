<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "customer_comment".
 *
 * @property string $id
 * @property string $customerID
 * @property string $text
 * @property string $image
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
     * Картинка.
     *
     * @var
     */
    public $image;

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
            [['customerID', 'text'], 'required'],
            [['customerID', 'likePoint'], 'integer'],
            [['text'], 'string', 'min' => 1],
            [['image'], 'file', 'extensions' => 'gif, jpg, png'],
            [['date', 'likePoint'], 'safe'],
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
        return $this->hasMany(CommonImages::className(), ['id' => 'imageID'])
            ->viaTable('customer_comment_image', ['commentID' => 'id']);
    }
}
