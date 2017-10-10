<?php

	$contactName = $_POST("contactName");
	$contactEmail = $_POST("contactEmail");
	$contactReason = $_POST("contactReason");
	$contactComments = $_POST("contactComments");
	$mailingList = $_POST("mailingList");
	$moreInformation = $_POST("moreInformation");
	
	$to = "njotoole@dmacc.edu";
	$subject = "Contact Form Assignment";
	$body = "This is an automated message. Please don't reply to this email. \n\n $request";

	mail ($to, $subject, $body);
	
	echo "Message sent! "
?>

<!--?php

	//Do I need to change all this to contactName, etc? Do I need to create a Form.php?  taken from processEmail //include 'Email.php';
	
	$contactEmail = new Email("");  //instantiate
	
	$contactEmail->setRecipient("njotoole@dmacc");
	
	$contactEmail->setSender("");
	
	$contactEmail->setSubject("");
	
	$contactEmail->setMessage("");

	$emailStatus = $contactEmail->sendMail(); //create and send email
	
?>


	from tutorial 1
?php 
$ToEmail = 'njotoole@dmacc.edu'; 
$EmailSubject = 'Site contact form'; 
$mailheader = "From: ".$_POST["email"]."\r\n"; 
$mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$MESSAGE_BODY = "Name: ".$_POST["name"].""; 
$MESSAGE_BODY .= "Email: ".$_POST["email"].""; 
$MESSAGE_BODY .= "Comment: ".nl2br($_POST["comment"]).""; 
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
?>

     from tutorial 2 
?php 

// define variables and set to empty values
$name_error = $email_error = $url_error = "";
$name = $email = $message = $url = $success = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name_error = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format"; 
    }
  }


  if (empty($_POST["url"])) {
    $url_error = "";
  } else {
    $url = test_input($_POST["url"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
      $url_error = "Invalid URL"; 
    }
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }
  
  if ($name_error == '' and $email_error == '' and $phone_error == '' and $url_error == '' ){
      $message_body = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $message_body .=  "$key: $value\n";
      }
      
      $to = 'njotoole@dmacc.edu';
      $subject = 'Contact Form Submit';
      if (mail($to, $subject, $message)){
          $success = "Message sent, thank you for contacting us!";
          $name = $email = $phone = $message = $url = '';
      }
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>-->

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>WDV341 Intro PHP</title>
</head>

<body>
	<h1>WDV341 Intro PHP</h1>
	<h2>PHP Programming Project</h2>
	
	<p>Recipient Email Address: <?php echo $contactEmail->getRecipient(); ?></p>
	<p>Sender Email Address: <?php echo $contactEmail->getSender(); ?></p>
	<p>Subject: <?php echo $contactEmail->getSubject(); ?></p>
	<p>Message: <?php echo $contactEmail->getMessage(); ?></p>
	
	
	<?php
	if ($emailStatus) {
		?>
				<h3><?php echo $contactEmail->getMessage(); ?></h3>
	<?php			
			}else{
	?>			
				<h3>Uh oh! There was an error sending your email!</h3>
	<?php			
			}
	?>
	</h3>	
	
</body>
</html>