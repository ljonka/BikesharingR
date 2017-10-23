<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Problem */

$this->title = 'Problem melden';
$this->params['breadcrumbs'][] = ['label' => $modelDistributor->name, 'url' => ['site/verleih']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	'modelWaiter' => $modelWaiter,
	'modelBike'=>$modelBike,
    ]) ?>

</div>
