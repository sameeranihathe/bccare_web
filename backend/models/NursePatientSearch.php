<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\NursePatient;

/**
 * NursePatientSearch represents the model behind the search form about `backend\models\NursePatient`.
 */
class NursePatientSearch extends NursePatient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['n_p_id',], 'integer'],
            [[ 'n_id', 'p_id'], 'safe'],
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
        $query = NursePatient::find();

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
         $query -> joinWith('n');
         $query -> joinWith('p');

        // grid filtering conditions
        $query->andFilterWhere([
            'n_p_id' => $this->n_p_id,
           // 'n_id' => $this->n_id,
           // 'p_id' => $this->p_id,
        ]);
         $query->andFilterWhere(['like', 'nurse_tbl.n_f_name', $this->n_id]);
         $query->andFilterWhere(['like', 'patient_tbl.p_f_name', $this->p_id]);
        return $dataProvider;
    }

//search patient
     public function search4($id)
    {
        $query = NursePatient::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query -> joinWith('p');

        // grid filtering conditions
        $query->andFilterWhere([
            'patient_tbl.p_id' => $id,
          //  'd_id' => $this->d_id,
           // 'n_id' => $this->n_id,
        ]);
        return $dataProvider;
    }

    
    public function searchpatientfornurse($id)
    {
        $query = NursePatient::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query -> joinWith('p');

        // grid filtering conditions
        $query->andFilterWhere([
            'nurse_patient.n_id' => $id,
          //  'd_id' => $this->d_id,
           // 'n_id' => $this->n_id,
        ]);
        return $dataProvider;
    }

    public function search5($id)
    {
        $query = NursePatient::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query -> joinWith('n');

        // grid filtering conditions
        $query->andFilterWhere([
            'nurse_patient.p_id' => $id,
          //  'd_id' => $this->d_id,
           // 'n_id' => $this->n_id,
        ]);
        return $dataProvider;
    }

    
}
