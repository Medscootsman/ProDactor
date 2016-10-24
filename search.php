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
	<h1> Search results </h1> 
	
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
	</div>
	</form>
	


<div id="Results">
<?php
$filter = "0";
$q = $_REQUEST['search'];
$count = 0;
if (isset($_POST['filter2'])) {
	
	$filter = $_REQUEST['filter2'];
	
}


echo "<br>"; // makes it look less clustered together.
 // Select the database.
 @ $db = new mysqli("us-cdbr-azure-southcentral-f.cloudapp.net","bcdbd63fb87dec","7e5a09ea", "prodactor");

  if (mysqli_connect_errno()) 
  {
	
     echo 'Error: Could not connect to database. Please try again later.';
     exit;
  }
	
	$sql = ("SELECT * FROM `page_information` WHERE `Name` LIKE '%$q%'"); // looks for anything like what has been specified in the q variable the 2 percentages indicate wildcards.
	
	$result = $db->query($sql);
	
			if ($result->num_rows > 0) {
				// output data of each row
				if($filter =="None" or $filter =="0") { // checks if a filter is applied
					while($row = $result->fetch_assoc()) {
						//paste the database results in with a mix of html coding.
						
						$page = $row["InfoPageLink"];
						$img = $row["img_link"];
						$title = $row["Name"];
						$title = "<h3> $title </h3>";
						echo "<a href='$page'><input type='image' style='width:350; height:300;' src='$img'></a>";
						echo "<br>". "<br>";
						echo $title. "<br>". $row["PostCode"]. "<br>". $row["Address"]. "<br>". "<br>". "<hr>";
						$count += 1;
					
					}
				}
				
				else if($_REQUEST['filter2'] == "Producer") { //
					while($row = $result->fetch_assoc()) {
						if ($row['LocationType'] == "Retailer") { // looks at the database to see what the location type is.
							//paste the database results in with a mix of html coding.
							
							$page = $row["InfoPageLink"];
							$img = $row["img_link"];
							$title = $row["Name"];
							$title = "<h3> $title </h3>";
							echo "<a href='$page'><input type='image' style='width:350; height:300;' src='$img'></a>";
							echo "<br>". "<br>";
							echo $title. "<br>". $row["PostCode"]. "<br>". $row["Address"]. "<br>". "<br>". "<hr>";
							$count += 1;
						}
					}
				}
				
				elseif ($filter == "Retailer") { // 
					while($row = $result->fetch_assoc()) {
						if ($row['LocationType'] == "Producer") {
							//paste the database results in with a mix of html coding.
							
							$page = $row["InfoPageLink"];
							$img = $row["img_link"];
							$title = $row["Name"];
							$title = "<h3> $title </h3>";
							echo "<a href='$page'><input type='image' style='width:350; height:300;' src='$img'></a>";
							echo "<br>". "<br>";
							echo $title. "<br>". $row["PostCode"]. "<br>". $row["Address"]. "<br>". "<br>". "<hr>"; 
							$count += 1;
						}
					}
				}
				
			} 
				// if nothing is found paste it in here
				echo "<p><b>Found $count results</b></p>";
				
			
?>
</div>
</body>
</html>
