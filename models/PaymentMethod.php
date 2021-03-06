<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paymentmethod".
 *
 * @property string $id
 * @property string $name
 * @property string $countryCode
 * @property string $description
 * @property string $imageFileName
 * @property string $price
 * @property string $feePercent
 *
 * @property ShippingPaymentMethodRelation[] $shippingPaymentMethodRelations
 * @property ShippingMethod[] $shippingMethods
 */
class PaymentMethod extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paymentmethod';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['price', 'feePercent'], 'number'],
            [['name'], 'string', 'max' => 45],
            [['countryCode'], 'string', 'max' => 3],
            [['imageFileName'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'gif, jpg, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'countryCode' => 'Код страны',
            'description' => 'Описание',
            'imageFileName' => 'Картинка',
            'price' => 'Стоимость',
            'feePercent' => 'Процент',
            'file' => 'Картинка',
        ];
    }

    public function calculateIncrease($amount)
    {
        if (!empty($this->price)) {
            return $this->price;
        } elseif (!empty($this->feePercent)) {
            return round($amount / 100 * $this->feePercent);
        }

        return 0;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingPaymentMethodRelations()
    {
        return $this->hasMany(ShippingPaymentMethodRelation::className(), ['paymentMethodId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingMethods()
    {
        return $this->hasMany(ShippingMethod::className(), ['id' => 'shippingMethodId'])->viaTable('shippingpaymentmethodrelation', ['paymentMethodId' => 'id']);
    }
}
