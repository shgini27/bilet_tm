<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Screening;

/**
 * SearchScreening represents the model behind the search form of `app\models\Screening`.
 */
class SearchScreening extends Screening
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'auditorium_id', 'show_id', 'start_hour', 'start_min'], 'integer'],
            [['screening_start'], 'safe'],
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
        $query = Screening::find();

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
            'auditorium_id' => $this->auditorium_id,
            'show_id' => $this->show_id,
            'screening_start' => $this->screening_start,
            'start_hour' => $this->start_hour,
            'start_min' => $this->start_min,
        ]);

        return $dataProvider;
    }
}
