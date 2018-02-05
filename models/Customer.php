<?php

namespace app\models;

use app\components\Registry;
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
 * @property string  $unsetMessage     unsetMessage.
 * @property string  $privateParams     privateParams.
 *
 */
class Customer extends \yii\db\ActiveRecord
{
    const DEFAULT_CUSTOMER_ID = 0;

    public $passwordConfirm;

    public $newPassword;

    const PRIVATE_NO_ONE = 0;

    const PRIVATE_ONLY_FRIENDS = 1;

    const PRIVATE_ALL_FRIENDS = 2;

    const PRIVATE_ALL = 3;

    /**
     * Значения приватных настрое по умолчанию.
     *
     * @var array
     */
    private $_defaultsPrivate = [
        0 => self::PRIVATE_NO_ONE,
        1 => self::PRIVATE_NO_ONE,
        2 => self::PRIVATE_NO_ONE,
        3 => self::PRIVATE_NO_ONE,
        4 => self::PRIVATE_NO_ONE,
        5 => self::PRIVATE_NO_ONE,
        6 => self::PRIVATE_NO_ONE,
    ];

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
            [['unsetMessage', 'privateParams'], 'safe'],
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
    public function getAds()
    {
        return $this->hasMany(Ads::className(), ['customerID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['customerID' => 'id']);
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
    public function getFriends()
    {
        return $this->hasMany(Customer::className(), ['id' => 'friendID'])
            ->viaTable('customer_friend', ['customerID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'cityID']);
    }

    /**
     * @param $userId
     *
     * @return int|string
     */
    public function isFriend($userId)
    {
        return CustomerFriend::find()->where('customerID = :thisID AND friendID = :friendID', [':thisID' => $this->id, ':friendID' => $userId])->count();
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

    public function passwordReset()
    {
        $this->newPassword = uniqid();
        $this->password = md5($this->newPassword);
        $this->save(false);

        return $this;
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

    /**
     * Логирует действие.
     *
     * @param $action
     */
    public function log($action)
    {
        $geoData = Registry::get('geoData', ['country_name' => 'unknown', 'city' => 'unknown']);

        $log = new CustomerLog();
        $log->setAttributes([
            'customerID' => $this->id,
            'action' => $action,
            'place' => $geoData['country_name'], $geoData['city'],
            'ip' => $_SERVER['REMOTE_ADDR'],
        ],false);

        $log->save();
    }

    /**
     * Блокирует пользователя.
     */
    public static function unsetAccount($message)
    {
        $customer = Customer::findOne(Registry::get('user')->id);
        $customer->unsetMessage = $message;
        $customer->isActive = false;

        $customer->save(false);

        \Yii::$app->session->remove('user');
    }

    /**
     * Выполняет поиск пользователей по парамтрам.
     *
     * @param array $params
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function searchByParams($params = [])
    {
        $query = self::find()->with('interests')
            ->where(['like', 'fullName', $params['text'] . '%', false])
            ->andFilterWhere(['cityID' => $params['city']]);

        if (!empty($params['interest'])) {
            $query->joinWith('interests')->andFilterWhere(['in','interest.id', $params['interest']]);
        }

        return $query->all();
    }

    /**
     * Устанавливает настройки приватности по умолчанию.
     */
    public function setDefaultsPrivate()
    {
        if (empty($this->privateParams)) {
            $this->privateParams = json_encode($this->_defaultsPrivate);
            $this->save(false);
        }
    }

    /**
     * Возвращает список личных настроек.
     *
     * @return array|null
     */
    public function getPrivateSettings()
    {
        $params = json_decode($this->privateParams);
        $translates = array_flip($this->getSettingsTranslate());

        foreach ($translates as $name => $value) {
            $translates[$name] = $params[$value];
        }

        return $translates;
    }

    /**
     * Возвращает переводы личных настроек.
     *
     * @return array
     */
    private function getSettingsTranslate()
    {
        return [
            0 => \Yii::t('app', 'Кто может просматривать мой профиль'),
            1 => \Yii::t('app', 'Кто может отправлять мне сообщения'),
            2 => \Yii::t('app', 'Кто может просматривать мои фото'),
            3 => \Yii::t('app', 'Кто может просматривать мои компании'),
            4 => \Yii::t('app', 'Кто может просматривать мои объявления'),
            5 => \Yii::t('app', 'Кто может комментировать мои фото'),
            6 => \Yii::t('app', 'Кто может комментировать мои записи'),
        ];
    }

    /**
     * Возвращает переводы опций приватности.
     *
     * @return array
     */
    public static function getPrivateOptions()
    {
        return [
            self::PRIVATE_NO_ONE => \Yii::t('app', 'Никто'),
            self::PRIVATE_ONLY_FRIENDS => \Yii::t('app', 'Только друзья'),
            self::PRIVATE_ALL_FRIENDS => \Yii::t('app', 'Друзья друзей'),
            self::PRIVATE_ALL => \Yii::t('app', 'Все'),
        ];
    }
}
