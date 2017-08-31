<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property string $id
 * @property string $show_id
 * @property int $total_ticket
 *
 * @property Show $show
 * @property TicketHasOrder[] $ticketHasOrders
 * @property TicketOptionData[] $ticketOptionDatas
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['show_id', 'total_ticket'], 'required'],
            [['show_id', 'total_ticket'], 'integer'],
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
            'show_id' => 'Show ID',
            'total_ticket' => 'Total Ticket',
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
    public function getTicketHasOrders()
    {
        return $this->hasMany(TicketHasOrder::className(), ['ticket_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketOptionDatas()
    {
        return $this->hasMany(TicketOptionData::className(), ['ticket_id' => 'id']);
    }
}
