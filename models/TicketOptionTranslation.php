<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket_option_translation".
 *
 * @property string $ticket_option_id
 * @property string $language_id
 * @property string $option_name
 *
 * @property Language $language
 * @property TicketOption $ticketOption
 */
class TicketOptionTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket_option_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_option_id', 'language_id', 'option_name'], 'required'],
            [['ticket_option_id', 'language_id'], 'integer'],
            [['option_name'], 'string', 'max' => 65],
            [['ticket_option_id', 'language_id'], 'unique', 'targetAttribute' => ['ticket_option_id', 'language_id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['ticket_option_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketOption::className(), 'targetAttribute' => ['ticket_option_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ticket_option_id' => 'Ticket Option ID',
            'language_id' => 'Language ID',
            'option_name' => 'Option Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketOption()
    {
        return $this->hasOne(TicketOption::className(), ['id' => 'ticket_option_id']);
    }
}
