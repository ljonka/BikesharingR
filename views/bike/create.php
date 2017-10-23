<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bike */

$this->title = 'Fahrrad hinzufügen';
$this->params['breadcrumbs'][] = ['label' => 'Fahrräder', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
