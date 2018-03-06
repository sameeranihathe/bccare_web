<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SchduleTbl;

/**
 * SchduleTblSearch represents the model behind the search form about `backend\models\SchduleTbl`.
 */
class SchduleTblSearch extends SchduleTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sch_id'], 'integer'],
            [['sch_title', 'sch_description', 'sch_plan_date', 'sch_completed_date', 'sch_status', 'p_id'], 'safe' ],
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
        $query = SchduleTbl::find();

        // add conditions that should always apply here
        $session=Yii::$app->user->identity->admin_loc_id;
        
        $admin_type=Yii::$app->user->identity->admin_type;
        if($admin_type==1)
        {
            $query->Where(['like', 'p_loc_id', $session]);
        }


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
            'sch_id' => $this->sch_id,
          //  'p_id' => $this->p_id,
            'sch_plan_date' => $this->sch_plan_date,
            'sch_completed_date' => $this->sch_completed_date,
        ]);

        $query->andFilterWhere(['like', 'sch_title', $this->sch_title])
            ->andFilterWhere(['like', 'sch_description', $this->sch_description])
            ->andFilterWhere(['like', 'sch_status', $this->sch_status])
             ->andFilterWhere(['like', 'patient_tbl.p_f_name', $this->p_id]);

        return $dataProvider;
    }
}
