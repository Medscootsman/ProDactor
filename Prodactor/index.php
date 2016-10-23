<html>
<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css"> 
		
		
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD6Lyin33xf1cw42H4_FI8dvhLK9Q2mMM&callback=initialize"> </script> 
		
		<script src="Scripts\JavaScript\init.js"></script>

		<title> Prodactor </title>

</head>
		<body style="background-color:#04223D;">
		
				
		<div id="TopBar">
			
			<div id="Header">
				<img src="Images\title_images\title.png">
			</div>
			
			<div id="Browse_button">
				<a href="BrowsePage.php"><input type="image" src="Images\title_images\button_browse.png"></a>
			</div>
			
		</div>
		
		<br>
		<br>
		<br>
		
		<div id="Middle">
			
			<div id="Search_and_Filters">
			<form method="post" action="search.php">
				<input type="text" id="search" placeholder="Find Location" name="search">
				<button type="submit" id="searchButton">Search </button>
			
				
					<h4> Filters </h4>
					<input type="radio" id="FilterRadio1" name="filter2" value="Producer">
					<label for="NoFood"> No Producers </label>
					<br>
					
					<input type="radio" id="FilterRadio2" value="Retailer" name="filter2">
					<label for="NoRetailers"> No Retailers </label>
					<br>
					
					<input type="radio" id="FilterRadio3" value="None" name="filter2">
					<label for="Nofilters"> No Filter applied </label>
					<br>
					<input type="button" id="filter" value="Enter">
			</form>
				
				<form>
					<h4> Limit Range </h4>
					<input type="text" id="PostCode" placeholder="Enter PostCode">
					<br>
					<br>
					<input type="text" id="Miles">
					<label for="Miles"> Miles </label>
					<input type= "button" value="Enter" id="Enter">
				</form>
			
			</div>
		
		</div>
		
		<div id="Bottom">
			<div id="GoogleMap" style="width:850px;height:480px;">
				
			</div>
			<div id="Directions">
				<br>
			</div>
		</div>
		</body>
</html>