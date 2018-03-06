<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserTypeTbl;

/**
 * UserTypeTblSearch represents the model behind the search form about `backend\models\UserTypeTbl`.
 */
class UserTypeTblSearch extends UserTypeTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_type_id'], 'integer'],
            [['user_type'], 'safe'],
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
        $query = UserTypeTbl::find();

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
            'user_type_id' => $this->user_type_id,
        ]);

        $query->andFilterWhere(['like', 'user_type', $this->user_type]);

        return $dataProvider;
    }
}
