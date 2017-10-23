<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rental */

$this->title = 'Buchung durchführen';
$this->params['breadcrumbs'][] = ['label' => $modelDistributor->name, 'url' => ['site/verleih']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	'modelWaiter' => $modelWaiter,
	'modelBike' => $modelBike,
    ]) ?>

</div>
