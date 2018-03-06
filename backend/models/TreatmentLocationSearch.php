<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TreatmentLocationTbl;

/**
 * TreatmentLocationSearch represents the model behind the search form about `backend\models\TreatmentLocationTbl`.
 */
class TreatmentLocationSearch extends TreatmentLocationTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loc_id'], 'integer'],
            [['loc_name', 'description'], 'safe'],
            [['lat', 'lng'], 'number'],
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
        $query = TreatmentLocationTbl::find();

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
            'loc_id' => $this->loc_id,
            'lat' => $this->lat,
            'lng' => $this->lng,
        ]);

        $query->andFilterWhere(['like', 'loc_name', $this->loc_name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
