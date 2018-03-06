<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\NurseRequestsTbl;

/**
 * NurseRequestsTblSearch represents the model behind the search form about `backend\models\NurseRequestsTbl`.
 */
class NurseRequestsTblSearch extends NurseRequestsTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['n_req_id',  'n_id', 'n_req_auth_user_id'], 'integer'],
            [['n_req_stat','p_id'], 'safe'],
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
        $query = NurseRequestsTbl::find();
        $query->andFilterWhere(['=', 'n_req_stat', "P"]);

        $admin_type=Yii::$app->user->identity->admin_type;
        if($admin_type==1){
			$query -> joinWith('n');
			$session=Yii::$app->user->identity->admin_loc_id;
            $query->andWhere(['IN', 'nurse_tbl.n_loc_id', $session]);
        }
		
		

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
            'n_req_id' => $this->n_req_id,
          //  'p_id' => $this->p_id,
            'n_id' => $this->n_id,
            'n_req_auth_user_id' => $this->n_req_auth_user_id,
        ]);

        $query->andFilterWhere(['like', 'n_req_stat', $this->n_req_stat]);
       

        return $dataProvider;
    }
}
