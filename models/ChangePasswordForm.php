<?php

namespace app\models;

use app\components\Registry;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class ChangePasswordForm extends Model
{
    public $oldPassword;

    public $password;

    public $passwordConfirm;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['passwordConfirm', 'password', 'oldPassword'], 'required'],
            ['password', 'string', 'min' => 6, 'max' => 32, 'message' => \Yii::t('app', 'Парольдолжен быть от 6 до 16 символов')],
            ['passwordConfirm', 'compare', 'compareAttribute'=>'password', 'message'=>"Пароли не совпадают" ],
            ['oldPassword', 'isPasswordTrue'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'oldPassword' => \Yii::t('app', 'Старый пароль'),
            'password' => \Yii::t('app', 'Новый пароль'),
            'passwordConfirm' => \Yii::t('app', 'Еще раз'),
        ];
    }

    /**
     * Проводит проверку соответствия пароля.
     *
     * @return bool
     */
    public function isPasswordTrue()
    {
        if (md5($this->oldPassword) == Registry::get('user')->password) {
            return true;
        }

        $this->addError('oldPassword', \Yii::t('app', 'Не верный пароль!'));
        $this->oldPassword = false;

        return false;
    }

    /**
     * Меняет пароль.
     */
    public function changePassword()
    {
        $customer = Customer::findOne(Registry::get('user')->id);
        $customer->password = md5($this->password);
        $customer->save();
    }
}
