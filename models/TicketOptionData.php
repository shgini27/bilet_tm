<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket_option_data".
 *
 * @property string $id
 * @property string $ticket_option_id
 * @property string $ticket_id
 *
 * @property TicketDataOptionTranslation[] $ticketDataOptionTranslations
 * @property Language[] $languages
 * @property Ticket $ticket
 * @property TicketOption $ticketOption
 */
class TicketOptionData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket_option_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_option_id', 'ticket_id'], 'required'],
            [['ticket_option_id', 'ticket_id'], 'integer'],
            [['ticket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ticket::className(), 'targetAttribute' => ['ticket_id' => 'id']],
            [['ticket_option_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketOption::className(), 'targetAttribute' => ['ticket_option_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticket_option_id' => 'Ticket Option ID',
            'ticket_id' => 'Ticket ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketDataOptionTranslations()
    {
        return $this->hasMany(TicketDataOptionTranslation::className(), ['ticket_option_data_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('ticket_data_option_translation', ['ticket_option_data_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(Ticket::className(), ['id' => 'ticket_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketOption()
    {
        return $this->hasOne(TicketOption::className(), ['id' => 'ticket_option_id']);
    }
}
