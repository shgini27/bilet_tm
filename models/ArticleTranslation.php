<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_translation".
 *
 * @property int $article_id
 * @property string $language_id
 * @property string $title
 * @property string $html_description
 *
 * @property Article $article
 * @property Language $language
 */
class ArticleTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'language_id', 'title', 'html_description'], 'required'],
            [['article_id', 'language_id'], 'integer'],
            [['html_description'], 'string'],
            [['title'], 'string', 'max' => 250],
            [['article_id', 'language_id'], 'unique', 'targetAttribute' => ['article_id', 'language_id']],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'article_id' => 'Article ID',
            'language_id' => 'Language ID',
            'title' => 'Title',
            'html_description' => 'Html Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }
}
