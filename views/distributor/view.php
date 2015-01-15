<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modles\Waiter;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Distributor */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Standorte', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ändern', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Entfernen', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Soll dieser Standort entfernt werden?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name:ntext',
            'address:ntext',
            //'geoLong',
            //'geoLat',
            'phone:ntext',
            'mail:ntext',
            'contact:ntext',
	    [
		'format'=>'html',
                'label'=>'MitarbeiterInnen',
                'value'=>Html::a(
			count($model->waiters), 
			URL::to(['waiter/index', 'WaiterSearch[distributor]'=>$model->id], true)
		)
	    ],
	    'pin:ntext'
        ],
    ]) ?>

</div>
