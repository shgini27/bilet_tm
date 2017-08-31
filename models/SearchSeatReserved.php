<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SeatReserved;

/**
 * SearchSeatReserved represents the model behind the search form of `app\models\SeatReserved`.
 */
class SearchSeatReserved extends SeatReserved
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'seat_id', 'screening_id', 'reservation_id', 'row', 'colum'], 'integer'],
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
        $query = SeatReserved::find();

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
            'seat_id' => $this->seat_id,
            'screening_id' => $this->screening_id,
            'reservation_id' => $this->reservation_id,
            'row' => $this->row,
            'colum' => $this->colum,
        ]);

        return $dataProvider;
    }
}
