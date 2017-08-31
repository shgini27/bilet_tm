<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property string $id
 * @property int $user_id
 * @property string $show_id
 * @property int $ticket_count
 * @property string $amount
 * @property string $date_created
 * @property string $confirmation_number
 *
 * @property Show $show
 * @property User $user
 * @property TicketHasOrder[] $ticketHasOrders
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'show_id', 'ticket_count', 'amount', 'confirmation_number'], 'required'],
            [['user_id', 'show_id', 'ticket_count'], 'integer'],
            [['amount'], 'number'],
            [['date_created'], 'safe'],
            [['confirmation_number'], 'string', 'max' => 100],
            [['show_id'], 'exist', 'skipOnError' => true, 'targetClass' => Show::className(), 'targetAttribute' => ['show_id' => 'id']],
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
            'user_id' => 'User ID',
            'show_id' => 'Show ID',
            'ticket_count' => 'Ticket Count',
            'amount' => 'Amount',
            'date_created' => 'Date Created',
            'confirmation_number' => 'Confirmation Number',
        ];
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketHasOrders()
    {
        return $this->hasMany(TicketHasOrder::className(), ['order_id' => 'id']);
    }
}
