<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visit".
 *
 * @property string $id
 * @property string $show_id
 * @property int $number_visit
 * @property string $date_visit
 * @property string $ip
 *
 * @property Show $show
 */
class Visit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['show_id', 'number_visit', 'ip'], 'required'],
            [['show_id', 'number_visit'], 'integer'],
            [['date_visit'], 'safe'],
            [['ip'], 'string', 'max' => 45],
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
            'number_visit' => 'Number Visit',
            'date_visit' => 'Date Visit',
            'ip' => 'Ip',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShow()
    {
        return $this->hasOne(Show::className(), ['id' => 'show_id']);
    }
}
