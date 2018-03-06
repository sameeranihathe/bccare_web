<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PDlyStatusTbl;

/**
 * PDlyStatusTblSearch represents the model behind the search form about `backend\models\PDlyStatusTbl`.
 */
class PDlyStatusTblSearch extends PDlyStatusTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_dly_stat_id', 'p_dly_stat_value'], 'integer'],
            [['p_dly_stat_date', 'p_id', 'p_dly_stat_time'], 'safe'],
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
        $query = PDlyStatusTbl::find();

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
            'p_dly_stat_id' => $this->p_dly_stat_id,
            //'p_id' => $this->p_id,
            'p_dly_stat_date' => $this->p_dly_stat_date,
            'p_dly_stat_time' => $this->p_dly_stat_time,
            'p_dly_stat_value' => $this->p_dly_stat_value,
        ]);
		$query->andFilterWhere(['like', 'patient_tbl.p_f_name', $this->p_id])
			->orFilterWhere(['like', 'patient_tbl.p_l_name', $this->p_id]);

        return $dataProvider;
    }
}
