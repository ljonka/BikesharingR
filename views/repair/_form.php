<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use app\models\Helper;
use app\models\Bike;

$providerHelper = new ActiveDataProvider([
        'query'=>Helper::find(),
]);
$providerBikes = new ActiveDataProvider([
        'query'=>Bike::find(),
]);

$resultHelper = $providerHelper->getModels();
$resultBikes = $providerBikes->getModels();

$arrHelper = [];
$arrBikes = [];


foreach($resultHelper as $helper){
        $arrHelper[$helper->id] = $helper->name;
}
foreach($resultBikes as $bike){
	$arrBikes[$bike->id] = $bike->number;
}


/* @var $this yii\web\View */
/* @var $model app\models\Repair */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repair-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'helper')->dropDownList($arrHelper) ?>
   
    <?= $form->field($model, 'bike')->dropDownList($arrBikes) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
