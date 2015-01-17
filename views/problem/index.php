<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProblemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Probleme';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            ['label'=>'Problem Typ', 'value'=>function($data){
                return $data->getProblemType();
            }],
            ['label'=>'MitarbeiterIn', 'value'=>function($data){
		return $data->waiter0->name . " - " . $data->waiter0->distributor0->name;
	    }],
            ['label'=>'Fahrrad', 'value'=>function($data){
                return $data->bike0->number;
            }],
            'appearance_date:ntext',
            'solution_date:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
