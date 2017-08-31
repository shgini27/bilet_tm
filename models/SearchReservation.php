<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reservation;

/**
 * SearchReservation represents the model behind the search form of `app\models\Reservation`.
 */
class SearchReservation extends Reservation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'reservation_type_id', 'user_id', 'screening_id', 'reserved', 'paid', 'active', 'reserv_hour', 'reserv_min'], 'integer'],
            [['ext_order_id', 'reserv_date'], 'safe'],
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
        $query = Reservation::find();

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
            'reservation_type_id' => $this->reservation_type_id,
            'user_id' => $this->user_id,
            'screening_id' => $this->screening_id,
            'reserved' => $this->reserved,
            'paid' => $this->paid,
            'active' => $this->active,
            'reserv_date' => $this->reserv_date,
            'reserv_hour' => $this->reserv_hour,
            'reserv_min' => $this->reserv_min,
        ]);

        $query->andFilterWhere(['like', 'ext_order_id', $this->ext_order_id]);

        return $dataProvider;
    }
}
