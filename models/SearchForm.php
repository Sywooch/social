<?php

namespace app\models;

use yii\base\Model;

class SearchForm extends Model
{
    const USER_TYPE = 'users';
    const ADS_TYPE = 'ads';
    const COMPANY_TYPE = 'companies';
    const ALL_TYPE = 'all';

    public $text;

    public $interest;

    public $city;

    public $cityCheckbox;

    public $type;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email and password are both required
//            [['text'], 'required'],
            [['interest', 'city', 'type', 'cityCheckbox'], 'safe'],
        ];
    }

    public static function searchByParams($type, $params)
    {
        switch ($type) {
            case self::ADS_TYPE:
                return Ads::searchByParams($params);
            case self::COMPANY_TYPE:
                return Company::searchByParams($params);
            case self::USER_TYPE:
                return Customer::searchByParams($params);
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        ];
    }
}
