<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Problem;

/**
 * ProblemSearch represents the model behind the search form about `app\models\Problem`.
 */
class ProblemSearch extends Problem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'waiter', 'bike', 'appearance_date', 'solution_date'], 'integer'],
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
        $query = Problem::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'waiter' => $this->waiter,
            'bike' => $this->bike,
            'appearance_date' => $this->appearance_date,
            'solution_date' => $this->solution_date,
        ]);

        return $dataProvider;
    }
}
