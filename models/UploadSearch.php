<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Upload;

/**
 * UploadSearch represents the model behind the search form of `app\models\Upload`.
 */
class UploadSearch extends Upload
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['upload_id', 'user_id'], 'integer'],
            [['name', 'filename', 'code', 'date_added'], 'safe'],
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
        $query = Upload::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'upload_id' => $this->upload_id,
            'user_id' => $this->user_id,
            'date_added' => $this->date_added,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
