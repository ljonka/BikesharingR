<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rental */

$this->title = 'Verleih aktualisieren: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Verleih', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualisieren';
?>
<div class="rental-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	'modelWaiter'=>$modelWaiter,
	'modelBike'=>$modelBike,
    ]) ?>

</div>
