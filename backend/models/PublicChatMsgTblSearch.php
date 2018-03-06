<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PublicChatMsgTbl;

/**
 * PublicChatMsgTblSearch represents the model behind the search form about `backend\models\PublicChatMsgTbl`.
 */
class PublicChatMsgTblSearch extends PublicChatMsgTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pub_ch_msg_id', 'pub_ch_id', 'pri_ch_user_id'], 'integer'],
            [['pri_ch_msg', 'pub_ch_msg_date_time', 'pub_ch_msg_active_sta'], 'safe'],
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
        $query = PublicChatMsgTbl::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'pub_ch_msg_id' => $this->pub_ch_msg_id,
            'pub_ch_id' => $this->pub_ch_id,
            'pri_ch_user_id' => $this->pri_ch_user_id,
            'pub_ch_msg_date_time' => $this->pub_ch_msg_date_time,
        ]);

        $query->andFilterWhere(['like', 'pri_ch_msg', $this->pri_ch_msg])
            ->andFilterWhere(['like', 'pub_ch_msg_active_sta', $this->pub_ch_msg_active_sta]);

        return $dataProvider;
    }
}
