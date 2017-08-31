<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Show;

/**
 * SearchShow represents the model behind the search form of `app\models\Show`.
 */
class SearchShow extends Show
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'show_category_id', 'cultural_place_id', 'start_hour', 'start_min', 'end_hour', 'end_min', 'show_status'], 'integer'],
            [['begin_date', 'end_date', 'image_name'], 'safe'],
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
        $query = Show::find();

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
            'id' => $this->id,
            'show_category_id' => $this->show_category_id,
            'cultural_place_id' => $this->cultural_place_id,
            'begin_date' => $this->begin_date,
            'end_date' => $this->end_date,
            'start_hour' => $this->start_hour,
            'start_min' => $this->start_min,
            'end_hour' => $this->end_hour,
            'end_min' => $this->end_min,
            'show_status' => $this->show_status,
        ]);

        $query->andFilterWhere(['like', 'image_name', $this->image_name]);

        return $dataProvider;
    }
}
