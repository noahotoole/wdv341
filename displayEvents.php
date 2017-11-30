<?php
try {
	//connect to database
	require 'dbConnect_PDO.php';
	
	//create query
	$sql = "SELECT event_id, event_name, event_description, event_presenter, event_day, event_time
	FROM wdv341_events";
	$message="";

	$resultsTable="";
	$event_id="";
	$event_name="";
	$event_description="";
	$event_presenter="";	
	$event_day="";
	$event_time="";	
	
	//prepare the statement
	$statement = $conn->prepare($sql);
	
	//check if successful
	if (!$statement){
		$message = "prepare fail";
	}
	
	//execute
	if ($statement->execute()){
		$resultsTable="<h1>Display Events</h1>";
		
		if ($statement->rowCount() > 0){
			
			$resultsTable .= "<table>";
			$resultsTable .= "<th>Event ID</th>";
			$resultsTable .= "<th>Event Name</th>";
			$resultsTable .= "<th>Event Description</th>";
			$resultsTable .= "<th>Event Presenter</th>";
			$resultsTable .= "<th>Event Day</th>";			
			$resultsTable .= "<th>Event Time</th>";	
			
		}
			while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$resultsTable .= "<tr><td>";
			$resultsTable .= $row['event_id'];		
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['event_name'];	
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['event_description'];
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['event_presenter'];
			$resultsTable .= "</td><td>";
			$resultsTable .= $row['event_day'];
			$resultsTable .= "</td><td>";			
			$resultsTable .= $row['event_time'];	
			$resultsTable .= "</td></tr>";	
			}

			$resultsTable .= "<tr><td>";
			$resultsTable .= $event_id;
			$resultsTable .= "</td><td>";			
			$resultsTable .= $event_name;
			$resultsTable .= "</td><td>";			
			$resultsTable .= $event_description;
			$resultsTable .= "</td><td>";
			$resultsTable .= $event_presenter;
			$resultsTable .= "</td><td>";
			$resultsTable .= $event_day;
			$resultsTable .= "</td><td>";			
			$resultsTable .= $event_time;			
			$resultsTable .= "</td></tr>";			
			$resultsTable .= "</table>";
		}
		
	}	catch (PDOException $e){
	$message .= "oops there's another error";
	error_log($e->getMessage());
	
}		
  	//close while loop
$statement = null;
$conn = null;	//Close the database connection	
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>WDV341 Intro PHP  - Display Events Example</title>
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background-color:#CCC;	
		}
		
		.displayEvent{
			text_align:left;
			font-size:18px;	
		}
		
		.displayDescription {
			margin-left:100px;
		}
	</style>
</head>

<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Example Code - Display Events as formatted output blocks</h2>   
    <h3> <?php echo $query->num_rows; ?> Events are available today.</h3>


	<p>
        <div class="eventBlock">	
            <div>
            	<span class="displayEvent">Event: <?php echo $event_name ?></span>
            	<span class="displayDescription">Description: <?php echo $event_description ?></span>
            </div>
            <div>
            	Presenter: <?php echo $event_presenter ?>
            </div>
            <div>
            	<span class="displayTime">Time: <?php echo $event_time ?></span>
            </div>
            <div>
            	<span class="displayDate">Date: <?php echo $event_day ?></span>
            </div>
        </div>
    </p>


</div>	
</body>
</html>