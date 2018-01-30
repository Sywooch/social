<?php
namespace app\models;
use yii\base\Model;

class SupportForm extends Model
{
    public $name;

    public $email;

    public $text;

    public $captcha;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['text', 'name', 'email'], 'required'],
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
            'name' => \Yii::t('app', 'Имя'),
            'email' => \Yii::t('app', 'E-mail'),
        ];
    }
}