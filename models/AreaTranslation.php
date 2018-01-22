<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area_translation".
 *
 * @property string $id
 * @property string $sourceID
 * @property string $language
 * @property string $name
 *
 * @property Area $source
 */
class AreaTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sourceID', 'language', 'name'], 'required'],
            [['sourceID'], 'integer'],
            [['language'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 255],
            [['sourceID'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['sourceID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sourceID' => Yii::t('app', 'Source ID'),
            'language' => Yii::t('app', 'Language'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Area::className(), ['id' => 'sourceID']);
    }
}
