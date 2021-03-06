<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Repair */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reparaturen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualisieren', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            ['label'=>'HelferIn', 'value'=>$model->helper0->name],
	    ['label'=>'Fahrrad', 'value'=>$model->bike0->number],
            'description:ntext',
        ],
    ]) ?>

</div>
