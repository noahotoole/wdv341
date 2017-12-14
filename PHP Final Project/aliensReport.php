<?php
try {
	//connect to database
	require 'aliensConnect.php';
	
	//create query
	$sql = "SELECT *
	FROM aliens_abduction WHERE fang_spotted = 'yes'";
	$message="";
	
	$resultsTable ="";
	$first_name ="";
	$last_name="";
	$when_it_happened="";
	$how_long="";
	$how_many="";
	$alien_description="";
	$what_they_did="";
	$fang_spotted="";
	$other="";
	
//logic here	
	
	//prepare the statement
	$statement = $conn->prepare($sql);
	
	//check if successful
	if (!$statement){
		$message = "prepare fail";
	}
	
	//execute
	if ($statement->execute()){
		$resultsTable="<h1>Where Toby has been spotted:</h1>";
		
		if ($statement->rowCount() > 0){
			
			$resultsTable .= "<table>";
			$resultsTable .= "<th>First Name</th>";
			$resultsTable .= "<th>Last Name</th>";
			$resultsTable .= "<th>When It Happened</th>";
			$resultsTable .= "<th>How Long Gone</th>";
			$resultsTable .= "<th>How Many Were There</th>";
			$resultsTable .= "<th>Alien Description</th>";
			$resultsTable .= "<th>What They Did</th>";	
			$resultsTable .= "<th>Toby Spotted</th>";
			$resultsTable .= "<th>Other</th>";				
			
			while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$resultsTable .= "<tr><td>";
			$resultsTable .= $row['first_name'];		
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['last_name'];	
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['when_it_happened'];
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['how_long'];		
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['how_many'];	
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['alien_description'];
			$resultsTable .= "</td><td>";	
			$resultsTable .= $row['what_they_did'];	
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['fang_spotted'];
			$resultsTable .= "</td><td>";				
			$resultsTable .= $row['other'];	
			$resultsTable .= "</td></tr>";				
		
			}
			
			$resultsTable .= "<tr><td>";
			$resultsTable .= $first_name;
			$resultsTable .= "</td><td>";			
			$resultsTable .= $last_name;
			$resultsTable .= "</td><td>";			
			$resultsTable .= $when_it_happened;
			$resultsTable .= "</td><td>";			
			$resultsTable .= $how_long;
			$resultsTable .= "</td><td>";
			$resultsTable .= $how_many;
			$resultsTable .= "</td><td>";
			$resultsTable .= $alien_description;
			$resultsTable .= "</td><td>";
			$resultsTable .= $what_they_did;
			$resultsTable .= "</td><td>";
			$resultsTable .= $fang_spotted;
			$resultsTable .= "</td><td>";			
			$resultsTable .= $other;			
			$resultsTable .= "</td></tr>";			
			$resultsTable .= "</table>";
		}
		
	}
	
	
	
	
} catch (PDOException $e){
	$message .= "oops there's another error";
	error_log($e->getMessage());
	
}

	//$preference = min ($mon_wed, $tue, $wed, $tue_thu);
	//$chosen_day = "";
	

	

//close statement and connection_aborted
$statement = null;
$conn = null;
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Toby Sightings </title>

<style>
	html {
		background-image:url("background.jpg");
		background-size:cover;
}

    table, th, tr, td {
        border: solid 1px black;
        border-collapse: collapse;
    }
    p, th, td {
        text-align: center;
    }
	h1 {
		text-align: center;
		color: white;
	}
    table {
        margin: 0 auto;
    }
    td {
        width: 10%;
		padding: 2%;
    }
    tr:nth-child(even) {
        background-color: lightgreen;
    }
	
    tr:nth-child(odd) {
        background-color: white;
    }	
	
	.img1 {
		position: relative;
		-webkit-animation: mymove 10s infinite; /* Safari 4.0 - 8.0 */
		animation: mymove 10s infinite;
	
/* Safari 4.0 - 8.0 */
	.img1 {-webkit-animation-timing-function: ease;}	
	}
/* Standard syntax */
	.img1 {animation-timing-function: ease;}
/* Safari 4.0 - 8.0 */
	@-webkit-keyframes mymove {
    from {left: -100px;}
    to {left: 1500px;}
	}

/* Standard syntax */
	@keyframes mymove {
    from {left: -100px;}
    to {left: 1500px;}
	}	
.button {
  text-decoration: none;
  background-color: silver;
  color: black;
  text-align:center;
}
</style>

</head>
<img class="img1" src="alienUFO.png" />
<body>
<?php 
echo $resultsTable;
echo $message;
echo $first_name;
echo "<br>";
echo $last_name;
echo "<br>";
echo $when_it_happened;
echo "<br>";
echo $how_long;
echo "<br>";
echo $how_many;
echo "<br>";
echo $alien_description;
echo "<br>";
echo $what_they_did;
echo "<br>";
echo $fang_spotted;
echo "<br>";
echo $other;
echo "<br>";
?>
<button class="button"><a href="http://www.noahotoole.com/wdv341/index.php" class="button">Back</a></button>
</body>
</html>