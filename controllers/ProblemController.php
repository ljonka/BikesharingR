<?php

namespace app\controllers;

use Yii;
use app\models\Problem;
use app\models\ProblemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\DistributorSearch;
use app\models\Waiter;
use app\models\WaiterSearch;
use yii\web\Session;
use app\models\BikeSearch;
use app\models\Bike;
use yii\filters\AccessControl;

/**
 * ProblemController implements the CRUD actions for Problem model.
 */
class ProblemController extends Controller
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
     * Lists all Problem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProblemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Problem model.
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
     * Creates a new Problem model.
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

        $model = new Problem();
	$modelWaiter = new WaiterSearch();
	$modelBike = new BikeSearch();
	$modelDistributor = $arrDistributor[0];

	$arrPost = Yii::$app->request->post();


        if(count($arrPost) > 0){
                $arrPost['Problem']['appearance_date'] = $arrPost['appearance_date'];
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
                $arrPost['Problem']['waiter'] = $modelWaiter->id;
                $arrPost['WaiterSearch']['id'] = $modelWaiter->id;

		$searchBike = new BikeSearch();
                $bikeProvider = $searchBike->search($arrPost);
                $arrBike = $bikeProvider->getModels();
                if(count($arrBike) == 0){
                        $modelBike->load($arrPost);
                        $modelBike->save();
                }else{
                        $modelBike = $arrBike[0];
                }
                $arrPost['Problem']['bike'] = $modelBike->id;
                $arrPost['BikeSearch']['id'] = $modelBike->id;
        }

        if ($model->load($arrPost) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
		'modelDistributor' => $arrDistributor[0],
		'modelWaiter' => $modelWaiter,
		'modelBike' => $modelBike,
            ]);
        }
    }

    /**
     * Updates an existing Problem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Problem model.
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
     * Finds the Problem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Problem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Problem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
