<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $sku
 * @property string $name
 * @property string $description
 * @property string $quantityInStock
 * @property string $quantityOfSold
 * @property string $barcode1
 * @property string $barcode2
 * @property string $barcode3
 * @property string $availableTime
 * @property string $createTime
 * @property string $updateTime
 * @property string $price
 * @property string $currencyCode
 * @property string $productDisountId
 * @property string $productManufactureId
 * @property string $imageFileName
 * @property string $image
 * @property string $imagesMultiple
 * @property string $categoriesMultiple
 *
 * @property BasketProduct[] $basketProducts
 * @property Manufacture $manufacture
 * @property Discount $discount
 * @property Attribute[] $productAttributes
 * @property Specification[] $specifications
 * @property Category[] $categories
 * @property ProductImage[] $images
 * @property ProductCategoryRelation[] $categoryRelation
 * @property IncomingPrice $incomingPrice
 * @property ProductMarker[] $marker
 * @property ProductSpecificationRelation[] $productSpecificationRelations
 */
class Product extends \yii\db\ActiveRecord
{
    public $image;

    public $imagesMultiple;

    public $categoriesMultiple;

    public $specificationsMultiple;

    public $attributesMultiple;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku', 'name', 'currencyCode', 'productManufactureId'], 'required'],
            [['description'], 'string'],
            [['quantityInStock', 'quantityOfSold', 'productDisountId', 'productManufactureId'], 'integer'],
            [['availableTime', 'createTime', 'updateTime', 'categoriesMultiple', 'specificationsMultiple', 'attributesMultiple'], 'safe'],
            [['price'], 'number'],
            [['image'], 'file', 'extensions' => 'gif, jpg, png'],
            [['imagesMultiple'], 'file', 'extensions' => 'gif, jpg, png', 'maxFiles' => 20],
            [['sku', 'imageFileName'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 500],
            [['barcode1', 'barcode2', 'barcode3'], 'string', 'max' => 45],
            [['currencyCode'], 'string', 'max' => 3],
            [['sku'], 'unique'],
            [['productManufactureId'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacture::className(), 'targetAttribute' => ['productManufactureId' => 'id']],
            [['productDisountId'], 'exist', 'skipOnError' => true, 'targetClass' => Discount::className(), 'targetAttribute' => ['productDisountId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sku' => 'Код товара',
            'name' => 'Название',
            'description' => 'Описание',
            'image' => 'Основная картинка',
            'imagesMultiple' => 'Изображения товара',
            'quantityInStock' => 'В наличии',
            'quantityOfSold' => 'Продано',
            'barcode1' => 'Barcode1',
            'barcode2' => 'Barcode2',
            'barcode3' => 'Barcode3',
            'availableTime' => 'Доступное время',
            'createTime' => 'Создан',
            'updateTime' => 'Обновлен',
            'price' => 'Цена продажи',
            'currencyCode' => 'Валюта',
            'productDisountId' => 'Скидка',
            'productManufactureId' => 'Производитель',
            'imageFileName' => 'Картинка',
            'categoriesMultiple' => 'Категории',
            'specificationsMultiple' => 'Спецификации',
            'attributesMultiple' => 'Атрибуты',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasketProducts()
    {
        return $this->hasMany(BasketProduct::className(), ['productId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacture()
    {
        return $this->hasOne(Manufacture::className(), ['id' => 'productManufactureId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscount()
    {
        return $this->hasOne(Discount::className(), ['id' => 'productDisountId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributes()
    {
        return $this->hasMany(Attribute::className(), ['productId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryRelation()
    {
        return $this->hasMany(ProductCategoryRelation::className(), ['productId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'productCategoryId'])->viaTable('productcategoryrelation', ['productId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(ProductImage::className(), ['productId' => 'id'])->orderBy(['rank' => SORT_ASC]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncomingPrice()
    {
        return $this->hasOne(IncomingPrice::className(), ['productId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelatedProduct()
    {
        return $this->hasOne(RelatedProduct::className(), ['idProduct' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarker()
    {
        return $this->hasOne(ProductMarker::className(), ['productId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecificationsRelation()
    {
        return $this->hasMany(ProductSpecificationRelation::className(), ['productId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecifications()
    {
        return $this->hasMany(Specification::className(), ['id' => 'productSpecificationId'])->viaTable('productproductspecificationrelation', ['productId' => 'id']);
    }



}
