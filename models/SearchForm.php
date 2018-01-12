<?php

namespace app\models;

use yii\base\Model;

class SearchForm extends Model
{
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
            [['text'], 'required'],
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
