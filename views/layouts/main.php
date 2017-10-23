<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Dropdown;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Bikesharing Regensburg',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
	    $navDonator = ['label' => 'SpenderInnen', 'url'=>['/donator/index']];
	    $navBike = ['label' => 'Fahrräder', 'url'=>['/bike/index']];
	    $navHelper = ['label' => 'HelferInnen', 'url'=>['/helper/index']];
            $navRepair = ['label' => 'Reparaturen', 'url'=>['/repair/index']];
	    $navDistributor = ['label' => 'Standorte', 'url'=>['/distributor/index']];
	    $navRent = ['label' => 'Verleih', 'url'=>['/rental/index']];
	    $navProblem = ['label' => 'Probleme', 'url'=>['/problem/index']];

	    // a button group using Dropdown widget
	    $actionDropdown = [
		'label'=>'Verwaltung',
       		'items' => [
			$navDonator, $navBike, $navHelper, $navRepair, $navDistributor, 
			$navRent, $navProblem
       		],
	    ];

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
		    ['label' => 'Standorte', 'url'=> ['/site/map']],
                    ['label' => 'Über uns', 'url' => ['/site/about']],
                    ['label' => 'Kontakt', 'url' => ['/site/contact']],
		    Yii::$app->user->isGuest ? '' : $actionDropdown,
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] : 
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
			
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left"><a href="http://transition-regensburg.de" target="_blank">Transition Regensburg im Wandel</a> <?= date('Y') ?> - Design und Programmierung: Leonid Verhovskij</p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
