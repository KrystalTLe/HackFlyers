function initMap() {
// Styles a map in night mode.
	var map = new google.maps.Map(document.getElementById('map'), {
	  center: {lat: 40.674, lng: -73.945},
	  zoom: 12,
	  styles:
	  [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#193341"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2c5a71"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#29768a"},{"lightness":-37}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#3e606f"},{"weight":2},{"gamma":0.84}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#1a3541"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#2c5a71"}]}]
	});
	var geocoder = new google.maps.Geocoder();
	for(var i=0;i<arrayObject.length;i++){
		var location=(arrayObject[i]);
		geocoder.geocode({address: location}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			var myResult = results[0].geometry.location; // reference LatLng value
			map.setCenter(myResult);
			map.setZoom(2);
			marker = new google.maps.Marker({
		      	map: map,
		   	   	position: myResult
		   		});
			}
		});
		

	}
}

