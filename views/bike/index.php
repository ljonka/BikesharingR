<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BikeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fahrräder';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Fahrrad hinzufügen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
	    'number',
            'name:ntext',
            //'donator',
            //'offer_date',
            'pickup_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
