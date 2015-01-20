<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;

?>

<h1><?= Html::encode($this->title) ?></h1>


<div class="center-block">
<?= Html::a('Buchung durchführen', Url::to(['rental/create']) , ['class' => 'btn btn-success']) ?>
</div>

<div class="center-block">
<?= Html::a('Problem melden', Url::to(['problem/create']) , ['class' => 'btn btn-warning']) ?>
</div>

<div class="center-block">
<?= Html::a('Abmelden', Url::to(['site/verleih', 'ort'=>0]) , ['class' => 'btn btn-danger']) ?>
</div>

