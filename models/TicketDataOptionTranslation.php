<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket_data_option_translation".
 *
 * @property string $ticket_option_data_id
 * @property string $language_id
 * @property string $option_value
 *
 * @property Language $language
 * @property TicketOptionData $ticketOptionData
 */
class TicketDataOptionTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket_data_option_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_option_data_id', 'language_id', 'option_value'], 'required'],
            [['ticket_option_data_id', 'language_id'], 'integer'],
            [['option_value'], 'string', 'max' => 100],
            [['ticket_option_data_id', 'language_id'], 'unique', 'targetAttribute' => ['ticket_option_data_id', 'language_id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['ticket_option_data_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketOptionData::className(), 'targetAttribute' => ['ticket_option_data_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ticket_option_data_id' => 'Ticket Option Data ID',
            'language_id' => 'Language ID',
            'option_value' => 'Option Value',
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
    public function getTicketOptionData()
    {
        return $this->hasOne(TicketOptionData::className(), ['id' => 'ticket_option_data_id']);
    }
}
