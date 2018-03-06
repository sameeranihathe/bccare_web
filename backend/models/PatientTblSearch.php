<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PatientTbl;

/**
 * PatientTblSearch represents the model behind the search form about `backend\models\PatientTbl`.
 */
class PatientTblSearch extends PatientTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_id', 'p_gen_id', 'p_ti_id', 'p_bg_id', 'p_lang_id', 'p_discharged_stat', 'p_msg_ser_stat', 'p_loc_id', 'p_dis_id', 'p_relation_contactno', 'gn_code'], 'integer'],
            [['p_reg_num', 'p_nic', 'p_f_name', 'p_l_name', 'p_email', 'p_contact_num', 'p_address', 'p_dob', 'p_discharged_date', 'p_remarks', 'p_img_path', 'p_relation_name', 'p_relation_to_patient'], 'safe'],
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
        $query = PatientTbl::find();

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

        /* $query -> joinWith('pGen');
          $query -> joinWith('pLang');*/

        // grid filtering conditions
        $query->andFilterWhere([
            'p_id' => $this->p_id,
            'p_gen_id' => $this->p_gen_id,
            'p_ti_id' => $this->p_ti_id,
            'p_dob' => $this->p_dob,
            'p_bg_id' => $this->p_bg_id,
            'p_lang_id' => $this->p_lang_id,
            'p_discharged_stat' => $this->p_discharged_stat,
            'p_discharged_date' => $this->p_discharged_date,
            'p_msg_ser_stat' => $this->p_msg_ser_stat,
            'p_loc_id' => $this->p_loc_id,
            'p_dis_id' => $this->p_dis_id,
            'p_relation_contactno' => $this->p_relation_contactno,
            'gn_code' => $this->gn_code,
        ]);

        $query->andFilterWhere(['like', 'p_reg_num', $this->p_reg_num])
            ->andFilterWhere(['like', 'p_nic', $this->p_nic])
            ->andFilterWhere(['like', 'p_f_name', $this->p_f_name])
            ->andFilterWhere(['like', 'p_l_name', $this->p_l_name])
            ->andFilterWhere(['like', 'p_email', $this->p_email])
            ->andFilterWhere(['like', 'p_contact_num', $this->p_contact_num])
            ->andFilterWhere(['like', 'p_address', $this->p_address])
            ->andFilterWhere(['like', 'p_remarks', $this->p_remarks])
            ->andFilterWhere(['like', 'p_img_path', $this->p_img_path])
            ->andFilterWhere(['like', 'p_relation_name', $this->p_relation_name])
            ->andFilterWhere(['like', 'p_relation_to_patient', $this->p_relation_to_patient])
            //->andFilterWhere(['like', 'languages_tbl.language', $this->p_lang_id])
            //->andFilterWhere(['like', 'gendar_tbl.gendar', $this->p_gen_id])
;
        return $dataProvider;
    }
}
