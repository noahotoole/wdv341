<?php

	include 'Email.php';
	
	$contactEmail = new Email("");  //instantiate
	
	$contactEmail->setRecipient("noahotoole@gmail.com");
	
	$contactEmail->setSender("njotoole@dmacc.edu");
	
	$contactEmail->setSubject("Class Time");
	
	$contactEmail->setMessage("Class is at 1:00pm today. The very quick fox jumps over the lazy brown dog.  This message needs to be very long to test the word wrap function. I'm ready for class to be over and want to go home! Class is at 1:00pm today. The very quick fox jumps over the lazy brown dog.  This message needs to be very long to test the word wrap again.");

	$emailStatus = $contactEmail->sendMail(); //create and send email
	
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>WDV341 Intro PHP</title>
</head>

<body>
	<h1>WDV341 Intro PHP</h1>
	<h2>PHP OOP Email Class Test</h2>
	
	<p>Recipient Email Address: <?php echo $contactEmail->getRecipient(); ?></p>
	<p>Sender Email Address: <?php echo $contactEmail->getSender(); ?></p>
	<p>Subject: <?php echo $contactEmail->getSubject(); ?></p>
	<p>Message: <?php echo $contactEmail->getMessage(); ?></p>
	
	
	<?php
	if ($emailStatus) {
		?>
				<h3>Your email has been sent!</h3>
	<?php			
			}else{
	?>			
				<h3>There was an error sending your email!</h3>
	<?php			
			}
	?>
	</h3>	
	
</body>
</html>