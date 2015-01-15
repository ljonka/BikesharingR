<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Distributor */

$this->title = 'Standort aktualisieren: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Standorte', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualisieren';
?>
<div class="distributor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
