<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Problem */

$this->title = 'Problem lösen: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Probleme', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Problem lösen';
?>
<div class="problem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	'modelWaiter' => $modelWaiter,
	'modelBike' => $modelBike,
    ]) ?>

</div>
