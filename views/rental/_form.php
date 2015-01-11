<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Waiter;
use app\models\Bike;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Rental */
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

<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<div class="rental-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->radioList(
	['1'=>'Ausgabe','2'=>'Rückgabe'], 
	['autofocus'=>'true']
	) ?>

    <?= $form->field($model, 'waiter')->dropDownList($arrWaiter) ?>

    <?= $form->field($model, 'bike')->dropDownList($arrBike) ?>

    <?= $form->field($model, 'action_date')->input('datetime', ['id'=>'datetimepicker']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<link rel="stylesheet" type="text/css" href="/css/jquery.datetimepicker.css"/ >
<script src="/js/jquery.datetimepicker.js"></script>
<script type="text/javascript">
jQuery('#datetimepicker').datetimepicker({'lang':'de', 'inline':true, 'step':15, 'value':new Date()});

</script>
