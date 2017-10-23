<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Distributor;

/**
 * DistributorSearch represents the model behind the search form about `app\models\Distributor`.
 */
class DistributorSearch extends Distributor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'address', 'phone', 'mail', 'contact', 'pin'], 'safe'],
            [['geoLong', 'geoLat'], 'number'],
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
        $query = Distributor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'geoLong' => $this->geoLong,
            'geoLat' => $this->geoLat,
	    'pin'=>$this->pin
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'contact', $this->contact]);

        return $dataProvider;
    }
}
