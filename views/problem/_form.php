<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use app\models\Waiter;
use app\models\Bike;

/* @var $this yii\web\View */
/* @var $model app\models\Problem */
/* @var $form yii\widgets\ActiveForm */

$provider = new ActiveDataProvider([
        'query'=>Waiter::find(),
]);

$result = $provider->getModels();

$arrWaiter = [];

foreach($result as $waiter){
        $arrWaiter[$waiter->id] = $waiter->name . " - " . $waiter->distributor0->name;
}

$provider = new ActiveDataProvider([
        'query'=>Bike::find(),
]);

$result = $provider->getModels();

$arrBike = [];

foreach($result as $bike){
        $arrBike[$bike->id] = $bike->number;
}

$this->registerLinkTag([
    'rel' => 'stylesheet',
    'type' => 'text/css',
    'href' => 'https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css',
]);

?>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<div class="problem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->radioList($model->problemTypes()) ?>

    <?= $form->field($model, 'waiter')->dropDownList($arrWaiter) ?>

    <?= $form->field($model, 'bike')->dropDownList($arrBike) ?>

    <?= $form->field($model, 'appearance_date')->input('date', []) ?>

    <?= $form->field($model, 'solution_date')->input('date', []) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
