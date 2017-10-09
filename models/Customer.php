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
 * @property string  $about            О себе.
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
            [['registrationTime', 'authID', 'authMethod', 'birthday', 'about'], 'safe'],
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
            'about' => 'О себе',
            'code' => 'Code',
            'registrationIp' => 'Ip регистрации',
            'registrationTime' => 'Время',
            'authID' => 'authID',
            'authMethod' => 'authMethod',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyParticipants()
    {
        return $this->hasMany(CompanyParticipant::className(), ['participantID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(CustomerImage::className(), ['customerID' => 'id']);
    }

    public function getMainImage()
    {
        return $this->hasOne(CustomerImage::className(), ['customerID' => 'id'])
            ->andOnCondition(['customer_image.isMain' => 1]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interest::className(), ['id' => 'interestID'])
            ->viaTable('customer_interests', ['customerID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Languages::className(), ['id' => 'languageID'])
            ->viaTable('customer_languages', ['customerID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'cityID']);
    }

    public function getLanguagesList()
    {
        $list = [];

        foreach ($this->getLanguages()->joinWith('translation')->asArray()->all() as $language) {
            array_push($list, $language['translation']['name']);
        }

        return $list;
    }

    public function getAge()
    {
        return floor((time()-strtotime($this->birthday))/(60*60*24*365.25));
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
