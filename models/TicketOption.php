<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket_option".
 *
 * @property string $id
 *
 * @property TicketOptionData[] $ticketOptionDatas
 * @property TicketOptionTranslation[] $ticketOptionTranslations
 * @property Language[] $languages
 */
class TicketOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketOptionDatas()
    {
        return $this->hasMany(TicketOptionData::className(), ['ticket_option_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketOptionTranslations()
    {
        return $this->hasMany(TicketOptionTranslation::className(), ['ticket_option_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('ticket_option_translation', ['ticket_option_id' => 'id']);
    }
}
