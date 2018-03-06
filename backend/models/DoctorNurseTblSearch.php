<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DoctorNurseTbl;

/**
 * DoctorNurseTblSearch represents the model behind the search form about `backend\models\DoctorNurseTbl`.
 */
class DoctorNurseTblSearch extends DoctorNurseTbl
{
    /**
     * @inheritdoc
     */

    /* your calculated attribute */
   

    public function rules()
    {
        return [
            [['d_n_id'], 'integer'],
            [['d_id','n_id'], 'safe'],
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
        $query = DoctorNurseTbl::find();


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
        $query -> joinWith('n');

        // grid filtering conditions
        $query->andFilterWhere([
            'd_n_id' => $this->d_n_id,
          //  'd_id' => $this->d_id,
           // 'n_id' => $this->n_id,
        ]);

        $query->andFilterWhere(['like', 'doctor_tbl.d_f_name', $this->d_id]);
        $query->andFilterWhere(['like', 'nurse_tbl.n_f_name', $this->n_id]);

        return $dataProvider;
    }
//searching nurse 
    public function search2($id)
    {
        $query = DoctorNurseTbl::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query -> joinWith('n');

        // grid filtering conditions
        $query->andFilterWhere([
            'd_id' => $id,
          //  'd_id' => $this->d_id,
           // 'n_id' => $this->n_id,
        ]);
        return $dataProvider;
    }

//searching doctor
    
public function searchdoctorfornurse($id)
    {
        $query = DoctorNurseTbl::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query -> joinWith('d');

        // grid filtering conditions
        $query->andFilterWhere([
            'n_id' => $id,
          //  'd_id' => $this->d_id,
           // 'n_id' => $this->n_id,
        ]);
        return $dataProvider;
    }

    










}
