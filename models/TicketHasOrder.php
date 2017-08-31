<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket_has_order".
 *
 * @property string $ticket_id
 * @property string $order_id
 * @property string $seat_reserved_id
 *
 * @property Order $order
 * @property SeatReserved $seatReserved
 * @property Ticket $ticket
 */
class TicketHasOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket_has_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_id', 'order_id', 'seat_reserved_id'], 'required'],
            [['ticket_id', 'order_id', 'seat_reserved_id'], 'integer'],
            [['ticket_id', 'order_id', 'seat_reserved_id'], 'unique', 'targetAttribute' => ['ticket_id', 'order_id', 'seat_reserved_id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['seat_reserved_id'], 'exist', 'skipOnError' => true, 'targetClass' => SeatReserved::className(), 'targetAttribute' => ['seat_reserved_id' => 'id']],
            [['ticket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ticket::className(), 'targetAttribute' => ['ticket_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ticket_id' => 'Ticket ID',
            'order_id' => 'Order ID',
            'seat_reserved_id' => 'Seat Reserved ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeatReserved()
    {
        return $this->hasOne(SeatReserved::className(), ['id' => 'seat_reserved_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(Ticket::className(), ['id' => 'ticket_id']);
    }
}
