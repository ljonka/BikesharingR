<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "distributor".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property double $geoLong
 * @property double $geoLat
 * @property string $phone
 * @property string $mail
 * @property string $contact
 * @property string $pin
 *
 * @property Waiter[] $waiters
 * @property Bikes[] $bikes
 */
class Distributor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distributor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'phone', 'mail', 'contact', 'pin'], 'string'],
            [['geoLong', 'geoLat'], 'number'],
	    ['mail', 'email'],
	    [['name', 'address', 'phone', 'geoLong', 'geoLat'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Adresse und Öffnungszeiten',
            'geoLong' => 'Geo Longitude',
            'geoLat' => 'Geo Latitude',
            'phone' => 'Telefon',
            'mail' => 'Mail',
            'contact' => 'Ansprechpartner',
	    'pin' => 'Zugangs-Pin'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaiters()
    {
        return $this->hasMany(Waiter::className(), ['distributor' => 'id']);
    }

    public function getBikeModels(){
	$bikeSearch = new BikeSearch();
	return $bikeSearch->getBikesForDistributor($this);
	
    }
    public function getNumBikes(){
	$arrModels = $this->getBikeModels();
	$intBikes = 0;
	foreach($arrModels as $model){
		$rentalEnd = $model->rentals[count($model->rentals)-1];
		if($rentalEnd->type == 2 && $rentalEnd->waiter0->distributor0->id == $this->id && strpos($model->description, 'Lastenrad') === false){
			$intBikes++;
		}
	}
	return $intBikes;
    }
    public function getNumTransportBikes(){
        $arrModels = $this->getBikeModels();
        $intBikes = 0;
        foreach($arrModels as $model){
		$rentalEnd = $model->rentals[count($model->rentals)-1];
                if($rentalEnd->type == 2 && $rentalEnd->waiter0->distributor0->id == $this->id && strpos($model->description, 'Lastenrad') !== false){
                        $intBikes++;
                }
        }
        return $intBikes;
    }

    public function getBikes(){
	$arrBikes = array();
        $arrWaiters = $this->waiters;
        //Search for returned bikes in current distribution point
        foreach($arrWaiters as $waiter){
        	$arrRentals = $waiter->rentals;
                //If last rental was a return, mark bike available
                if(count($arrRentals) >= 1 && 
                   $arrRentals[count($arrRentals)-1]->type == 2 &&
	  	   strpos($arrRentals[count($arrRentals)-1]->bike0->description, 'Lastenrad') === false){
                	$arrBikes[] = $arrRentals[count($arrRentals)-1]->bike0;
                }
         }
	return $arrBikes;
    }

    public function getTransportBikes(){
	$arrBikes = array();
        $arrWaiters = $this->waiters;
        //Search for returned bikes in current distribution point
        foreach($arrWaiters as $waiter){
                $arrRentals = $waiter->rentals;
		//If last rental was a return, mark bike available
                if(count($arrRentals) >= 1 &&
                   $arrRentals[count($arrRentals)-1]->type == 2 &&
		   strpos($arrRentals[count($arrRentals)-1]->bike0->description, 'Lastenrad') !== false){
                        $arrBikes[] = $arrRentals[count($arrRentals)-1]->bike0;
                }
         }
        return $arrBikes;
    }

    /*
	Bug: Only one bike possible for rent on location, to fix that change search for distribution point in rentals

	Get Waiters for current distribution point
	Get Rentals for current waiter
	Get Last checked in bikes not checked out after
	return array of current checked in bikes for distribution point
    */

    public function getGeoFeature(){
	$arrFeature = [
        	'type'=>'Feature',
                'geometry'=>[
                        'type'=>'Point',
                        'coordinates'=>[$this->geoLat, $this->geoLong]
                ],
                'properties'=>[
                        'name'=>$this->name,
                        'adresse'=>'<pre>'.$this->address.'</pre>',
                        'oeffnungszeiten'=>'',
                        'bikes'=>$this->getNumBikes(),
                	'lastenraeder'=>$this->getNumTransportBikes()
        	]
        ];
	return $arrFeature;
    }
}
