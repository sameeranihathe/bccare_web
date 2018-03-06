<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PublicUserTbl;

/**
 * PublicUserTblSearch represents the model behind the search form about `backend\models\PublicUserTbl`.
 */
class PublicUserTblSearch extends PublicUserTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pub_id', 'pub_gen_id', 'pub_ti_id', 'pub_lang_id', 'pub_dis_id'], 'integer'],
            [['pub_nic', 'pub_f_name', 'pub_l_name', 'pub_email', 'pub_contact_num', 'pub_dob', 'pub_remarks'], 'safe'],
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
        $query = PublicUserTbl::find();

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
            'pub_id' => $this->pub_id,
            'pub_gen_id' => $this->pub_gen_id,
            'pub_ti_id' => $this->pub_ti_id,
            'pub_dob' => $this->pub_dob,
            'pub_lang_id' => $this->pub_lang_id,
            'pub_dis_id' => $this->pub_dis_id,
        ]);

        $query->andFilterWhere(['like', 'pub_nic', $this->pub_nic])
            ->andFilterWhere(['like', 'pub_f_name', $this->pub_f_name])
            ->andFilterWhere(['like', 'pub_l_name', $this->pub_l_name])
            ->andFilterWhere(['like', 'pub_email', $this->pub_email])
            ->andFilterWhere(['like', 'pub_contact_num', $this->pub_contact_num])
            ->andFilterWhere(['like', 'pub_remarks', $this->pub_remarks]);

        return $dataProvider;
    }
}
