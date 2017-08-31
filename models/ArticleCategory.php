<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_category".
 *
 * @property int $id
 *
 * @property Article[] $articles
 * @property ArticleCategoryTranslation[] $articleCategoryTranslations
 * @property Language[] $languages
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['article_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategoryTranslations()
    {
        return $this->hasMany(ArticleCategoryTranslation::className(), ['article_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('article_category_translation', ['article_category_id' => 'id']);
    }
}
