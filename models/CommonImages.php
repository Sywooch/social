<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "common_images".
 *
 * @property string $id
 * @property string $file
 * @property string $date
 *
 * @property CustomerCommentAnswerImage[] $customerCommentAnswerImages
 * @property CustomerCommentImage[] $customerCommentImages
 */
class CommonImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'common_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file'], 'required'],
            [['date'], 'safe'],
            [['file'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'file' => Yii::t('app', 'File'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerCommentAnswerImages()
    {
        return $this->hasMany(CustomerCommentAnswerImage::className(), ['imageID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerCommentImages()
    {
        return $this->hasMany(CustomerCommentImage::className(), ['imageID' => 'id']);
    }
}
