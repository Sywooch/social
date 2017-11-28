<?php
namespace app\models;
/**
 * This is the model class for table "infopage".
 *
 * @property string $id
 * @property string $code
 * @property string $title
 * @property string $content
 * @property string $createTime
 * @property string $updateTime
 */
class InfoPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'infopage';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'title', 'content'], 'required'],
            [['content'], 'string'],
            [['updateTime','createTime'], 'safe'],
            [['code'], 'string', 'max' => 45],
            [['title'], 'string', 'max' => 255],
            [['code'], 'unique'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Чпу',
            'title' => 'Заголовок',
            'content' => 'Контент',
            'createTime' => 'Создан',
            'updateTime' => 'Обновлен',
        ];
    }
}