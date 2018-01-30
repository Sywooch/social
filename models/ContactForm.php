<?php
namespace app\models;
use yii\base\Model;

class ContactForm extends Model
{
    /**
     * Текст сообщения
     *
     * @var
     */
    public $text;

    public $captcha;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['text'], 'required'],
            ['captcha', 'captcha'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'text' => \Yii::t('app', 'Ваш вопрос'),
        ];
    }
}