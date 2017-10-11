<?php
namespace app\models;
use Yii;
use yii\base\ErrorException;
use yii\base\Model;
/**
 * RegisterForm is the model behind the login form.
 */
class RegisterForm extends Customer
{
    /**
     * Email.
     *
     * @var
     */
    public $name;

    /**
     * Почта.
     *
     * @var
     */
    public $email;

//    public $passwordConfirm;

    /**
     * Пароль
     *
     * @var
     */
    public $password;

    /**
     * Город.
     *
     * @var
     */
    public $city;

    /**
     * Пол
     *
     * @var
     */
    public $sex;

    /**
     * Дата рождения.
     *
     * @var
     */
    public $birthday;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password', 'birthday', 'city', 'sex'], 'required'],
            ['password', 'string', 'min' => 6, 'max' => 32, 'message' => \Yii::t('app', 'Парольдолжен быть от 6 до 16 символов')],
//            ['passwordConfirm', 'compare', 'compareAttribute'=>'password', 'message'=>"Пароли не совпадают" ],
            ['name', 'string', 'min' => 2, 'max' => 16, 'message' => \Yii::t('app', 'Имя должно быть от 2 до 16 символов')],
            ['email', 'email', 'message' => 'Поле должно содержать корректный E-mail'],
            ['email', 'unique', 'message' => 'Пользователь с таким E-mail уже зарегистрирован в системе'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'city' => 'Город',
            'birthday' => \Yii::t('app', 'Дата рождения'),
            'passwordConfirm' => 'Подтвердите пароль',
        ];
    }

    /**
     * Проверяет на существование почты.
     *
     * @return bool
     */
    public function check()
    {
        if ($this->validate()) {
            $customer = Customer::find()->where(['email' => $this->email])->one();
            if (!empty($customer)) {
                $this->addError('email', 'Такой пользователь уже зарегистрирован');
                return false;
            }
        }
    }

    /**
     * Выполняет регистрацию.
     *
     * @return Customer|bool
     */
    public function register()
    {
        if ($this->validate()) {
            $activationCode = uniqid();
            $customer = new Customer();
            $customer->email = $this->email;
            $customer->fullName = $this->name;
            $customer->password = md5($this->password);
            $customer->code = $activationCode;
            $customer->birthday = $this->birthday;
            $customer->cityID = $this->city;
            $customer->sex = $this->sex;
            $customer->registrationIp = $_SERVER['REMOTE_ADDR'];
            $customer->save();

            return $customer;
        }
        return false;
    }

    /**
     * Преводы месяцев.
     *
     * @return array
     */
    public static function getMonthTranslation()
    {
        return [
            1 => \Yii::t('app', 'Январь'),
            2 => \Yii::t('app', 'Февраль'),
            3 => \Yii::t('app', 'Март'),
            4 => \Yii::t('app', 'Апрель'),
            5 => \Yii::t('app', 'Май'),
            6 => \Yii::t('app', 'Июнь'),
            7 => \Yii::t('app', 'Июль'),
            8 => \Yii::t('app', 'Август'),
            9 => \Yii::t('app', 'Сентябрь'),
            10 => \Yii::t('app', 'Октябрь'),
            11 => \Yii::t('app', 'Ноябрь'),
            12 => \Yii::t('app', 'Декабрь'),
        ];
    }
}
