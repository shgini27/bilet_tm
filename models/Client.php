<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $firstname
 * @property string $surname
 * @property string $email
 * @property string $user_name
 * @property string $pass
 * @property string $type
 * @property string $date_entered
 *
 * @property Like[] $likes
 * @property Order[] $orders
 * @property Reservation[] $reservations
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'surname', 'email', 'user_name', 'pass', 'type'], 'required'],
            [['type'], 'string'],
            [['date_entered'], 'safe'],
            [['firstname', 'surname', 'email'], 'string', 'max' => 45],
            [['user_name'], 'string', 'max' => 60],
            [['pass'], 'string', 'max' => 64],
            [['email'], 'unique'],
            [['user_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'surname' => 'Surname',
            'email' => 'Email',
            'user_name' => 'User Name',
            'pass' => 'Pass',
            'type' => 'Type',
            'date_entered' => 'Date Entered',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['user_id' => 'id']);
    }
}
