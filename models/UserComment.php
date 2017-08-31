<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property string $id
 * @property string $show_id
 * @property int $user_id
 * @property string $name
 * @property string $comment
 * @property string $comment_date
 * @property int $star_count
 *
 * @property Show $show
 * @property User $user
 */
class UserComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['show_id', 'user_id', 'name', 'comment', 'star_count'], 'required'],
            [['show_id', 'user_id', 'star_count'], 'integer'],
            [['comment'], 'string'],
            [['comment_date'], 'safe'],
            [['name'], 'string', 'max' => 45],
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
            'show_id' => 'Show ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'comment' => 'Comment',
            'comment_date' => 'Comment Date',
            'star_count' => 'Star Count',
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
}
