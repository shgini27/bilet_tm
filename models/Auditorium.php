<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "auditorium".
 *
 * @property string $id
 * @property string $cultural_place_id
 * @property string $name
 * @property int $seats_no
 *
 * @property CulturalPlace $culturalPlace
 * @property Screening[] $screenings
 * @property Seat[] $seats
 */
class Auditorium extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auditorium';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cultural_place_id', 'name', 'seats_no'], 'required'],
            [['cultural_place_id', 'seats_no'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['cultural_place_id'], 'exist', 'skipOnError' => true, 'targetClass' => CulturalPlace::className(), 'targetAttribute' => ['cultural_place_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cultural_place_id' => 'Cultural Place ID',
            'name' => 'Name',
            'seats_no' => 'Seats No',
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
    public function getScreenings()
    {
        return $this->hasMany(Screening::className(), ['auditorium_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeats()
    {
        return $this->hasMany(Seat::className(), ['auditorium_id' => 'id']);
    }
}
