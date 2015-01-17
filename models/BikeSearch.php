<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bike;
use app\models\Rental;

/**
 * BikeSearch represents the model behind the search form about `app\models\Bike`.
 */
class BikeSearch extends Bike
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'donator', 'number'], 'integer'],
            [['name', 'offer_date', 'pickup_date', 'description'], 'safe'],
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

    public function getBikesForDistributor($distributor){
	return Bike::find()
		->join('JOIN', 'rental', 'rental.bike = bike.id')
		->join('JOIN', 'waiter', 'waiter.id = rental.waiter')
		->orderBy('rental.action_date')
		->all();
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
        $query = Bike::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'donator' => $this->donator,
            'number' => $this->number,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
	$query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
