<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DistrictTbl;

/**
 * DistrictTblSearch represents the model behind the search form about `backend\models\DistrictTbl`.
 */
class DistrictTblSearch extends DistrictTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dis_id'], 'integer'],
            [['district'], 'safe'],
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
        $query = DistrictTbl::find();

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
            'dis_id' => $this->dis_id,
        ]);

        $query->andFilterWhere(['like', 'district', $this->district]);

        return $dataProvider;
    }
}
