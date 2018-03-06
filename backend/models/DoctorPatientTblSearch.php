<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DoctorPatientTbl;

/**
 * DoctorPatientTblSearch represents the model behind the search form about `backend\models\DoctorPatientTbl`.
 */
class DoctorPatientTblSearch extends DoctorPatientTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['d_p_id'], 'integer'],
            [['d_id','p_id'], 'safe'],
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
        $query = DoctorPatientTbl::find();

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
         $query -> joinWith('d');
         $query -> joinWith('p');

        // grid filtering conditions
        $query->andFilterWhere([
            'd_p_id' => $this->d_p_id,
            //'d_id' => $this->d_id,
           // 'p_id' => $this->p_id,
        ]);
        $query->andFilterWhere(['like', 'doctor_tbl.d_f_name', $this->d_id]);
         $query->andFilterWhere(['like', 'patient_tbl.p_f_name', $this->p_id]);

        return $dataProvider;
    }

    public function search2($id)
    {
        $query = DoctorPatientTbl::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query -> joinWith('p');

        // grid filtering conditions
        $query->andFilterWhere([
            'd_id' => $id,
          //  'd_id' => $this->d_id,
           // 'n_id' => $this->n_id,
        ]);
        return $dataProvider;
    }

    public function search5($id)
    {
        $query = DoctorPatientTbl::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query -> joinWith('d');

        // grid filtering conditions
        $query->andFilterWhere([
            'p_id' => $id,
          //  'd_id' => $this->d_id,
           // 'n_id' => $this->n_id,
        ]);
        return $dataProvider;
    }


    public function search3($id)
    {
        $query = DoctorPatientTbl::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query -> joinWith('d');

        // grid filtering conditions
        $query->andFilterWhere([
            'doctor_patient_tbl.p_id' => $id,
          //  'd_id' => $this->d_id,
           // 'n_id' => $this->n_id,
        ]);
        return $dataProvider;
    }


    
}
