<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PatientDailyStatusTbl;

/**
 * PatientDailyStatusTblSearch represents the model behind the search form about `backend\models\PatientDailyStatusTbl`.
 */
class PatientDailyStatusTblSearch extends PatientDailyStatusTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_daily_status_id', 'stat_vaule'], 'integer'],
            [['stat_date_time', 'p_id'], 'safe'],
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
        $query = PatientDailyStatusTbl::find();

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
            'p_daily_status_id' => $this->p_daily_status_id,
            //'p_id' => $this->p_id,
            'stat_date_time' => $this->stat_date_time,
            'stat_vaule' => $this->stat_vaule,
        ]);
		$query->andFilterWhere(['like', 'patient_tbl.p_f_name', $this->p_id])
			->orFilterWhere(['like', 'patient_tbl.p_l_name', $this->p_id]);

        return $dataProvider;
    }
}
