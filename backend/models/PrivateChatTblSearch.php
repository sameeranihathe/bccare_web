<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PrivateChatTbl;

/**
 * PrivateChatTblSearch represents the model behind the search form about `backend\models\PrivateChatTbl`.
 */
class PrivateChatTblSearch extends PrivateChatTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pri_ch_id'], 'integer'],
            [['pri_ch_room_name' , 'p_id', 'n_id'], 'safe'],
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
        $query = PrivateChatTbl::find();

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
            'pri_ch_id' => $this->pri_ch_id,
           // 'p_id' => $this->p_id,
           // 'n_id' => $this->n_id,
        ]);

        $query->andFilterWhere(['like', 'pri_ch_room_name', $this->pri_ch_room_name])
              ->andFilterWhere(['like', 'patient_tbl.p_f_name', $this->p_id])
              ->andFilterWhere(['like', 'nurse_tbl.n_f_name', $this->n_id]);


        return $dataProvider;
    }
}
