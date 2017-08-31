<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservation_type".
 *
 * @property string $id
 * @property string $reservation_type
 *
 * @property Reservation[] $reservations
 */
class ReservationType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservation_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reservation_type'], 'required'],
            [['reservation_type'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reservation_type' => 'Reservation Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['reservation_type_id' => 'id']);
    }
}
