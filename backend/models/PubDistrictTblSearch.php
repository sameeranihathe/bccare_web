<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PubDistrictTbl;

/**
 * PubDistrictTblSearch represents the model behind the search form about `backend\models\PubDistrictTbl`.
 */
class PubDistrictTblSearch extends PubDistrictTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dis_Code', 'pro_Code'], 'integer'],
            [['Dis_Name'], 'safe'],
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
        $query = PubDistrictTbl::find();

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
            'dis_Code' => $this->dis_Code,
            'pro_Code' => $this->pro_Code,
        ]);

        $query->andFilterWhere(['like', 'Dis_Name', $this->Dis_Name]);

        return $dataProvider;
    }
}
