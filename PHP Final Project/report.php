<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
<!--Noah O'Toole-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Aliens Abducted Me - Report an Abduction</title>
<style>
body {
	padding: 10px;
} 
</style> 
</head>
<body>
  <h2>Aliens Abducted Me - Report an Abduction</h2>

<?php
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $when_it_happened = $_POST['whenithappened'];
  $how_long = $_POST['howlong'];
  $how_many = $_POST['howmany'];
  $alien_description = $_POST['aliendescription'];
  $what_they_did = $_POST['whattheydid'];
  $fang_spotted = $_POST['fangspotted'];
  $email = $_POST['email'];
  $other = $_POST['other'];
  
				require_once 'header.php';
				require 'aliensConnect.php';	//CONNECT to the database
				
				//mysql DATE stores data in a YYYY-MM-DD format
				$todaysDate = date("Y-m-d");		//use today's date as the default input to the date( )
				
				//Create the SQL command string
				$sql = "INSERT INTO aliens_abduction (";
				$sql .= "first_name, ";
				$sql .= "last_name, ";				
				$sql .= "when_it_happened, ";
				$sql .= "how_long, ";
				$sql .= "how_many, ";
				$sql .= "alien_description, ";				
				$sql .= "what_they_did, ";
				$sql .= "fang_spotted, ";
				$sql .= "email, ";				
				$sql .= "other ";	//Last column does NOT have a comma after it.
				$sql .= ") VALUES (:first_name, :last_name, :when_it_happened, :how_long, :how_many, :alien_description, :what_they_did, :fang_spotted, :email, :other)";
				
				//PREPARE the SQL statement
				$stmt = $conn->prepare($sql);
				
				//BIND the values to the input parameters of the prepared statement
				$stmt->bindParam(':first_name', $first_name);
				$stmt->bindParam(':last_name', $last_name);		
				$stmt->bindParam(':when_it_happened', $when_it_happened);		
				$stmt->bindParam(':how_long', $how_long);		
				$stmt->bindParam(':how_many', $how_many);
				$stmt->bindParam(':alien_description', $alien_description);
				$stmt->bindParam(':what_they_did', $what_they_did);		
				$stmt->bindParam(':fang_spotted', $fang_spotted);		
				$stmt->bindParam(':email', $email);		
				$stmt->bindParam(':other', $other);				
				
				//EXECUTE the prepared statement
				$stmt->execute();	
				
				$message = "The abdction has been reported!"; 
  

  //$to = 'noahotoole@gmail.com';
  //$subject = 'Aliens Abducted Me - Abduction Report';
  //$msg = "$name was abducted $when_it_happened and was gone for $how_long.\n" .
  //  "Number of aliens: $how_many\n" .
  //  "Alien description: $alien_description\n" .
  //  "What they did: $what_they_did\n" .
  //  "Toby spotted: $fang_spotted\n" .
  //  "Other comments: $other";
  //mail($to, $subject, $msg, 'From:' . $email);

  
  
  
  
  echo 'Thanks for submitting the form.<br />';
  echo 'You were abducted ' . $when_it_happened;
  echo ' and were gone for ' . $how_long . '<br />';
  echo 'Number of aliens: ' . $how_many . '<br />';
  echo 'Describe them: ' . $alien_description . '<br />';
  echo 'The aliens did this: ' . $what_they_did . '<br />';
  echo 'Was Toby there? ' . $fang_spotted . '<br />';
  echo 'Other comments: ' . $other . '<br />';
  echo 'Your email address is ' . $email;
?>

</body>
</html>
