<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Bikesharing Regensburg';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bikesharing Regensburg</h1>

        <p class="lead">Kostenloser Fahrradverleih für nachhaltigen Verkehr in Regensburg.</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::to(['/site/map']);?>">Standorte anzeigen</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Was ist Bikesharing?</h2>

                <p>
			Bike Sharing Regensburg ist ein kostenloser Fahrradverleih von Transition Regensburg im Wandel, 
			du kannst ein Fahrrad an verschiedenen Standorten für einige Stunden ausleihen und wieder abgeben, 
			der Vorteil ist, dass du keine großen Umwege machen musst, 
			um das Fahrrad zurück zu bringen.
		</p>

                <p><a class="btn btn-default" href="<?= Url::to(['/site/about']);?>">Mehr Informationen</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Spende ein Rad!</h2>

                <p>
			Das Verleih wird von uns völlig kostenlos angeboten,
			um das zu ermöglichen sind wir auf deine Hilfe angewiesen.
			Wir nehmen dein Fahrrad kostenlos an, ehrenamtliche Helfer reparieren es, 
			danach kann dein Fahrrad über kooperierende Café`s ausgeliehen werden.
		</p>

                <p><a class="btn btn-default" href="<?= Url::to(['/site/contact']);?>">Kontakt Formular</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Spende für Ersatzteile!</h2>

                <p>
			Die gespendeten Räder haben oft defekte oder veraltete Teile, 
			um die Räder bei der Reparatur wieder Verkehrstauglich zu machen
			müssen wir einige Ersatzteile besorgen. 
			<br /> 
			Hilf uns durch eine Spende das zu finanzieren.
		</p>

		<h4>Paypal</h4>
                <p>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_donations">
				<input type="hidden" name="business" value="info@transition-regensburg.de">
				<input type="hidden" name="lc" value="DE">
				<input type="hidden" name="item_name" value="Transition Regensburg e.V.">
				<input type="hidden" name="item_number" value="Bikesharing">
				<input type="hidden" name="no_note" value="0">
				<input type="hidden" name="currency_code" value="EUR">
				<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest">
				<input type="image" src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal." title="Über Paypal spenden">
				<img alt="Über Paypal spenden" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
			</form>
		</p>

		<h4>Überweisung</h4>
		<p>	
			
                                 Transition Regensburg e.V. - gemeinnütziger Verein
                         <br/>   IBAN: DE68 4306 0967 8217 3641 00
                         <br/>   BIC: GENODEM1GLS
                         <br/>   GLS Gemeinschaftsbank eG
                         <br/>   Verwendungszweck: Bikesharing
                </p>

            </div>
        </div>

    </div>
</div>
