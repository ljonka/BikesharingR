<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;
use app\models\Distributor;
use app\modles\Rental;
use yii\web\Session;
use app\models\DistributorSearch;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
	$modelDistributor = new DistributorSearch();
	$request = Yii::$app->request->post();
	if(isset($request['DistributorSearch']['pin'])){
	    return $this->redirect(['site/verleih', 'ort'=>$request['DistributorSearch']['pin']]);
	}if ($model->load($request) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
		'modelDistributor' => $modelDistributor,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionVerleih($ort = null){
	//save distributor if given
	$session = new Session;
	$session->open();
	($ort == null) ? $ort = $session['distributor_pin'] : $session['distributor_pin'] = $ort;
	//cancel if $ort == null; check if pin is correct
	if($ort == 0)
		return $this->redirect(['index']);
	if($ort == null || $ort == '')
		throw new \yii\web\NotFoundHttpException;
	$searchModel = new DistributorSearch();
	$dataProvider = $searchModel->search(['DistributorSearch'=>['pin'=>$ort]]);

	if(count($dataProvider->getModels()) == 0)
		throw new \yii\web\NotFoundHttpException;

	$arrModels = $dataProvider->getModels();
	
	return $this->render('verleih', ['model'=>$arrModels[0]]);
    }

    public function actionMap(){
	return $this->renderPartial('map');
    }

    public function actionDistributors(){
	$provider = new ActiveDataProvider([
        	'query'=>Distributor::find(),
	]);

	$result = $provider->getModels();

	$arrFeatures = [];
	foreach($result as $distributor){
        	$arrFeatures[] = $distributor->getGeoFeature();
	};
	$arrResult = ['type'=>'FeatureCollection', 'features'=>$arrFeatures];

	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	return $arrResult;
    }
}

