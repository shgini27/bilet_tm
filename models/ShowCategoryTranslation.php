<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "show_category_translation".
 *
 * @property string $show_category_id
 * @property string $language_id
 * @property string $category_name
 *
 * @property Language $language
 * @property ShowCategory $showCategory
 */
class ShowCategoryTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'show_category_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['show_category_id', 'language_id', 'category_name'], 'required'],
            [['show_category_id', 'language_id'], 'integer'],
            [['category_name'], 'string', 'max' => 45],
            [['category_name'], 'unique'],
            [['show_category_id', 'language_id'], 'unique', 'targetAttribute' => ['show_category_id', 'language_id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['show_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShowCategory::className(), 'targetAttribute' => ['show_category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'show_category_id' => 'Show Category ID',
            'language_id' => 'Language ID',
            'category_name' => 'Category Name',
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
    public function getShowCategory()
    {
        return $this->hasOne(ShowCategory::className(), ['id' => 'show_category_id']);
    }
}
