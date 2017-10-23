<?php

use yii\data\ActiveDataProvider;
use app\models\Distributor;

$provider = new ActiveDataProvider([
	'query'=>Distributor::find(),
]);

$result = $provider->getModels();

$arrFeatures = [];
foreach($result as $distributor){
	$arrFeatures[] = [
		'type'=>'Feature',
		'geometry'=>[
			'type'=>'Point', 
			'coordinates'=>[$distributor->geoLat, $distributor->geoLong]
		],
		'properties'=>[
			'name'=>$distributor->name,
			'adresse'=>$distributor->address,
			'oeffnungszeiten'=>'',
			'bikes'=>0,
			'lastenraeder'=>1
		]
	];
}
$arrResult = ['type'=>'FeatureCollection', 'features'=>$arrFeatures];

//print_r($arrResult);

//exit(0);

Yii::$app->response->data = $arrResult;
Yii::$app->response->format = 'json';

?>
