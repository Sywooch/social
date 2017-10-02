<?php

namespace app\models;

use Yii;

/**
 * Это модель класса для таблицы "customer".
 *
 * @property string  $id               ID.
 * @property string  $email            E-mail.
 * @property string  $password         Пароль.
 * @property integer $isActive         Признак активности.
 * @property string  $fullName         Полное имя.
 * @property string  $birthday         День рождения.
 * @property string  $code             Код активации.
 * @property string  $cityID           cityID.
 * @property string  $registrationIp   ИП адресс.
 * @property string  $registrationTime Время регистрации.
 * @property string  $authID           Идентификатор в соц. сетях.
 * @property string  $authMethod       Метод авторизации соц. сети.
 *
 */
class Customer extends \yii\db\ActiveRecord
{
    const DEFAULT_CUSTOMER_ID = 0;

    public $passwordConfirm;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password', 'registrationIp'], 'required'],
            [['isActive'], 'integer'],
            [['registrationTime', 'authID', 'authMethod', 'birthday'], 'safe'],
            [['email', 'fullName'], 'string', 'max' => 255],
            [['password', 'code'], 'string', 'max' => 32],
            [['registrationIp'], 'string', 'max' => 16],
            ['email', 'unique', 'message' => 'Пользователь с таким E-mail уже зарегистрирован в системе'],
            ['password', 'string', 'min' => 6, 'max' => 32, 'message' => 'Парольдолжен быть от 6 до 16 символов'],
            ['passwordConfirm', 'compare', 'compareAttribute'=>'password', 'message'=>"Пароли не совпадают" ],
            ['email', 'email', 'message' => 'Поле должно содержать корректный E-mail'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'passwordConfirm' => 'Пароль еще раз',
            'customerGroupId' => 'Группа',
            'isActive' => 'Активность',
            'fullName' => 'Имя Фамилия',
            'birthday' => 'День рождения',
            'code' => 'Code',
            'registrationIp' => 'Ip регистрации',
            'registrationTime' => 'Время',
            'authID' => 'authID',
            'authMethod' => 'authMethod',
        ];
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    /**
     * Finds user by email
     *
     * @param  string      $email
     * @return static|null
     */
    public static function findByUsername($email)
    {
        $user = self::find()->where(['email' => $email])->one();
        if (!empty($user))
            return $user;

        return null;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!empty($_POST['Customer']['hashedPassword'])) {
                $this->password = $_POST['Customer']['hashedPassword'];
            }

            return true;
        }
        return false;
    }
}
