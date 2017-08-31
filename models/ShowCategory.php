<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "show_category".
 *
 * @property string $id
 *
 * @property Show[] $shows
 * @property ShowCategoryTranslation[] $showCategoryTranslations
 * @property Language[] $languages
 */
class ShowCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'show_category';
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
    public function getShows()
    {
        return $this->hasMany(Show::className(), ['show_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShowCategoryTranslations()
    {
        return $this->hasMany(ShowCategoryTranslation::className(), ['show_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('show_category_translation', ['show_category_id' => 'id']);
    }
}
