<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\GendarTbl;

/**
 * GendarTblSearch represents the model behind the search form about `backend\models\GendarTbl`.
 */
class GendarTblSearch extends GendarTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gen_id'], 'integer'],
            [['gendar'], 'safe'],
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
        $query = GendarTbl::find();

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
            'gen_id' => $this->gen_id,
        ]);

        $query->andFilterWhere(['like', 'gendar', $this->gendar]);

        return $dataProvider;
    }
}
