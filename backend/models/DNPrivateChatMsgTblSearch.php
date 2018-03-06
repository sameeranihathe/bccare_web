<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DNPrivateChatMsgTbl;

/**
 * DNPrivateChatMsgTblSearch represents the model behind the search form about `backend\models\DNPrivateChatMsgTbl`.
 */
class DNPrivateChatMsgTblSearch extends DNPrivateChatMsgTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pri_ch_msg_id',  'pri_ch_user_id'], 'integer'],
            [['pri_ch_msg', 'pri_ch_msg_date_time','pri_ch_id'], 'safe'],
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
        $query = DNPrivateChatMsgTbl::find();

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
        $query -> joinWith('priCh');


        // grid filtering conditions
        $query->andFilterWhere([
            'pri_ch_msg_id' => $this->pri_ch_msg_id,
           // 'pri_ch_id' => $this->pri_ch_id,
            'pri_ch_user_id' => $this->pri_ch_user_id,
            'pri_ch_msg_date_time' => $this->pri_ch_msg_date_time,
        ]);

        $query->andFilterWhere(['like', 'pri_ch_msg', $this->pri_ch_msg])
               ->andFilterWhere(['like', 'd_n_private_chat_tbl.pri_ch_room_name', $this->pri_ch_id]);


        return $dataProvider;
    }
}
