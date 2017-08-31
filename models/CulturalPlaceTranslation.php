<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cultural_place_translation".
 *
 * @property string $cultural_place_id
 * @property string $language_id
 * @property string $place_name
 * @property string $cultural_place_description
 * @property string $place_city
 * @property string $place_street
 * @property string $work_hour
 * @property string $off_day
 * @property string $bus
 *
 * @property CulturalPlace $culturalPlace
 * @property Language $language
 */
class CulturalPlaceTranslation extends \yii\db\ActiveRecord
{
    public static function find()
    {
		$id = Yii::$app->session->get('langId');
        return parent::find()->where(['language_id' => $id]);
    }
	
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cultural_place_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cultural_place_id', 'language_id', 'place_name', 'cultural_place_description', 'place_city', 'place_street', 'work_hour', 'bus'], 'required'],
            [['cultural_place_id', 'language_id'], 'integer'],
            [['cultural_place_description'], 'string'],
            [['place_name'], 'string', 'max' => 100],
            [['place_city'], 'string', 'max' => 45],
            [['place_street'], 'string', 'max' => 65],
            [['work_hour', 'off_day', 'bus'], 'string', 'max' => 60],
            [['cultural_place_id', 'language_id'], 'unique', 'targetAttribute' => ['cultural_place_id', 'language_id']],
            [['cultural_place_id'], 'exist', 'skipOnError' => true, 'targetClass' => CulturalPlace::className(), 'targetAttribute' => ['cultural_place_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cultural_place_id' => 'Cultural Place ID',
            'language_id' => 'Language ID',
            'place_name' => 'Place Name',
            'cultural_place_description' => 'Cultural Place Description',
            'place_city' => 'Place City',
            'place_street' => 'Place Street',
            'work_hour' => 'Work Hour',
            'off_day' => 'Off Day',
            'bus' => 'Bus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCulturalPlace()
    {
        return $this->hasOne(CulturalPlace::className(), ['id' => 'cultural_place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }
}
