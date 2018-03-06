<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DesignationTbl;

/**
 * DesignationTblSearch represents the model behind the search form about `backend\models\DesignationTbl`.
 */
class DesignationTblSearch extends DesignationTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desig_id'], 'integer'],
            [['designation'], 'safe'],
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
        $query = DesignationTbl::find();

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
            'desig_id' => $this->desig_id,
        ]);

        $query->andFilterWhere(['like', 'designation', $this->designation]);

        return $dataProvider;
    }
}
