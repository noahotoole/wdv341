<?php
try {
	//connect to database
	require 'dbConnect_PDO.php';
	
	//create query
	$sql = "SELECT cust_pref1, cust_pref2, cust_pref3, cust_pref4
	FROM time_preferences";
	$message="";
	
	$resultsTable ="";
	$mon_wed ="";
	$tue="";
	$wed="";
	$tue_thu="";
	
//logic here
	$cust_pref1_total = "";
	$cust_pref2_total = "";			
	$cust_pref3_total = "";
	$cust_pref4_total = "";		
	
	//prepare the statement
	$statement = $conn->prepare($sql);
	
	//check if successful
	if (!$statement){
		$message = "prepare fail";
	}
	
	//execute
	if ($statement->execute()){
		$resultsTable="<h1>Customer Preferences Average</h1>";
		
		if ($statement->rowCount() > 0){
			
			$resultsTable .= "<table>";
			$resultsTable .= "<th>Mon/Wed</th>";
			$resultsTable .= "<th>Tues</th>";
			$resultsTable .= "<th>Wed</th>";
			$resultsTable .= "<th>Tues/Thu</th>";
			
			while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$resultsTable .= "<tr><td>";
			$resultsTable .= $row['cust_pref1'];		
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['cust_pref2'];	
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['cust_pref3'];
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['cust_pref4'];	
			$resultsTable .= "</td></tr>";	

			$cust_pref1_total += $row['cust_pref1'];
			$cust_pref2_total += $row['cust_pref2'];
			$cust_pref3_total += $row['cust_pref3'];
			$cust_pref4_total += $row['cust_pref4'];			
		
			}
			$mon_wed =round($cust_pref1_total/($statement->rowCount()), 2);
			$tue=round($cust_pref2_total/($statement->rowCount()), 2);
			$wed=round($cust_pref3_total/($statement->rowCount()), 2);
			$tue_thu=round($cust_pref4_total/($statement->rowCount()), 2);	
			
			$resultsTable .= "<tr><td>";
			$resultsTable .= $mon_wed;
			$resultsTable .= "</td><td>";			
			$resultsTable .= $tue;
			$resultsTable .= "</td><td>";			
			$resultsTable .= $wed;
			$resultsTable .= "</td><td>";
			$resultsTable .= $tue_thu;			
			$resultsTable .= "</td></tr>";			
			$resultsTable .= "</table>";
		}
		
	}
	
	
	
	
} catch (PDOException $e){
	$message .= "oops there's another error";
	error_log($e->getMessage());
	
}

	$preference = min ($mon_wed, $tue, $wed, $tue_thu);
	$chosen_day = "";
	
	switch ($preference) {
		case $mon_wed:
		$chosen_day = "Monday/Wednesday 10:10am-Noon";
		break;
		
		case $tue:
		$chosen_day = "Tuesday 6:00-9:00pm";
		break;	
		
		case $wed:
		$chosen_day = "Wednesday 6:00-9:00pm";
		break;	

		case $tue_thu:
		$chosen_day = "Tuesday/Thursday 10:10am-Noon";
		break;		
	}
	

//close statement and connection_aborted
$statement = null;
$conn = null;
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>WDV341 Intro PHP - Survery Tool </title>

<style>
    table, th, tr, td {
        border: solid 1px black;
        border-collapse: collapse;
    }
    h1, p, th, td {
        text-align: center;
    }
    table {
        margin: 0 auto;
    }
    td {
        width: 15%;
    }
    tr:nth-child(even) {
        background-color: lightblue;
    }

</style>

</head>

<body>
<?php 
//echo $resultsTable;
//echo $message;
//echo $cust_pref1_total;
//echo "<br>";
//echo $cust_pref2_total;
//echo "<br>";
//echo $cust_pref3_total;
//echo "<br>";
//echo $cust_pref4_total;
//echo "<br>";
//echo $preference;
//echo "<br>";
?>
<p><h1>Customer Preferences Totals</h1></p>
<p><?php echo $message ?></p>
<p>Mon/Wed Total: <?php echo $cust_pref1_total ?></h1></p>
<p><?php echo "<br>" ?></p>
<p>Tuesday Total: <?php echo $cust_pref2_total ?></p> 
<p><?php echo "<br>" ?></p>
<p>Wednesday Total: <?php echo $cust_pref3_total ?></p>
<p><?php echo "<br>" ?></p>
<p>Tues/Thu Total: <?php echo $cust_pref4_total ?></p>
<p><?php echo "<br>" ?></p>

<p><?php echo $resultsTable ?></p>

<p>To choose the most appropriate day, we averaged the totals of the scores. <?php echo $preference ?> is the average with the lowest number, indicating that day would work best for most students.</p>
<p><?php echo "<br>" ?></p>

<p><h1>The chosen day is <?php echo $chosen_day ?></h1></p>
<p><a href="https://github.com/noahotoole/wdv341" >PHP</a></p>
</body>
</html>
