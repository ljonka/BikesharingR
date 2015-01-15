<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use app\models\WaiterSearch;
use app\models\BikeSearch;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Rental */
/* @var $modelWaiter app\models\Waiters */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="rental-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->radioList(
	$model->getTypes(), 
	['autofocus'=>'true']
	) ?>

    
    <?= $form->field($modelWaiter, 'name')->textInput() ?>

    <?= $form->field($modelBike, 'number')->input('number') ?>

    <?= Html::hiddenInput('action_date', date("d.m.Y h:i")) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Absenden' : 'Aktualisieren', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

