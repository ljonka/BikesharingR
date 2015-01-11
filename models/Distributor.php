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
            [['name', 'address', 'phone', 'mail', 'contact'], 'string'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaiters()
    {
        return $this->hasMany(Waiter::className(), ['distributor' => 'id']);
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
                        'bikes'=>count($this->getBikes()),
                	'lastenraeder'=>count($this->getTransportBikes())
        	]
        ];
	return $arrFeature;
    }
}
