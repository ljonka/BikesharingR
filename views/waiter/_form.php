<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use app\models\Distributor;

/* @var $this yii\web\View */
/* @var $model app\models\Waiter */
/* @var $form yii\widgets\ActiveForm */

$provider = new ActiveDataProvider([
        'query'=>Distributor::find(),
]);

$result = $provider->getModels();

$arrDistributor = [];

foreach($result as $distributor){
        $arrDistributor[$distributor->id] = $distributor->name;
}

?>

<div class="waiter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['autofocus'=>'true']) ?>

    <?= $form->field($model, 'distributor')->dropDownList($arrDistributor) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
