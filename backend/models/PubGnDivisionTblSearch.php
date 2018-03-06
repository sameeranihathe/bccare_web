<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PubGnDivisionTbl;

/**
 * PubGnDivisionTblSearch represents the model behind the search form about `backend\models\PubGnDivisionTbl`.
 */
class PubGnDivisionTblSearch extends PubGnDivisionTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gn_Code', 'ds_Code'], 'integer'],
            [['Gnd_Name'], 'safe'],
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
        $query = PubGnDivisionTbl::find();

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
            'gn_Code' => $this->gn_Code,
            'ds_Code' => $this->ds_Code,
        ]);

        $query->andFilterWhere(['like', 'Gnd_Name', $this->Gnd_Name]);

        return $dataProvider;
    }
}
