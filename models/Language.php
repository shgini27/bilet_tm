<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property string $locale
 * @property string $image
 * @property string $directory
 *
 * @property ArticleCategoryTranslation[] $articleCategoryTranslations
 * @property ArticleCategory[] $articleCategories
 * @property ArticleTranslation[] $articleTranslations
 * @property Article[] $articles
 * @property CategoryTranslation[] $categoryTranslations
 * @property Category[] $categories
 * @property CulturalPlaceTranslation[] $culturalPlaceTranslations
 * @property CulturalPlace[] $culturalPlaces
 * @property ShowCategoryTranslation[] $showCategoryTranslations
 * @property ShowCategory[] $showCategories
 * @property ShowTranslation[] $showTranslations
 * @property Show[] $shows
 * @property TicketDataOptionTranslation[] $ticketDataOptionTranslations
 * @property TicketOptionData[] $ticketOptionDatas
 * @property TicketOptionTranslation[] $ticketOptionTranslations
 * @property TicketOption[] $ticketOptions
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'locale', 'image', 'directory'], 'required'],
            [['name', 'directory'], 'string', 'max' => 45],
            [['code'], 'string', 'max' => 10],
            [['locale'], 'string', 'max' => 225],
            [['image'], 'string', 'max' => 65],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'locale' => 'Locale',
            'image' => 'Image',
            'directory' => 'Directory',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategoryTranslations()
    {
        return $this->hasMany(ArticleCategoryTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategories()
    {
        return $this->hasMany(ArticleCategory::className(), ['id' => 'article_category_id'])->viaTable('article_category_translation', ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTranslations()
    {
        return $this->hasMany(ArticleTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['id' => 'article_id'])->viaTable('article_translation', ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryTranslations()
    {
        return $this->hasMany(CategoryTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('category_translation', ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCulturalPlaceTranslations()
    {
        return $this->hasMany(CulturalPlaceTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCulturalPlaces()
    {
        return $this->hasMany(CulturalPlace::className(), ['id' => 'cultural_place_id'])->viaTable('cultural_place_translation', ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShowCategoryTranslations()
    {
        return $this->hasMany(ShowCategoryTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShowCategories()
    {
        return $this->hasMany(ShowCategory::className(), ['id' => 'show_category_id'])->viaTable('show_category_translation', ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShowTranslations()
    {
        return $this->hasMany(ShowTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShows()
    {
        return $this->hasMany(Show::className(), ['id' => 'show_id'])->viaTable('show_translation', ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketDataOptionTranslations()
    {
        return $this->hasMany(TicketDataOptionTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketOptionDatas()
    {
        return $this->hasMany(TicketOptionData::className(), ['id' => 'ticket_option_data_id'])->viaTable('ticket_data_option_translation', ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketOptionTranslations()
    {
        return $this->hasMany(TicketOptionTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketOptions()
    {
        return $this->hasMany(TicketOption::className(), ['id' => 'ticket_option_id'])->viaTable('ticket_option_translation', ['language_id' => 'id']);
    }
}
