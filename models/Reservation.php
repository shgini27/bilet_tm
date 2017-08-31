<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservation".
 *
 * @property string $id
 * @property string $reservation_type_id
 * @property int $user_id
 * @property string $screening_id
 * @property int $reserved
 * @property string $ext_order_id
 * @property int $paid
 * @property int $active
 * @property string $reserv_date
 * @property int $reserv_hour
 * @property int $reserv_min
 *
 * @property ReservationType $reservationType
 * @property Screening $screening
 * @property User $user
 * @property SeatReserved[] $seatReserveds
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reservation_type_id', 'user_id', 'screening_id', 'reserved', 'ext_order_id', 'paid', 'active', 'reserv_hour', 'reserv_min'], 'required'],
            [['reservation_type_id', 'user_id', 'screening_id', 'reserved', 'paid', 'active', 'reserv_hour', 'reserv_min'], 'integer'],
            [['reserv_date'], 'safe'],
            [['ext_order_id'], 'string', 'max' => 100],
            [['reservation_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReservationType::className(), 'targetAttribute' => ['reservation_type_id' => 'id']],
            [['screening_id'], 'exist', 'skipOnError' => true, 'targetClass' => Screening::className(), 'targetAttribute' => ['screening_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reservation_type_id' => 'Reservation Type ID',
            'user_id' => 'User ID',
            'screening_id' => 'Screening ID',
            'reserved' => 'Reserved',
            'ext_order_id' => 'Ext Order ID',
            'paid' => 'Paid',
            'active' => 'Active',
            'reserv_date' => 'Reserv Date',
            'reserv_hour' => 'Reserv Hour',
            'reserv_min' => 'Reserv Min',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservationType()
    {
        return $this->hasOne(ReservationType::className(), ['id' => 'reservation_type_id']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeatReserveds()
    {
        return $this->hasMany(SeatReserved::className(), ['reservation_id' => 'id']);
    }
}
