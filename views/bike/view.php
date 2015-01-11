<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Bike */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="bike-view">

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
            'number',
            'name:ntext',
            [
		'format'=>'html', 
		'label'=>'SpenderIn',
		'value'=>Html::a($model->donator0->name, URL::to(['donator/view', 'id'=>$model->donator0->id], true))
	    ],
            'offer_date',
            'pickup_date',
        ],
    ]) ?>

</div>
