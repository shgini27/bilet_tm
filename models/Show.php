<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "show".
 *
 * @property string $id
 * @property string $show_category_id
 * @property string $cultural_place_id
 * @property string $begin_date
 * @property string $end_date
 * @property int $start_hour
 * @property int $start_min
 * @property int $end_hour
 * @property int $end_min
 * @property string $image_name
 * @property int $show_status
 *
 * @property Comment[] $comments
 * @property Like[] $likes
 * @property Order[] $orders
 * @property Screening[] $screenings
 * @property CulturalPlace $culturalPlace
 * @property ShowCategory $showCategory
 * @property ShowTranslation[] $showTranslations
 * @property Language[] $languages
 * @property Ticket[] $tickets
 * @property Visit[] $visits
 */
class Show extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'show';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['show_category_id', 'cultural_place_id', 'begin_date', 'end_date', 'start_hour', 'start_min', 'end_hour', 'end_min', 'image_name', 'show_status'], 'required'],
            [['show_category_id', 'cultural_place_id', 'start_hour', 'start_min', 'end_hour', 'end_min', 'show_status'], 'integer'],
            [['begin_date', 'end_date'], 'safe'],
            [['image_name'], 'string', 'max' => 65],
            [['cultural_place_id'], 'exist', 'skipOnError' => true, 'targetClass' => CulturalPlace::className(), 'targetAttribute' => ['cultural_place_id' => 'id']],
            [['show_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShowCategory::className(), 'targetAttribute' => ['show_category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'show_category_id' => Yii::t('app', 'Show Category ID'),
            'cultural_place_id' => Yii::t('app', 'Cultural Place ID'),
            'begin_date' => Yii::t('app', 'Begin Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'start_hour' => Yii::t('app', 'Start Hour'),
            'start_min' => Yii::t('app', 'Start Min'),
            'end_hour' => Yii::t('app', 'End Hour'),
            'end_min' => Yii::t('app', 'End Min'),
            'image_name' => Yii::t('app', 'Image Name'),
            'show_status' => Yii::t('app', 'Show Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['show_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::className(), ['show_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['show_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScreenings()
    {
        return $this->hasMany(Screening::className(), ['show_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCulturalPlace()
    {
        return $this->hasOne(CulturalPlace::className(), ['id' => 'cultural_place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShowCategory()
    {
        return $this->hasOne(ShowCategory::className(), ['id' => 'show_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShowTranslations()
    {
        return $this->hasMany(ShowTranslation::className(), ['show_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('show_translation', ['show_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['show_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisits()
    {
        return $this->hasMany(Visit::className(), ['show_id' => 'id']);
    }
}
