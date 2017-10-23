<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WaiterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mitarbeiter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waiter-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Mitarbeiter hinzufügen', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Standorte verwalten', Url::to(['distributor/index']) , ['class' => 'btn btn-success']) ?>	
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
	    'distributor',
            'name:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
