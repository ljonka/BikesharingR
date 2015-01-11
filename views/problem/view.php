<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Problem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Problems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$problemTypes = $model->problemTypes();
?>
<div class="problem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
		'label'=>'Problem Typ',
		'value'=>$problemTypes[$model->type]
	    ],
            [
		'label'=>'MitarbeiterIn', 
		'value'=>$model->waiter0->name . " - " . $model->waiter0->distributor0->name
	    ],
            [
		'label'=>'Fahrrad',
		'value'=>$model->bike0->number
	    ],
            'appearance_date:ntext',
            'solution_date:ntext',
        ],
    ]) ?>

</div>
