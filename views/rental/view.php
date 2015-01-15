<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Rental */

$this->title = 'Buchung';
$this->params['breadcrumbs'][] = ['label' => $model->waiter0->distributor0->name, 'url' => ['site/verleih']];
$this->params['breadcrumbs'][] = $this->title;

$arrTypes = $model->getTypes();
?>
<div class="rental-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Buchung stornieren', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Soll die Buchung storniert werden?',
                'method' => 'post',
            ],
        ]) ?>
	<?= Html::a('zurück zur Übersicht', Url::to(['site/verleih']) , ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            ['label'=>'Aktion', 'value'=>$arrTypes[$model->type]],
            ['label'=>'MitarbeiterIn', 'value'=>$model->waiter0->name . " - " . $model->waiter0->distributor0->name],
            ['label'=>'Fahrrad', 'value'=>$model->bike0->number],
            'action_date:ntext',
        ],
    ]) ?>

</div>
