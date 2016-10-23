		function initialize() {
		
		// the following variables hold descriptions for the information windows. they use html code and may use php code.
		
		var contentstringCornershop = "<div id='content1'>" + "<h3> The Corner Shop </h3>" +
							"<h4> Retailer </h4>" + "<p>The only shop in Rhynie. Sells pies. </p>" +
							"</div>";
		var contentstringRhinturk = "<div id='content2'>" + "<h3> Rhinturk foods </h3>" +
							"<h4> Producer </h4>" + "<p> Located in the cabrach west of Rhynie, it produces jams of all sorts all locally made" +
							"<a href='InfoPageRhinTurk.html'> Directions </a>" +
							"</div>";
							
		  var mapProp = {
			center:new google.maps.LatLng(57.445936,-2.7878059), // Displays the map over the uk for the time being, will be fixed later.
			zoom:8,
			mapTypeId:google.maps.MapTypeId.ROADMAP // sets the map type to a "Roadmap"
		  }

		  var map= new google.maps.Map(document.getElementById("GoogleMap"),mapProp); // Content id used to id the map.
		  
		  var RetailerLatLng = new google.maps.LatLng(57.33318,-2.83249); // First marker for the map, may be converted into an array for a more polished version of the product.
		  var ProducerLatLng = new google.maps.LatLng(57.382571, -3.054563); // Producer latlng
		  
		  var infowindowcornershop = new google.maps.InfoWindow({
			content: contentstringCornershop,
		  });
		  
		  var infowindowRhinturk = new google.maps.InfoWindow({
			content: contentstringRhinturk,
		  })
		  
		  var markercornershop = new google.maps.Marker({ 
			position: RetailerLatLng, // places the markers at specified location
			title: "the corner shop" // title
		});
		
		 var markerRhinturk = new google.maps.Marker({
			position: ProducerLatLng,
			title: "Rhinturk",
		});
		
		
		markercornershop.setMap(map); // places marker on map
		
		markerRhinturk.setMap(map);
		
		markercornershop.addListener('click', function() {
			infowindowRhinturk.close(map, markerRhinturk);// closes the other one.
			infowindowcornershop.open(map, markercornershop);

		});
		
		markerRhinturk.addListener('click', function() {
			infowindowcornershop.close(map, markercornershop);// closes the other one.
			infowindowRhinturk.open(map, markerRhinturk);
			 // closes the other one.
		});
		
		var distanceservice = new google.maps.DistanceMatrixService();
		var displayProducer = true;
		var displayRetailer = false;
		document.getElementById("Enter").addEventListener("click", function() {
			Filterbyrange(distanceservice);
		});
		document.getElementById("filter").addEventListener("click", function() {
			filter();
		});
		
		// The following section will be dedicated to getting data from the fields. 
		// It will use the distance matrix and use information from the database to field the required information.
		
		// first section is on the distance matrix calculations. First we get the distance of the origin as defined, 
		// then test the distance between the origin and the destination.
		
		
		function Filterbyrange(distanceservice) {
			
		var miles = document.getElementById('Miles').value;
		
		var origin = document.getElementById('PostCode').value;
		// convert variable miles into kilometres. thank google for this unneeded step.
		miles = miles * 1.6;
		
		distanceservice.getDistanceMatrix(
		{
			origins: [origin, origin],
			destinations: [RetailerLatLng, ProducerLatLng],
			travelMode: google.maps.TravelMode.DRIVING,
			unitSystem: google.maps.UnitSystem.IMPERIAL, // 
			avoidHighways: false,
			avoidTolls: false,
		}, callback);
		
		function callback(response, status) {
		
			if (status != google.maps.DistanceMatrixService.OK) {
				var origins = response.originAddresses;
				var destinations = response.destinationAddresses;
				
				var markersArray = [markercornershop, markerRhinturk];
				var km = 0;
				var count = 0
				for (i = 0; i < origins.length; i++) {
					
					results = response.rows[i].elements;
					
					for (k = 0; i < destinations.length; k++) {
					
						var element = results[k];
						
						km = element.distance.value / 1000;

						if (km > miles) {
							count += 1
							var marker = markersArray[k];
							
							marker.setMap(null);
						}
						else if (km < miles) {
							var marker = markersArray[k];
							
							marker.setMap(map);
						}
						
					}
				}
			
		
			}
			else {
				alert("Something went wrong");
				alert(status);
			}
		
		}
		}
		
		// Check each filter input for any applied filter.
		function filter() {

			if (document.getElementById("FilterRadio1").checked) {
				// set all filtered items to null
				markerRhinturk.setMap(null);
				markercornershop.setMap(map);
				
			}
			
			else if (document.getElementById("FilterRadio2").checked) {
				markercornershop.setMap(null);
				markerRhinturk.setMap(map);
			}
			
			else if (document.getElementById("FilterRadio3").checked) {
				// Nothing needed right now so bring everything back.
				markercornershop.setMap(map);
				markerRhinturk.setMap(map);
				
			}
			
			else {
				alert("You did not select a filter"); //incase the user breaks it.
			}
		}
		
		}
		
		
		google.maps.event.addDomListener(window, 'load', initialize); // loads the map

