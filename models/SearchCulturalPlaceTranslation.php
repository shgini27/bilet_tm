<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CulturalPlaceTranslation;

/**
 * SearchCulturalPlaceTranslation represents the model behind the search form of `app\models\CulturalPlaceTranslation`.
 */
class SearchCulturalPlaceTranslation extends CulturalPlaceTranslation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cultural_place_id', 'language_id'], 'integer'],
            [['place_name', 'cultural_place_description', 'place_city', 'place_street', 'work_hour', 'off_day', 'bus'], 'safe'],
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
        $query = CulturalPlaceTranslation::find();

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
            'cultural_place_id' => $this->cultural_place_id,
            'language_id' => $this->language_id,
        ]);

        $query->andFilterWhere(['like', 'place_name', $this->place_name])
            ->andFilterWhere(['like', 'cultural_place_description', $this->cultural_place_description])
            ->andFilterWhere(['like', 'place_city', $this->place_city])
            ->andFilterWhere(['like', 'place_street', $this->place_street])
            ->andFilterWhere(['like', 'work_hour', $this->work_hour])
            ->andFilterWhere(['like', 'off_day', $this->off_day])
            ->andFilterWhere(['like', 'bus', $this->bus]);

        return $dataProvider;
    }
}
