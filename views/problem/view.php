<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Problem */

$this->title = 'Problem';
$this->params['breadcrumbs'][] = ['label' => $modelDistributor->name, 'url' => ['site/verleih']];
$this->params['breadcrumbs'][] = $this->title;

$problemTypes = $model->problemTypes();
?>
<div class="problem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Stornieren', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Soll das Problem storniert werden?',
                'method' => 'post',
            ],
        ]) ?>
	<?= Html::a('zurück zur Übersicht', Url::to(['site/verleih']) , ['class' => 'btn btn-success']) ?>
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
