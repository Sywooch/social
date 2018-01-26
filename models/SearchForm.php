<?php

namespace app\models;

use yii\base\Model;

class SearchForm extends Model
{
    const ADS_TYPE = 'ads';
    const COMPANY_TYPE = 'company';
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        ];
    }
}
