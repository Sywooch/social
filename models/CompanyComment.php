<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_comment".
 *
 * @property string $id
 * @property string $companyID
 * @property string $customerID
 * @property string $text
 * @property string $date
 * @property integer $likePoint
 *
 * @property Customer $customer
 * @property CompanyCommentAnswer[] $companyCommentAnswers
 * @property CompanyCommentImage[] $companyCommentImages
 */
class CompanyComment extends \yii\db\ActiveRecord
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
        return 'company_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerID', 'companyID', 'text'], 'required'],
            [['customerID', 'likePoint'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['image'], 'file', 'extensions' => 'gif, jpg, png'],
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
            'companyID' => Yii::t('app', 'Company ID'),
            'customerID' => Yii::t('app', 'Customer ID'),
            'text' => Yii::t('app', 'Комментарий'),
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
        return $this->hasMany(CompanyCommentAnswer::className(), ['commentID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(CommonImages::className(), ['id' => 'imageID'])
            ->viaTable('company_comment_image', ['commentID' => 'id']);
    }
}
