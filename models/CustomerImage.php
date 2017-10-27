<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_image".
 *
 * @property string $id
 * @property string $customerID
 * @property string $file
 * @property string $isMain
 * @property string $likePoint
 * @property string $date
 *
 * @property Customer $customer
 */
class CustomerImage extends \yii\db\ActiveRecord
{
    /**
     * Загружаемый файл.
     *
     * @var
     */
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerID'], 'required'],
            [['customerID'], 'integer'],
            [['date', 'isMain', 'likePoint'], 'safe'],
            [['image'], 'file', 'extensions' => 'gif, jpg, png'],
            [['file'], 'string', 'max' => 255],
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
            'file' => Yii::t('app', 'File'),
            'isMain' => Yii::t('app', 'isMain'),
            'date' => Yii::t('app', 'Date'),
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
    public function getComments()
    {
        return $this->hasMany(CustomerImageComment::className(), ['imageID' => 'id']);
    }
}
