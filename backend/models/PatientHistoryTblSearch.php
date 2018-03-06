<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PatientHistoryTbl;

/**
 * PatientHistoryTblSearch represents the model behind the search form about `backend\models\PatientHistoryTbl`.
 */
class PatientHistoryTblSearch extends PatientHistoryTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_h_id'], 'integer'],
            [['history_date', 'histoty_title', 'history_description', 'p_id'], 'safe'],
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
        $query = PatientHistoryTbl::find();

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
		$query -> joinWith('p');

        // grid filtering conditions
        $query->andFilterWhere([
            'p_h_id' => $this->p_h_id,
            //'p_id' => $this->p_id,
            'history_date' => $this->history_date,
        ]);
		
        $query->andFilterWhere(['like', 'histoty_title', $this->histoty_title])
            ->andFilterWhere(['like', 'history_description', $this->history_description])
			->andFilterWhere(['like', 'patient_tbl.p_f_name', $this->p_id])
			->orFilterWhere(['like', 'patient_tbl.p_l_name', $this->p_id]);

        return $dataProvider;
    }
}
