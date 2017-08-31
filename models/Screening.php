<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "screening".
 *
 * @property string $id
 * @property string $auditorium_id
 * @property string $show_id
 * @property string $screening_start
 * @property int $start_hour
 * @property int $start_min
 *
 * @property Reservation[] $reservations
 * @property Auditorium $auditorium
 * @property Show $show
 * @property SeatReserved[] $seatReserveds
 */
class Screening extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'screening';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auditorium_id', 'show_id', 'screening_start', 'start_hour', 'start_min'], 'required'],
            [['auditorium_id', 'show_id', 'start_hour', 'start_min'], 'integer'],
            [['screening_start'], 'safe'],
            [['auditorium_id'], 'exist', 'skipOnError' => true, 'targetClass' => Auditorium::className(), 'targetAttribute' => ['auditorium_id' => 'id']],
            [['show_id'], 'exist', 'skipOnError' => true, 'targetClass' => Show::className(), 'targetAttribute' => ['show_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auditorium_id' => 'Auditorium ID',
            'show_id' => 'Show ID',
            'screening_start' => 'Screening Start',
            'start_hour' => 'Start Hour',
            'start_min' => 'Start Min',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['screening_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditorium()
    {
        return $this->hasOne(Auditorium::className(), ['id' => 'auditorium_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShow()
    {
        return $this->hasOne(Show::className(), ['id' => 'show_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeatReserveds()
    {
        return $this->hasMany(SeatReserved::className(), ['screening_id' => 'id']);
    }
}
