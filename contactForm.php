<?php

	include "Email.php";
	
	$contactName = "";
	$contactEmail = "";
	$contactReason = "";
	$contactComments = "";
	$mailingList = "";
	$moreInformation = "";
	$robotest = "";	
	
	//error messages
	$contactNameErr = "";
	$contactEmailErr = "";
	$contactReasonErr = "";
	$contactCommentsErr = "";
	
	$validForm = false;
	
	//will only process if name and email is submitted
	if (isset($_POST["submit"])){
	
	$contactNameErr = $_POST["contactNameErr"];
	$contactEmailErr = $_POST["contactEmailErr"];
	$contactReasonErr = $_POST["contactReasonErr"];
	$contactCommentsErr = $_POST["contactCommentsErr"];
	
	$contactName = $_POST["contactName"];
	$contactEmail = $_POST["contactEmail"];
	$contactReason = $_POST["contactReason"];
	$contactComments = $_POST["contactComments"];
	
	$robotest = $_POST['inRobotest'];	

	$reasonDefault = $_POST["default"];

	function validateName($inName){
		global $validForm, $contactNameErr;
		$contactNameErr="";
		
		if($inName=""){
			$validForm = "false";
			$contactNameErr = "Cannot be blank";
		}
		
	}
	
	function validateEmail($inEmail){
		global $validForm, $contactEmailErr;
		$contactEmailErr="";
		
		if($inEmail=""){
			$validForm = "false";
			$contactEmailErr = "Needs a proper address";
		}else{
			if (!filter_var($inEmail, FILTER_VALIDATE_EMAIL)){
			$validForm = "false";
			$contactEmailErr = "Needs a proper address format";			
			}
		}
		
	}
	
	function validateReason ($inReason){
		global $validForm, $contactReasonErr;
		$contactReasonErr="";
		
		if($inReason = "default"){
			$validForm = "false";
			$contactReasonErr = "Must select a choice";
		}
	}
	
	function validateComments ($inComments){
		global $validForm, $contactCommentsErr;
		$contactCommentsErr="";
		
		if($_POST["contactReason"]=="other" && empty($inMessage)){
			$validForm = "false";
			$contactCommentsErr="Message is required";
		}
			
	}
	
// validate not robot
	function validateRobotest ($inRobotest){
		global $validForm;
		
		if(!empty($inRobotest)){
			$validForm="false";
		}
	}

	$validForm=true;
	
	validateName($contactName);
	validateEmail($contactEmail);
	validateComments($contactComments);
	validateReason($contactReason);
	
	if 	($validForm){
		$timeStamp=date("F j, y, g:i a:");
		$createEmail= new Email("");
		
		$createEmail->setRecipient=("njotoole@dmacc.edu");
		$createEmail->setSender=($contactEmail);	
		$createEmail->setSubject=("Contact Form");	
		$createEmail->setMessage=("From: $contactName Email: $contactEmail Contact Reason: $contactReason Message: $contactComments");	

		$emailStatus=$createEmail->sendMail();
		
//Message to sender
		$createEmail= new Email("");

		$createEmail->setRecipient=($contactEmail);
		$createEmail->setSender=("njotoole@dmacc.edu");	
		$createEmail->setSubject=("Contact Form Confirmation");	
		$createEmail->setMessage=("Everything was successful!");	

		$emailStatus=$createEmail->sendMail();	($contactEmail)
	}		
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>WDV341 Intro PHP - Form Processing</title>
</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Programming Project - Contact Form</h2>

<form action="contactForm.php" method="POST" name="contactForm" >
  <p>&nbsp;</p>
  <p>
    <label>Your Name:
      <input type="text" name="contactName" id="contactName" placeholder="Name">
    </label> <span class="error" name="contactNameErr"><?php echo $contactNameErr?></span>
  </p>
  <p>Your Email: 
    <input type="email" name="contactEmail" id="contactEmail" placeholder="Email">
    </label><span class="error" name="contactEmailErr"><?php echo $contactEmailErr?></span>	
  </p>
  <p>Reason for contact: 
    <label>
      <select name="contactReason" id="contactReason">
        <option name="default" value="default">Please Select a Reason</option>
        <option value="product">Product Problem</option>
        <option value="return">Return a Product</option>
        <option value="billing">Billing Question</option>
        <option value="technical">Report a Website Problem</option>
        <option value="other">Other</option>
      </select>
    </label>
  </p>
  <p>
    <label>Comments:
      <textarea name="contactComments" id="contactComments" cols="45" rows="5" placeholder="Comments:"></textarea>
    </label><span class="error" name="contactCommentsErr"><?php echo $contactCommentsErr?></span>
  </p>
  <p>
    <label>
      <input type="checkbox" name="mailingList" id="mailingList" checked>
      Please put me on your mailing list.</label>
  </p>
  <p>
    <label>
      <input type="checkbox" name="moreInformation" id="moreInformation" checked>
      Send me more information</label>
  about your products.  </p>
  <p>
    <input type="hidden" name="hiddenField" id="hiddenField" value="application-id:US447">
  </p>
  
<!-- The following field is for robots only, invisible to humans: -->
    <p class="robotic" id="pot">
      <label>If you're human leave this blank:</label>
      <input name="inRobotest" type="hidden" id="inRobotest" class="inRobotest" />
    </p> 
  
  <p>
    <input type="submit" name="submit" id="submitForm" value="Submit">
    <input type="reset" name="reset" id="resetForm" value="Reset">
  </p>
  
</form>
<p>&nbsp;</p>
</body>
</html>