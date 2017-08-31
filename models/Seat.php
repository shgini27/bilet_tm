<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seat".
 *
 * @property string $id
 * @property string $auditorium_id
 * @property int $row
 * @property int $number
 *
 * @property Auditorium $auditorium
 * @property SeatReserved[] $seatReserveds
 */
class Seat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auditorium_id', 'row', 'number'], 'required'],
            [['auditorium_id', 'row', 'number'], 'integer'],
            [['auditorium_id'], 'exist', 'skipOnError' => true, 'targetClass' => Auditorium::className(), 'targetAttribute' => ['auditorium_id' => 'id']],
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
            'row' => 'Row',
            'number' => 'Number',
        ];
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
    public function getSeatReserveds()
    {
        return $this->hasMany(SeatReserved::className(), ['seat_id' => 'id']);
    }
}
