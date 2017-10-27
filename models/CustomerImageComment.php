<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_image_comment".
 *
 * @property string $id
 * @property string $imageID
 * @property string $text
 * @property string $date
 * @property integer $likePoint
 * @property string $customerID
 *
 * @property CustomerImage $image
 * @property Customer $customer
 */
class CustomerImageComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_image_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imageID', 'customerID'], 'required'],
            [['imageID', 'likePoint', 'customerID'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['imageID'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerImage::className(), 'targetAttribute' => ['imageID' => 'id']],
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
            'imageID' => Yii::t('app', 'Image ID'),
            'text' => Yii::t('app', 'Text'),
            'date' => Yii::t('app', 'Date'),
            'likePoint' => Yii::t('app', 'Like Point'),
            'customerID' => Yii::t('app', 'Customer ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(CustomerImage::className(), ['id' => 'imageID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customerID']);
    }
}
