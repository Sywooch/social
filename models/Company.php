<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property string $id
 * @property string $cityID
 * @property string $url
 * @property string $name
 * @property string $title
 * @property string $image
 * @property string $description
 * @property integer $participantsCount
 * @property string $timeCreate
 * @property string $sortDate
 *
 * @property City $city
 * @property CompanyCategory[] $companyCategories
 * @property CompanyInterests[] $companyInterests
 * @property CompanyParticipant[] $companyParticipants
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * Файл
     *
     * @var
     */
    public $file;

    /**
     * Интересы
     *
     * @var
     */
    public $interestsArray;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cityID', 'url', 'name', 'title', 'description', 'interestsArray'], 'required'],
            [['cityID', 'participantsCount'], 'integer'],
            [['description'], 'string'],
            [['file'], 'file', 'extensions' => 'gif, jpg, png'],
            [['url', 'image'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 40],
            [['timeCreate', 'sortDate'], 'safe'],
            [['cityID'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['cityID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cityID' => Yii::t('app', 'City ID'),
            'url' => Yii::t('app', 'Сайт компании'),
            'name' => Yii::t('app', 'Название компании'),
            'title' => Yii::t('app', 'Лозунг'),
            'image' => Yii::t('app', 'Image'),
            'file' => Yii::t('app', 'File'),
            'description' => Yii::t('app', 'Информация о компании'),
            'participantsCount' => Yii::t('app', 'Participants Count'),
            'timeCreate' => Yii::t('app', 'timeCreate'),
            'sortDate' => Yii::t('app', 'sortDate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customerID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'cityID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'categoryID'])
            ->viaTable('company_category', ['companyID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interest::className(), ['id' => 'interestID'])
            ->viaTable('company_interests', ['companyID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipants()
    {
        return $this->hasMany(Customer::className(), ['id' => 'participantID'])
            ->viaTable('company_participant', ['companyID' => 'id'])->limit(9);
    }

    /**
     * @return int|string
     */
    public function getParticipantsCount()
    {
        return CompanyParticipant::find()->where('companyID = :thisID', [':thisID' => $this->id])->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyComments()
    {
        return $this->hasMany(CompanyComment::className(), ['companyID' => 'id']);
    }

    /**
     * @param $userId
     *
     * @return int|string
     */
    public function isParticipant($userId)
    {
        return CompanyParticipant::find()->where('companyID = :thisID AND participantID = :participantID', [':thisID' => $this->id, ':participantID' => $userId])->count();
    }
}
