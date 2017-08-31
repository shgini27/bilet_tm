<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscriber".
 *
 * @property string $id
 * @property string $email
 */
class Subscriber extends \yii\db\ActiveRecord
{
	//public $email;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscriber';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
        ];
    }
}
