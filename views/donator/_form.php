<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Donator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donator-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['autofocus'=>'true']) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'mail')->textInput() ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
