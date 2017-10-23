<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\BaseHtml;

use app\models\Waiter;

/* @var $this yii\web\View */
/* @var $modelWaiter app\models\Waiter */
/* @var $modelBike app\models\Bike */
/* @var $modelDistributor app\models\Distributor */
/* @var $modelRental app\models\Rental */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $form = ActiveForm::begin([]) ?>

<?= $form->field($modelRental, 'type')->radioList($modelRental->getTypes()) ?>

<?= $form->field($modelWaiter, 'name')->textInput() ?>

<?= $form->field($modelBike, 'number')->textInput() ?>

<?= BaseHtml::activeHiddenInput($modelRental, 'action_date', ['value'=> date('Y-m-d H:i')]) ?>

<?= BaseHtml::activeHiddenInput($modelWaiter, 'distributor', ['value'=> $modelDistributor->id]) ?>

<div class="form-group">
	<?= Html::submitButton('Speichern', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>
