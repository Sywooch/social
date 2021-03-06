<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_comment_answer_image".
 *
 * @property string $commentID
 * @property string $imageID
 *
 * @property CommonImages $image
 * @property CustomerCommentAnswer $comment
 */
class CompanyCommentAnswerImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_comment_answer_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['commentID', 'imageID'], 'required'],
            [['commentID', 'imageID'], 'integer'],
            [['imageID'], 'exist', 'skipOnError' => true, 'targetClass' => CommonImages::className(), 'targetAttribute' => ['imageID' => 'id']],
            [['commentID'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerCommentAnswer::className(), 'targetAttribute' => ['commentID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'commentID' => Yii::t('app', 'Comment ID'),
            'imageID' => Yii::t('app', 'Image ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(CommonImages::className(), ['id' => 'imageID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(CustomerCommentAnswer::className(), ['id' => 'commentID']);
    }
}
