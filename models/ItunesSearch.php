<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Itunes;

/**
 * ItunesSearch represents the model behind the search form of `app\models\Itunes`.
 */
class ItunesSearch extends Itunes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transaction_id', 'original_transaction_id', 'profile_id', 'order_id', 'payment_state', 'status'], 'integer'],
            [['new_receipt', 'req_receipt', 'product_id', 'expires_date', 'created_at', 'updated_at', 'environment'], 'safe'],
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
        $query = Itunes::find();

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
            'transaction_id' => $this->transaction_id,
            'original_transaction_id' => $this->original_transaction_id,
            'profile_id' => $this->profile_id,
            'order_id' => $this->order_id,
            'payment_state' => $this->payment_state,
            'status' => $this->status,
            'expires_date' => $this->expires_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'new_receipt', $this->new_receipt])
            ->andFilterWhere(['like', 'req_receipt', $this->req_receipt])
            ->andFilterWhere(['like', 'product_id', $this->product_id])
            ->andFilterWhere(['like', 'environment', $this->environment]);

        return $dataProvider;
    }
}
