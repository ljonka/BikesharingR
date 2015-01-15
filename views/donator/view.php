<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Donator */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'SpenderInnen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donator-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualisieren', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Entfernen', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Soll dieser Datensatz gelöscht werden?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name:ntext',
            'phone:ntext',
            'mail:ntext',
            'address:ntext',
            'description:ntext',
	    [
		'label'=>'Gespendete Fahrräder', 
		'format'=>'html', 
		'value'=>Html::a(count($model->bikes), Url::to(['bike/index', 'BikeSearch[donator]'=>$model->id], true))
	    ]
        ],
    ]) ?>

</div>
