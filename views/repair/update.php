<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Repair */

$this->title = 'Reparatur aktualisieren: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reparaturen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualisieren';
?>
<div class="repair-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
