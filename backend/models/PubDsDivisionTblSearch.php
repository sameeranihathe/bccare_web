<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PubDsDivisionTbl;

/**
 * PubDsDivisionTblSearch represents the model behind the search form about `backend\models\PubDsDivisionTbl`.
 */
class PubDsDivisionTblSearch extends PubDsDivisionTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ds_Code', 'dis_Code'], 'integer'],
            [['Ds_Name'], 'safe'],
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
        $query = PubDsDivisionTbl::find();

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
            'ds_Code' => $this->ds_Code,
            'dis_Code' => $this->dis_Code,
        ]);

        $query->andFilterWhere(['like', 'Ds_Name', $this->Ds_Name]);

        return $dataProvider;
    }
}
