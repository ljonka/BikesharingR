<?php

namespace app\controllers;

use Yii;

use app\models\Waiter;
use app\models\WaiterSearch;

use app\models\Bike;
use app\models\BikeSearch;

use app\models\Rental;
use app\models\RentalSearch;

use app\models\Distributor;
use app\models\DistributorSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class VerleihController extends \yii\web\Controller
{
    public function actionIndex($standort)
    {
	$searchModel = new DistributorSearch();
        $dataProvider = $searchModel->search(['DistributorSearch' => ['pin'=>$standort]]);

	$arrModelDistributor = $dataProvider->getModels();

	try {
		if(count($arrModelDistributor) == 0) throw new \yii\web\ForbiddenHttpException;
	}catch (Exception $e){
		Yii::warning('Der Pin konnte nicht gefunden werden.');
	}

	$arrPost = Yii::$app->request->post();

	//print_r($arrPost);

	//check for submit action
	//check if waiter available, if not create and take id
	//check if bike available, if not throw error
	//append bike id an waiter id to rental and save
	if($arrPost){
		$searchModel = new WaiterSearch();
		$dataProvider = $searchModel->search($arrPost);
		$arrWaiter = $dataProvider->getModels();

		if(count($arrWaiter) >= 1){
			print_r('Der Name wurde gefunden.');
		}else{
			print_r('Der Name wird hinzugefügt.');
		}
		
		$searchModel = new BikeSearch();
		$dataProvider = $searchModel->search($arrPost);
		$arrBike = $dataProvider->getModels();

		if(count($arrBike) >= 1){
			print_r('Das Fahrrad wurde gefunden.');
		}else{
			print_r('Das Fahrrad wurde nicht gefunden.');
		}
		
	}

        return $this->render(
		'index', 
		[
			'modelWaiter'=>new WaiterSearch(), 
			'modelBike'=>new BikeSearch(),
			'modelDistributor'=>$arrModelDistributor[0],
			'modelRental'=>new Rental()
		]
	);
    }

}
