function initMap() {
// Styles a map in night mode.
	var map = new google.maps.Map(document.getElementById('map'), {
	  center: {lat: 40.674, lng: -73.945},
	  zoom: 12,
	  styles: 
	  [
		{
		    "featureType": "administrative",
		    "elementType": "all",
		    "stylers": [
		        {
		            "saturation": "-100"
		        }
		    ]
		},
		{
		    "featureType": "administrative.province",
		    "elementType": "all",
		    "stylers": [
		        {
		            "visibility": "off"
		        }
		    ]
		},
		{
		    "featureType": "landscape",
		    "elementType": "all",
		    "stylers": [
		        {
		            "saturation": -100
		        },
		        {
		            "lightness": 65
		        },
		        {
		            "visibility": "on"
		        }
		    ]
		},
		{
		    "featureType": "poi",
		    "elementType": "all",
		    "stylers": [
		        {
		            "saturation": -100
		        },
		        {
		            "lightness": "50"
		        },
		        {
		            "visibility": "simplified"
		        }
		    ]
		},
		{
		    "featureType": "road",
		    "elementType": "all",
		    "stylers": [
		        {
		            "saturation": "-100"
		        }
		    ]
		},
		{
		    "featureType": "road.highway",
		    "elementType": "all",
		    "stylers": [
		        {
		            "visibility": "simplified"
		        }
		    ]
		},
		{
		    "featureType": "road.arterial",
		    "elementType": "all",
		    "stylers": [
		        {
		            "lightness": "30"
		        }
		    ]
		},
		{
		    "featureType": "road.local",
		    "elementType": "all",
		    "stylers": [
		        {
		            "lightness": "40"
		        }
		    ]
		},
		{
		    "featureType": "transit",
		    "elementType": "all",
		    "stylers": [
		        {
		            "saturation": -100
		        },
		        {
		            "visibility": "simplified"
		        }
		    ]
		},
		{
		    "featureType": "water",
		    "elementType": "geometry",
		    "stylers": [
		        {
		            "hue": "#ffff00"
		        },
		        {
		            "lightness": -25
		        },
		        {
		            "saturation": -97
		        }
		    ]
		},
		{
		    "featureType": "water",
		    "elementType": "labels",
		    "stylers": [
		        {
		            "lightness": -25
		        },
		        {
		            "saturation": -100
		        }
		    ]
		}
	  ]
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

