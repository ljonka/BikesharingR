<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use app\models\Donator;

/* @var $this yii\web\View */
/* @var $model app\models\Bike */
/* @var $form yii\widgets\ActiveForm */

$provider = new ActiveDataProvider([
	'query'=>Donator::find(),
]);

$result = $provider->getModels();

$arrDonator = [];

foreach($result as $donator){
	$arrDonator[$donator->id] = $donator->name;
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

<div class="bike-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'donator')->dropDownList($arrDonator, ['autofocus'=>'true']) ?>

    <p>
        <?= Html::a('Neuen Spender hinzufügen', Url::to(['donator/create']) , ['class' => 'btn btn-success']) ?>
    </p>

    <?= $form->field($model, 'number')->input('number') ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'offer_date')->input('date') ?>

    <?= $form->field($model, 'pickup_date')->input('date') ?>

    <?= $form->field($model, 'description')->textarea(['rows'=>3]) ?>

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
