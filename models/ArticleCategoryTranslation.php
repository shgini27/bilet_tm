<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_category_translation".
 *
 * @property int $article_category_id
 * @property string $language_id
 * @property string $article_category_name
 *
 * @property ArticleCategory $articleCategory
 * @property Language $language
 */
class ArticleCategoryTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_category_id', 'language_id', 'article_category_name'], 'required'],
            [['article_category_id', 'language_id'], 'integer'],
            [['article_category_name'], 'string', 'max' => 45],
            [['article_category_name'], 'unique'],
            [['article_category_id', 'language_id'], 'unique', 'targetAttribute' => ['article_category_id', 'language_id']],
            [['article_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCategory::className(), 'targetAttribute' => ['article_category_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'article_category_id' => 'Article Category ID',
            'language_id' => 'Language ID',
            'article_category_name' => 'Article Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'article_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }
}
