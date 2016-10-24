<!rootype html>

<html>

<head>
<title> Browse </title>
<meta charset = "utf-8">
<!-- boostrap -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="css/Browsepage/style.css">
</head>

<body>
<div id= "top">

	<div id= "title">
	<a href="Index.php"><img src="Images\title_images\title.png"></a>
	<h1> Browse </h1> 
	
	<form method="post" id= "searchdetails" action="search.php">
	<div id="Searchbar">

		<input type="text" id="Search" name="search">
		<input type="submit" id="submitbutton" value="search">
		
		<input type="radio" id="NoProducer2" name="filter2" value="Producer">
		<label for="NoProducer2"> No Producers </label>
		<input type="radio" id="NoRetailer2" name="filter2" value="Retailer">
		<label for="NoRetailer2"> No Retailers </label>
		<input type="radio" id="NoFilter2" name="filter2" value="None">
		<label for "NoFilter2"> Do not apply filter </label>
	
	</div>
	</div>
	</form>
	
<!-- This bit here is for parsing information regarding queries. PHP will be used to get the values inputted into these forms -->
	<div id="FiltersLimits">
	<br>
	<br>
	<form id="filters" name="filters" method="post">
	<h3> Filter Out Browsings </h3>
	
	<input type="radio" id="NoProducer" name="filter" value="Producer">
	<label for="NoProducer"> No Producers </label>
	<input type="radio" id="NoRetailer" name="filter" value="Retailer">
	<label for="NoRetailer"> No Retailers </label>
	<br>
	<input type="radio" id="NoFilter" name="filter" value="None">
	<label for "NoFilter"> Do not apply filter </label>
	<input type="submit" id="filtersubmit" name = "filtersubmit" value= "enter">
	</form>
	</div>

</div>


<div id="Results">
<?php

echo "<br>"; // makes it look less clustered together.
 // Select the database.
 @ $db = new mysqli("us-cdbr-azure-southcentral-f.cloudapp.net","bcdbd63fb87dec","7e5a09ea", "prodactor");

  if (mysqli_connect_errno()) 
  {
	
     echo 'Error: Could not connect to database. Please try again later.';
     exit;
  }
 $sql = ("SELECT * FROM `page_information`");
 $result = $db->query($sql);
 	if (isset($_POST['filter'])) {
			
		$selection = $_POST['filter'];

		if ($selection == 'None') {
			
			if ($result->num_rows > 0) {
				// output data of each row
				
				while($row = $result->fetch_assoc()) {
					
					$page = $row["InfoPageLink"];
					$img = $row["img_link"];
					$title = $row["Name"];
					$title = "<h3> $title </h3>";
					echo "<a href='$page'><input type='image' style='width:350; height:300;' src='$img'></a>";
					echo "<br>". "<br>";
					echo $title. "<br>". $row["PostCode"]. "<br>". $row["Address"]. "<br>". "<br>". "<hr>";
				
				}
			} else {
				
				echo "0 results";
				
			}
	}
	elseif ($selection == "Retailer") { //If $selection returns "Retailer" from the assigned values of the filters, proceed to check that all entries are producers only. The same applies for the other if statements.
		
		while($row = $result->fetch_assoc()) {
			
			if ($row['LocationType'] == "Producer") {
					
					$page = $row["InfoPageLink"];
					$img = $row["img_link"];
					$title = $row["Name"];
					$title = "<h3> $title </h3>";
					echo "<a href='$page'><input type='image' style='width:350; height:300;' src='$img'></a>";
					echo "<br>". "<br>";
					echo $title. "<br>". $row["PostCode"]. "<br>". $row["Address"]. "<br>". "<br>". "<hr>";
			}
		}
		
	
	}
	elseif ($selection == "Producer") {
		
		while($row = $result->fetch_assoc()) {
			
			if ($row['LocationType'] == "Retailer") {
					
					$page = $row["InfoPageLink"];
					$img = $row["img_link"];
					$title = $row["Name"];
					$title = "<h3> $title </h3>";
					echo "<a href='$page'><input type='image' style='width:350; height:300;' src='$img'></a>";
					echo "<br>". "<br>";
					echo $title. "<br>". $row["PostCode"]. "<br>". $row["Address"]. "<br>". "<br>". "<hr>";
			}
		}
		
	}
	
	}
		else {
	while($row = $result->fetch_assoc()) {
					
		$page = $row["InfoPageLink"];
		$img = $row["img_link"];
		$title = $row["Name"];
		$title = "<h3> $title </h3>";
		echo "<a href='$page'><input type='image' style='width:350; height:300;' src='$img'></a>";
		echo "<br>". "<br>";
		echo $title. "<br>". $row["PostCode"]. "<br>". $row["Address"]. "<br>". "<br>". "<hr>";
				
				}
			}
$db->close();


?>


</div>
</body>


</html>
