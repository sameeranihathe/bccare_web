<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\NurseTbl;

/**
 * NurseTblSearch represents the model behind the search form about `backend\models\NurseTbl`.
 */
class NurseTblSearch extends NurseTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['n_id'], 'integer'],
            [['n_reg_num', 'n_nic', 'n_f_name', 'n_l_name', 'n_email', 'n_contact_num', 'n_address', 'n_dob', 'n_img_path','n_ti_id','n_gen_id','n_desig_id','n_lang_id', 'n_loc_id'], 'safe'],
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
        $query = NurseTbl::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $session=Yii::$app->user->identity->admin_loc_id;
        
        $admin_type=Yii::$app->user->identity->admin_type;
        if($admin_type==1){
            $query->Where(['like', 'n_loc_id', $session]);
        }

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

         /*$query -> joinWith('nTi');
         $query -> joinWith('nGen');
         $query -> joinWith('nDesig');
         $query -> joinWith('nLang');
         $query -> joinWith('nLoc');*/

        // grid filtering conditions
        $query->andFilterWhere([
            'n_id' => $this->n_id,
            'n_gen_id' => $this->n_gen_id,
            'n_ti_id' => $this->n_ti_id,
            'n_dob' => $this->n_dob,
            'n_lang_id' => $this->n_lang_id,
            'n_desig_id' => $this->n_desig_id,
            'n_loc_id' => $this->n_loc_id,
        ]);

        $query->andFilterWhere(['like', 'n_reg_num', $this->n_reg_num])
            ->andFilterWhere(['like', 'n_nic', $this->n_nic])
            ->andFilterWhere(['like', 'n_f_name', $this->n_f_name])
            ->andFilterWhere(['like', 'n_l_name', $this->n_l_name])
            ->andFilterWhere(['like', 'n_email', $this->n_email])
            ->andFilterWhere(['like', 'n_contact_num', $this->n_contact_num])
            ->andFilterWhere(['like', 'n_address', $this->n_address])
            ->andFilterWhere(['like', 'n_img_path', $this->n_img_path])
            //->andFilterWhere(['like', 'title.title', $this->n_ti_id])
           // ->andFilterWhere(['like', 'gendar_tbl.gendar', $this->n_gen_id])
           // ->andFilterWhere(['like', 'designation_tbl.designation', $this->n_desig_id])
           // ->andFilterWhere(['like', 'languages_tbl.language', $this->n_lang_id])
            // ->andFilterWhere(['like', 'treatment_location_tbl.loc_name', $this->n_loc_id])
;
        return $dataProvider;
    }
}
