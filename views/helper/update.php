<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Helper */

$this->title = 'Update Helper: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="helper-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
