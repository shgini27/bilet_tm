<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cultural_place".
 *
 * @property string $id
 * @property int $category_id
 * @property string $tel1
 * @property string $tel2
 * @property string $tel3
 * @property string $fax
 * @property string $email
 * @property string $image_name
 *
 * @property Category $category
 * @property CulturalPlaceTranslation[] $culturalPlaceTranslations
 * @property Language[] $languages
 * @property Show[] $shows
 */
class CulturalPlace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cultural_place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'tel1', 'image_name'], 'required'],
            [['category_id'], 'integer'],
            [['tel1', 'tel2', 'tel3', 'fax', 'image_name'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 65],
            [['tel1'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'tel1' => 'Tel1',
            'tel2' => 'Tel2',
            'tel3' => 'Tel3',
            'fax' => 'Fax',
            'email' => 'Email',
            'image_name' => 'Image Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCulturalPlaceTranslations()
    {
        return $this->hasMany(CulturalPlaceTranslation::className(), ['cultural_place_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('cultural_place_translation', ['cultural_place_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShows()
    {
        return $this->hasMany(Show::className(), ['cultural_place_id' => 'id']);
    }
}
