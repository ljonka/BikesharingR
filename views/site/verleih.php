<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;

?>

<h1><?= Html::encode($this->title) ?></h1>

<?= Html::a('Buchung durchführen', Url::to(['rental/create']) , ['class' => 'btn btn-success']) ?>

<?= Html::a('Problem melden', Url::to(['problem/create']) , ['class' => 'btn btn-warning']) ?>
