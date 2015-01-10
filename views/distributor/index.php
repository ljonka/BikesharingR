<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DistributorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Distributors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Distributor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            'address:ntext',
            'geoLong',
            'geoLat',
            // 'phone:ntext',
            // 'mail:ntext',
            // 'contact:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
