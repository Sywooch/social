<?php

namespace app\models;

use app\components\Registry;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class RestoreForm extends Model
{
    public $email;

    public $captcha;

    public function rules()
    {
        return [
            [['email', 'captcha'], 'required'],
            ['captcha', 'captcha'],
            ['email', 'findUser'],
        ];
    }

    public function passwordRestore()
    {
        $customer = Customer::findOne(['email' => $this->email]);

        return $customer->passwordReset();
    }

    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    public function findUser()
    {
        $customer = Customer::findOne(['email' => $this->email]);
        if (empty($customer)) {
            $this->addError('email', 'Не верный E-mail');

            return false;
        }

        return true;
    }
}