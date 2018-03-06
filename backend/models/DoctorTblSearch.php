<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DoctorTbl;

/**
 * DoctorTblSearch represents the model behind the search form about `backend\models\DoctorTbl`.
 */
class DoctorTblSearch extends DoctorTbl
{
    /**
     * @inheritdoc
     */
    public $full_name;

    public function rules()
    {
        return [
            [['d_id'], 'integer'],
            [['d_reg_num', 'd_nic', 'd_f_name', 'd_l_name', 'd_email', 'd_contact_num', 'd_address', 'd_dob', 'd_img_path','d_loc_id','d_lang_id', 'd_ti_id','d_ged_id','d_desig_id' ,'full_name'], 'safe'],
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
	/*
	public function get_loc_id()
    {
        // bypass scenarios() implementation in the parent class
        return Yii::$app->user->identity->admin_loc_id;
    }
	
	public function get_log_type()
    {
        // bypass scenarios() implementation in the parent class
        return Yii::$app->user->identity->admin_type;
    }
	
    *
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DoctorTbl::find();


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

         $dataProvider->setSort([
        'attributes' => [
            
            'fullName' => [
                'asc' => ['d_f_name' => SORT_ASC, 'd_l_name' => SORT_ASC],
                'desc' => ['d_f_name' => SORT_DESC, 'd_l_name' => SORT_DESC],
                'label' => 'Full Name',
                'default' => SORT_ASC
            ],
               ]
    ]);

         //filtering according to user location
        $session=Yii::$app->user->identity->admin_loc_id;
        
        $admin_type=Yii::$app->user->identity->admin_type;
        if($admin_type==1)
        {
            $query->Where(['like', 'd_loc_id', $session]);
        }

      // Yii::$app->user->identity->admin_loc_id
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        /*$query -> joinWith('dLoc');
        $query -> joinWith('dLang');
        $query -> joinWith('dTi');
        $query -> joinWith('dGed');
        $query -> joinWith('dDesig');*/

        // grid filtering conditions
        $query->andFilterWhere([
            'd_id' => $this->d_id,
            'd_ged_id' => $this->d_ged_id,
          //  'd_ti_id' => $this->d_ti_id,
            'd_dob' => $this->d_dob,
            'd_lang_id' => $this->d_lang_id,
            'd_desig_id' => $this->d_desig_id,
            'd_loc_id' => $this->d_loc_id,
        ]);

        $query->andFilterWhere(['like', 'd_reg_num', $this->d_reg_num])
            ->andFilterWhere(['like', 'd_nic', $this->d_nic])
            ->andFilterWhere(['like', 'd_f_name', $this->d_f_name])
            ->andFilterWhere(['like', 'd_l_name', $this->d_l_name])
            ->andFilterWhere(['like', 'd_email', $this->d_email])
            ->andFilterWhere(['like', 'd_contact_num', $this->d_contact_num])
            ->andFilterWhere(['like', 'd_address', $this->d_address])
            ->andFilterWhere(['like', 'd_img_path', $this->d_img_path])
            //->andFilterWhere(['like', 'languages_tbl.language', $this->d_lang_id])
            //->andFilterWhere(['like', 'treatment_location_tbl.loc_name', $this->d_loc_id])
            ->andFilterWhere(['like', 'title.title', $this->d_ti_id])
            //->andFilterWhere(['like', 'gendar_tbl.gendar', $this->d_ged_id])
            //->andFilterWhere(['like', 'designation_tbl.designation', $this->d_desig_id])
;
            $query->andWhere('d_f_name LIKE "%' . $this->fullName . '%" ' . //This will filter when only first name is searched.
        'OR d_l_name LIKE "%' . $this->fullName . '%" '. //This will filter when only last name is searched.
        'OR CONCAT(d_f_name, " ", d_l_name) LIKE "%' . $this->fullName . '%"' //This will filter when full name is searched.
    );

        return $dataProvider;
    }
}
