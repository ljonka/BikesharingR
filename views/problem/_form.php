<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use app\models\WaiterSearch;
use app\models\BikeSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Problem */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="problem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->radioList($model->problemTypes()) ?>

    <?= $form->field($modelWaiter, 'name')->textInput() ?>

    <?= $form->field($modelBike, 'number')->input('number') ?>
 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Absenden' : 'Problem lösen', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
if (!Modernizr.inputtypes.date) {
    $('input[type=date]').datepicker({
        // Consistent format with the HTML5 picker
        dateFormat: 'yy-mm-dd'
    });
}

</script>
