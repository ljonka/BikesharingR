<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Donator */

$this->title = 'Create Donator';
$this->params['breadcrumbs'][] = ['label' => 'Donators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
