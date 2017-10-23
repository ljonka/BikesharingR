<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Über uns';
//$this->params['breadcrumbs'][] = $this->title;
/*
$this->registerLinkTag([
	'rel'=>'stylesheet',
	'type'=>'text/css',
	'href'=>'/css/ol.css'
]);
$this->registerLinkTag([
        'rel'=>'stylesheet',
        'type'=>'text/css',
        'href'=>'/css/map.css'
]);
*/
?>
<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8"/>
	<meta name="description" content="Kostenloses Bikesharing für Regensburg, von einer Gruppe der Bürgerbewegung Transition Regensburg im Wandel."/>
	<meta name="keywords" content="Bikesharing, Regensburg, Gemeingüter, Sharing Economy, Transport, Nachhaltig, Nachbarschaft, Transition Regensburg, Transition Town, Regensburg im Wandel" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="/css/ol.css" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="/css/map.css" type="text/css">
  </head>
<body>
<div class="site-map">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="/js/ol.js" type="text/javascript"></script>

	<div id="popovers">
		<span class="closeinfo"><img src="/images/close3.png" alt="Close"></span>
		<div class="info">
			<h3 class="name">Test</h3>
			<p class="adresse"></p>
			<p class="oeffnungszeiten"></p>
		</div>
		<div class="bikes">
			<img class="bike bike-1" src="/images/bicycle19.png" alt="Fahrrad">
			<img class="bike bike-2" src="/images/bicycle19.png" alt="Fahrrad">
			<img class="bike bike-3" src="/images/bicycle19.png" alt="Fahrrad">
			<img class="bike bike-4" src="/images/bicycle19.png" alt="Fahrrad">
			<img class="bike bike-5" src="/images/bicycle19.png" alt="Fahrrad">
			<img class="bike bike-6" src="/images/bicycle19.png" alt="Fahrrad">
			<img class="bike bike-7" src="/images/bicycle19.png" alt="Fahrrad">
			<img class="bike bike-8" src="/images/bicycle19.png" alt="Fahrrad">
			<img class="bike bike-9" src="/images/bicycle19.png" alt="Fahrrad">
			<img class="bike bike-10" src="/images/bicycle19.png" alt="Fahrrad">
			<img class="bike lastenrad-1" src="/images/lastenrad.png" alt="Lastenrad">
			<img class="bike lastenrad-2" src="/images/lastenrad.png" alt="Lastenrad">
			<img class="bike lastenrad-3" src="/images/lastenrad.png" alt="Lastenrad">
			<img class="bike lastenrad-4" src="/images/lastenrad.png" alt="Lastenrad">
			<img class="bike lastenrad-5" src="/images/lastenrad.png" alt="Lastenrad">
			<img class="bike lastenrad-6" src="/images/lastenrad.png" alt="Lastenrad">
			<img class="bike lastenrad-7" src="/images/lastenrad.png" alt="Lastenrad">
			<img class="bike lastenrad-8" src="/images/lastenrad.png" alt="Lastenrad">
			<img class="bike lastenrad-9" src="/images/lastenrad.png" alt="Lastenrad">
			<img class="bike lastenrad-10" src="/images/lastenrad.png" alt="Lastenrad">
			<h3 class="bike nobike">Kein Rad verfügbar</h3>
		</div>
	</div>

	<div id="map"></div>

	<script src="/js/map.js" type="text/javascript"></script>
    
</div>
</body>
</html>
