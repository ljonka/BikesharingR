<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Helper */

$this->title = 'Create Helper';
$this->params['breadcrumbs'][] = ['label' => 'Helpers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="helper-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
