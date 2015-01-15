<?php

namespace app\controllers;

use Yii;
use app\models\Rental;
use app\models\RentalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Waiter;
use app\models\WaiterSearch;
use yii\web\Session;
use app\models\DistributorSearch;
use app\models\Bike;
use app\models\BikeSearch;
use yii\filters\AccessControl;

/**
 * RentalController implements the CRUD actions for Rental model.
 */
class RentalController extends Controller
{
    public function behaviors()
    {
        return [
	    'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create', 'delete'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => false,
                        'actions' => ['index', 'update'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Rental models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new RentalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rental model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

	 //save pin from distributor
        $session = new Session;
        $session->open();

        $ort = $session['distributor_pin'];

        //check if pin is valid/exists
        $searchDistributor = new DistributorSearch();
        $distributorProvider = $searchDistributor->search(['DistributorSearch'=>['pin'=>$ort]]);

        if(count($distributorProvider->getModels()) == 0)
                throw new \yii\web\ForbiddenHttpException;

        $arrDistributor = $distributorProvider->getModels();
	
        return $this->render('view', [
            'model' => $this->findModel($id),
	    'modelDistributor' => $arrDistributor[0],
        ]);
    }

    /**
     * Creates a new Rental model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
	//save pin from distributor
        $session = new Session;
        $session->open();

	$ort = $session['distributor_pin'];

	//check if pin is valid/exists
        $searchDistributor = new DistributorSearch();
        $distributorProvider = $searchDistributor->search(['DistributorSearch'=>['pin'=>$ort]]);

        if(count($distributorProvider->getModels()) == 0) 
		throw new \yii\web\ForbiddenHttpException;

	$arrDistributor = $distributorProvider->getModels();
	
        $model = new Rental();
	$modelWaiter = new WaiterSearch();
	$modelDistributor = $arrDistributor[0];
	$modelBike = new BikeSearch();

	$session = new Session;
        $session->open();

        $arrPost = Yii::$app->request->post();

	
	if(count($arrPost) > 0){
		//Search for waiter
		$arrPost['Rental']['action_date'] = $arrPost['action_date'];
		$arrPost['WaiterSearch']['distributor'] = $modelDistributor->id;
		
		$searchWaiter = new WaiterSearch();
		$waiterProvider = $searchWaiter->search($arrPost);
		$arrWaiter = $waiterProvider->getModels();
		if(count($arrWaiter) == 0){
			$modelWaiter->load($arrPost);
			$modelWaiter->save();
		}else{
			$modelWaiter = $arrWaiter[0];
		}
		$arrPost['Rental']['waiter'] = $modelWaiter->id;
		$arrPost['WaiterSearch']['id'] = $modelWaiter->id;

		//search for bike number
		$searchBike = new BikeSearch();
		$bikeProvider = $searchBike->search($arrPost);
		print_r($bikeProvider->getModels());
		$arrBikes = $bikeProvider->getModels();
		if(count($arrBikes) == 0){
			$modelBike->load($arrPost);
			$modelBike->save();
		}else{
			$modelBike = $arrBikes[0];
			$arrPost['BikeSearch']['id'] = $modelBike->id;
		}
		$arrPost['Rental']['bike'] = $modelBike->id;
	}

	print_r($arrPost);
	
	if ($model->load($arrPost) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
		'modelWaiter' => $modelWaiter,
		'modelDistributor'=> $arrDistributor[0],
		'modelBike' => $modelBike,
            ]);
        }
    }

    /**
     * Updates an existing Rental model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
	$modelWaiter = $model->waiter0;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
		'modelWaiter'=>$modelWaiter,
            ]);
        }
    }

    /**
     * Deletes an existing Rental model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['site/verleih']);
    }

    /**
     * Finds the Rental model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rental the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rental::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
