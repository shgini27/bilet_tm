<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seat_reserved".
 *
 * @property string $id
 * @property string $seat_id
 * @property string $screening_id
 * @property string $reservation_id
 * @property int $row
 * @property int $colum
 *
 * @property Reservation $reservation
 * @property Screening $screening
 * @property Seat $seat
 * @property TicketHasOrder[] $ticketHasOrders
 */
class SeatReserved extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seat_reserved';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seat_id', 'screening_id', 'reservation_id', 'row', 'colum'], 'required'],
            [['seat_id', 'screening_id', 'reservation_id', 'row', 'colum'], 'integer'],
            [['reservation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reservation::className(), 'targetAttribute' => ['reservation_id' => 'id']],
            [['screening_id'], 'exist', 'skipOnError' => true, 'targetClass' => Screening::className(), 'targetAttribute' => ['screening_id' => 'id']],
            [['seat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seat::className(), 'targetAttribute' => ['seat_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seat_id' => 'Seat ID',
            'screening_id' => 'Screening ID',
            'reservation_id' => 'Reservation ID',
            'row' => 'Row',
            'colum' => 'Colum',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservation()
    {
        return $this->hasOne(Reservation::className(), ['id' => 'reservation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScreening()
    {
        return $this->hasOne(Screening::className(), ['id' => 'screening_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeat()
    {
        return $this->hasOne(Seat::className(), ['id' => 'seat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketHasOrders()
    {
        return $this->hasMany(TicketHasOrder::className(), ['seat_reserved_id' => 'id']);
    }
}
