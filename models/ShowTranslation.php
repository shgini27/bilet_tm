<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "show_translation".
 *
 * @property string $show_id
 * @property string $language_id
 * @property string $show_name
 * @property string $show_description
 *
 * @property Language $language
 * @property Show $show
 */
class ShowTranslation extends \yii\db\ActiveRecord
{
	
	public static function find()
    {
		$id = Yii::$app->session->get('langId');
        return parent::find()->where(['language_id' => $id]);
    }
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'show_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['show_id', 'language_id', 'show_name', 'show_description'], 'required'],
            [['show_id', 'language_id'], 'integer'],
            [['show_name'], 'string', 'max' => 65],
            [['show_description'], 'string', 'max' => 250],
            [['show_id', 'language_id'], 'unique', 'targetAttribute' => ['show_id', 'language_id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['show_id'], 'exist', 'skipOnError' => true, 'targetClass' => Show::className(), 'targetAttribute' => ['show_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'show_id' => 'Show ID',
            'language_id' => 'Language ID',
            'show_name' => 'Show Name',
            'show_description' => 'Show Description',
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
    public function getShow()
    {
        return $this->hasOne(Show::className(), ['id' => 'show_id']);
    }
}
