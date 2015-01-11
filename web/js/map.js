
	var iconStyle = new ol.style.Style({
	  image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
	    opacity: 0.75,
	    src: 'images/bicycle19.png'
	  }))
	});
	var iconStyleHome = new ol.style.Style({
	  image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
	    opacity: 0.75,
	    src: 'images/dwelling1.png'
	  }))
	});
	var stroke = new ol.style.Stroke({
			color: 'black',
			width: 3
	});
	var textStroke = new ol.style.Stroke({
		    color: '#fff'
	});
	var textFill = new ol.style.Fill({
		    color: '#000'
	});
	var textFillBlue = new ol.style.Fill({
		    color: 'blue'
	});
	var map = new ol.Map({
		interactions: ol.interaction.defaults().extend([
			new ol.interaction.Select({
				
			})
        	]),
        	target: 'map',
		layers: [
			new ol.layer.Tile({
				title: "Global Imagery",
				source: new ol.source.OSM({url:"http://b.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png"})
			}),
			
			new ol.layer.Vector({
				title: 'Bikesharingpoints',
				source: new ol.source.GeoJSON({
					url: 'http://bikesharing-r.de/index.php?r=site/distributors',
					projection: 'EPSG:3857'
				}),
				style: iconStyle
			})
			
		],
        	view: new ol.View({
		  	//projection: 'EPSG:4326',
		  	center: ol.proj.transform([12.0926538, 49.0193644], 'EPSG:4326', 'EPSG:3857'),
		  		zoom: 13
        	})
      	});
	var displayFeatureInfo = function(pixel) {

	  var feature = map.forEachFeatureAtPixel(pixel, function(feature, layer) {
	    return feature;
	  });

	  var info = $("div[id='popovers'] p");
	  if (feature) {
	    $(".name").html(feature.get('name'));
	    $(".adresse").html(feature.get('adresse'));
	    $(".oeffnungszeiten").html(feature.get('oeffnungszeiten'));
	   
	    //Get number of bikes for location xy and activate number of bike images
	    $(".bike").hide();
	    var numBikes = feature.get("bikes");
	    var numLastenraeder = feature.get("lastenraeder");
	    for(var i=1;i<=numBikes;i++){
		$(".bike-"+i).show();
	    }
	    for(var i=1;i<=numLastenraeder;i++){
		$(".lastenrad-"+i).show();
	    }
	    if(numBikes == 0 && numLastenraeder == 0) $(".nobike").show();

	    $("#popovers").show();
	  } else {
	    $("#popovers").hide();
	  }

	};


	map.on('singleclick', function(evt) {
	  	var coordinate = evt.coordinate;
	  	var hdms = ol.coordinate.toStringHDMS(
			ol.proj.transform(coordinate, 'EPSG:3857', 'EPSG:4326')
		);
		displayFeatureInfo(evt.pixel);
	});
	$("span[class='closeinfo']").click(function(){
		$("#popovers").hide();
	});

	
	function getLocation() {
	    if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
	    } else {
		alert("Geolocation is not supported by this browser.");
	    }
	}
	function showPosition(position) {
		map.getView().setCenter(ol.proj.transform([position.coords.longitude, position.coords.latitude], 'EPSG:4326', 'EPSG:3857'));
    		map.getView().setZoom(15);
		
		var positionVector = new ol.layer.Vector({
			title: 'Position',
			source: new ol.source.Vector({
				features: [new ol.Feature({
				    geometry: new ol.geom.Point(ol.proj.transform([position.coords.longitude, position.coords.latitude], 'EPSG:4326', 'EPSG:3857')),
				    name: 'Meine Position',
				    adresse: '',
				    oeffnungszeiten: ''
				})]
			}),
			style: iconStyleHome
		})
 		map.addLayer(positionVector);
	}
	$("#currentlocation").click(function(){
		getLocation();
	});
	/*
	$("#konzept").click(function(){
		window.open("konzept.html");
	});
	*/
	/*
	$("#mail").click(function(){
		window.location.href = "mailto:info@bikesharing-r.de";
	});
	*/
	
$.getJSON("http://bikesharing-r.de/index.php?r=site/distributors", function(data){
	console.log(data.type);
});
