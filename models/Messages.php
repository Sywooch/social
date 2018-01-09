<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property string $id
 * @property string $senderID
 * @property string $receiverID
 * @property string $text
 * @property string $date
 * @property integer $flag
 *
 * @property Customer $sender
 * @property Customer $receiver
 */
class Messages extends \yii\db\ActiveRecord
{
    const NOT_READ = 0;

    const READ = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['senderID', 'receiverID', 'text'], 'required'],
            [['senderID', 'receiverID', 'flag'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['senderID'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['senderID' => 'id']],
            [['receiverID'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['receiverID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'senderID' => Yii::t('app', 'Sender ID'),
            'receiverID' => Yii::t('app', 'Receiver ID'),
            'text' => Yii::t('app', 'Текст сообщения'),
            'date' => Yii::t('app', 'Date'),
            'flag' => Yii::t('app', 'Flag'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSender()
    {
        return $this->hasOne(Customer::className(), ['id' => 'senderID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceiver()
    {
        return $this->hasOne(Customer::className(), ['id' => 'receiverID']);
    }
}
