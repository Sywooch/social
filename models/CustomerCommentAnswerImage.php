<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_comment_answer_image".
 *
 * @property string $commentID
 * @property string $imageID
 *
 * @property CustomerCommentAnswer $comment
 * @property CommonImages $image
 */
class CustomerCommentAnswerImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_comment_answer_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['commentID', 'imageID'], 'required'],
            [['commentID', 'imageID'], 'integer'],
            [['commentID'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerCommentAnswer::className(), 'targetAttribute' => ['commentID' => 'id']],
            [['imageID'], 'exist', 'skipOnError' => true, 'targetClass' => CommonImages::className(), 'targetAttribute' => ['imageID' => 'id']],
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
    public function getComment()
    {
        return $this->hasOne(CustomerCommentAnswer::className(), ['id' => 'commentID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(CommonImages::className(), ['id' => 'imageID']);
    }
}
