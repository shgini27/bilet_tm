<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_translation".
 *
 * @property int $category_id
 * @property string $language_id
 * @property string $category_name
 *
 * @property Category $category
 * @property Language $language
 */
class CategoryTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'language_id', 'category_name'], 'required'],
            [['category_id', 'language_id'], 'integer'],
            [['category_name'], 'string', 'max' => 60],
            [['category_name'], 'unique'],
            [['category_id', 'language_id'], 'unique', 'targetAttribute' => ['category_id', 'language_id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'language_id' => 'Language ID',
            'category_name' => 'Category Name',
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
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }
}
