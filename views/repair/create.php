<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Repair */

$this->title = 'Reparatur hinzufügen';
$this->params['breadcrumbs'][] = ['label' => 'Reparaturen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
