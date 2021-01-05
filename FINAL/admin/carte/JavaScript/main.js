$(document).ready(function(){
	map = L.map("map").setView([43.242600, 2.112949], 15);

	var OpenStreetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 17,
		attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
	});

	// la couche « OpenStreetMap » est ajoutée à la carte
	map.addLayer(OpenStreetMap);
	// création d’une couche « Esri_WorldImagery »
	var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
	});
	// la couche « Esri_WorldImagery » est ajoutée à la carte
	map.addLayer(Esri_WorldImagery);
	// création d’un contrôle des couches pour modifier les couches de fond de plan
	var baseLayers = {
		'Esri_WorldImagery' : Esri_WorldImagery,
		'OpenStreetMap' : OpenStreetMap
	};
	// marqueurs 
	var Abo = L.icon({
    iconUrl: './images/home.svg',
	   iconSize:     [38, 95], 
	});
	var nonAbo = L.icon({
    iconUrl: './images/home2.svg',
	iconSize:     [38, 95], 
	});
	L.control.layers(baseLayers).addTo(map);
	// récup et diffusion des points geo json 
	$.getJSON("carte/getData.php",function(json){		
		json.forEach(foyer => {
					if (( Date() > foyer["date_debut"])&&( Date() < foyer["date_dfin"])){
						L.marker([foyer["lat"], foyer["lng"]], {icon: Abo}).addTo(map)
						.bindPopup("Sexe: " +foyer["genre"] + " <br>Nom: "+ foyer["nom_benef"]+ 
						" " + foyer["prenom_benef"]+ "<br> Adresse: " +foyer["adress_fo"]
						+ "<br> tel: " +foyer["tel_benef"] + "<br> mail: " +foyer["mail_benef"]
						,{
							'maxWidth': '500',
							'className' : 'custom'
						})
						.openPopup();
					}

					else {
						L.marker([foyer["lat"], foyer["lng"]], {icon: nonAbo}).addTo(map)
						.bindPopup("Sexe: " +foyer["genre"] + " <br>Nom: "+ foyer["nom_benef"]+ 
						" " + foyer["prenom_benef"]+ "<br> Adresse: " +foyer["adress_fo"]
						+ "<br> tel: " +foyer["tel_benef"] + "<br> mail: " +foyer["mail_benef"]
						,{
							'maxWidth': '500',
							'className' : 'custom'
						})
						.openPopup();
					};
		})
	})
	
	

		
		
	
	
});