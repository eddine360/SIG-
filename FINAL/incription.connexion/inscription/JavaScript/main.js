$(document).ready(function(){
	map = L.map("map").setView([47, 2.424], 6);
	var OpenStreetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 17,
		attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
	});

	// la couche « OpenStreetMap » est ajoutée à la carte
	map.addLayer(OpenStreetMap);

	// création d’une couche « GeoportailFrance_ignMaps »
	// var GeoportailFrance_ignMaps = L.tileLayer('https://wxs.ign.fr/{apikey}/geoportail/wmts?REQUEST=GetTile&SERVICE=WMTS&VERSION=1.0.0&STYLE={style}&TILEMATRIXSET=PM&FORMAT={format}&LAYER=GEOGRAPHICALGRIDSYSTEMS.MAPS&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}', {
	// attribution: '<a target="_blank" href="https://www.geoportail.gouv.fr/">Geoportail France</a>',
	// bounds: [[-75, -180], [81, 180]],
	// minZoom: 2,
	// maxZoom: 18,
	// apikey: 'choisirgeoportail',
	// format: 'image/jpeg',
	// style: 'normal'
	// });

	// la couche « GeoportailFrance_ignMaps » est ajoutée à la carte
	// map.addLayer(GeoportailFrance_ignMaps);

	// var GeoportailFrance_orthos = L.tileLayer('https://wxs.ign.fr/{apikey}/geoportail/wmts?REQUEST=GetTile&SERVICE=WMTS&VERSION=1.0.0&STYLE={style}&TILEMATRIXSET=PM&FORMAT={format}&LAYER=ORTHOIMAGERY.ORTHOPHOTOS&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}', {
	// attribution: '<a target="_blank" href="https://www.geoportail.gouv.fr/">Geoportail France</a>',
	// bounds: [[-75, -180], [81, 180]],
	// minZoom: 2,
	// maxZoom: 19,
	// apikey: 'choisirgeoportail',
	// format: 'image/jpeg',
	// style: 'normal'
	// });

	// map.addLayer(GeoportailFrance_orthos);

	// création d’une couche « Esri_WorldImagery »
	
	// var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
	// attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
	// });

	// la couche « Esri_WorldImagery » est ajoutée à la carte
	
	//map.addLayer(Esri_WorldImagery);

	// création d’un contrôle des couches pour modifier les couches de fond de plan
	// var baseLayers = {
		// 'OpenStreetMap' : OpenStreetMap,
		// 'GeoportailFrance_ignMaps' : GeoportailFrance_ignMaps,
		// 'GeoportailFrance_orthos' : GeoportailFrance_orthos,
		// 'Esri_WorldImagery' : Esri_WorldImagery
	// };

	// L.control.layers(baseLayers).addTo(map);

	$("#recherche_adresse").autocomplete({
		source: function( request, response ) {
		  $.ajax( {
			url: "https://wxs.ign.fr/jhyvi0fgmnuxvfv0zjzorvdn/ols/apis/completion?maximumResponses=10&type=StreetAddress&terr=81&text="+ request.term,
			dataType: "jsonp",
			success: function( data ) {
				adresse = data.results[0];
				response( data.results );
			}
		  });
		},
		focus: function( event, ui ) {
		  $( "#recherche_adresse" ).val( ui.item.fulltext );
		  adresse = ui.item;
		  return false;
		},
		select: function( event, ui ) {
		  $( "#recherche_adresse" ).val( ui.item.fulltext );
		  adresse = ui.item;
		  return false;
		}
	}).autocomplete( "instance" )._renderItem = function( ul, item ) {
		return $( "<li>" )
		  .append( "<div>" + item.fulltext + "</div>" )
		  .appendTo( ul );
	};
});

function recherche() {
	var marker = L.marker([adresse.y, adresse.x]).addTo(map);
	marker.bindPopup(adresse.fulltext).openPopup();
	map.setView([adresse.y, adresse.x], 17);
	
	document.getElementById("geo").value = [adresse.x];
	document.getElementById("geo2").value = [adresse.y];
}