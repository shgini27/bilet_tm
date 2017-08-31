<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int $article_category_id
 * @property string $image_name
 * @property string $post_date
 *
 * @property ArticleCategory $articleCategory
 * @property ArticleTranslation[] $articleTranslations
 * @property Language[] $languages
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_category_id'], 'required'],
            [['article_category_id'], 'integer'],
            [['post_date'], 'safe'],
            [['image_name'], 'string', 'max' => 65],
            [['article_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCategory::className(), 'targetAttribute' => ['article_category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_category_id' => 'Article Category ID',
            'image_name' => 'Image Name',
            'post_date' => 'Post Date',
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
    public function getArticleTranslations()
    {
        return $this->hasMany(ArticleTranslation::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('article_translation', ['article_id' => 'id']);
    }
}
