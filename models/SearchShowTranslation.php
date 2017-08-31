<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ShowTranslation;

/**
 * SearchShowTranslation represents the model behind the search form of `app\models\ShowTranslation`.
 */
class SearchShowTranslation extends ShowTranslation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['show_id', 'language_id'], 'integer'],
            [['show_name', 'show_description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ShowTranslation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'show_id' => $this->show_id,
            'language_id' => $this->language_id,
        ]);

        $query->andFilterWhere(['like', 'show_name', $this->show_name])
            ->andFilterWhere(['like', 'show_description', $this->show_description]);

        return $dataProvider;
    }
}
