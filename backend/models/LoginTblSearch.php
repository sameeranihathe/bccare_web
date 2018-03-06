<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LoginTbl;

/**
 * LoginTblSearch represents the model behind the search form about `backend\models\LoginTbl`.
 */
class LoginTblSearch extends LoginTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login_id', 'user_id', 'user_type_id', 'loging_status', 'password_change_stat', 'account_active_stat'], 'integer'],
            [['user_name', 'password'], 'safe'],
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
        $query = LoginTbl::find();

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
            'login_id' => $this->login_id,
            'user_id' => $this->user_id,
            'user_type_id' => $this->user_type_id,
            'loging_status' => $this->loging_status,
            'password_change_stat' => $this->password_change_stat,
            'account_active_stat' => $this->account_active_stat,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
