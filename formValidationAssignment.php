<?php
session_start();
//if ($_SESSION['validUser'] == "yes")	//If this is a valid user allow access to this page
//{
		
	//Setup the variables used by the page
		//field data
		$name = "";
		$socialSecurity = "";
		$customerResponse = "";
		$robotest = "";
		$subject = "WDV341 Form Validation";	
		$fromEmail = "njotoole@dmacc.edu";		
		$toEmail = "njotoole@dmacc.edu";		
		$emailBody = "";			
		$headers = "";				
 		
			
	
		//error messages
		$nameErrMsg = "";
		$socialSecurityErrMsg = "";
		$customerResponseErrMsg = "";
		
		
		$validForm = false;
				
	if(isset($_POST["submit"]))
	{	
		//The form has been submitted and needs to be processed
		
		
		//Validate the form data here!
	
		//Get the name value pairs from the $_POST variable into PHP variables
		//This example uses PHP variables with the same name as the name atribute from the HTML form
		$name = $_POST['inName'];
		$socialSecurity = $_POST['inSocialSecurity'];
		$customerResponse = $_POST['inCustomerResponse'];
		$robotest = $_POST['inRobotest'];

		
		// Email form
		$emailBody = "Form Data\n\n ";			
		foreach($_POST as $key => $value)									
		{
			$emailBody.= $key."=".$value."\n";	
		} 

		$headers = "From: $fromEmail" . "\r\n";				
 		
		
		//VALIDATION FUNCTIONS		Use functions to contain the code for the field validations.  
			function validateName($inName)
			{
				global $validForm, $nameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$nameErrMsg = "";
				
				if($inName == "")
				{
					$validForm = false;
					$nameErrMsg = "First name cannot be spaces";
				}
			}//end validateName()

			function validateSocialSecurity($inSocialSecurity)
			{
				global $validForm, $socialSecurityErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$socialSecurityErrMsg = "";
				
//////////////////////////////////////////////Must be numeric, no hyphens or ( ).  Must be the right size.  Use a Regular Expression for this validation.
				if (!is_numeric($inSocialSecurity)) 
				{
					$validForm = false;
					$socialSecurityErrMsg = "Social Security must be a number";
				
				}else{
					
				if (preg_match('[-()]', $inSocialSecurity)) {
					$validForm = false;
					$socialSecurityErrMsg = "Cannot contain hypens '-' or parentheses'()' ";
			}
		}
	}//end validateSocialSecurity()	

		//VALIDATE CUSTOMER Response
		    function validateCustomerResponse($inCustomerResponse)
			{
				global $validForm, $customerResponseError; // global variables
				
				if (empty($inCustomerResponse)) {
					
					$validForm = false; 
					$customerResponseErrMsg = "Please select a response";
			}
		}
		
		//VALIDATE FORM DATA  using functions defined above
		$validForm = true;		//switch for keeping track of any form validation errors
		
		validateName($name);
		validateSocialSecurity($socialSecurity);
		validateCustomerResponse($customerResponse);
		
		if($validForm)
		{
			//$message = "Accepted";	
			$message = "";
			
			// Send email if form is valid
			if (mail($toEmail,$subject,$emailBody,$headers)) 	
			{
   				$emailMessage = "Message successfully sent!";
  			} 
			else 
			{
   				$emailMessage = "Message delivery failed...";
  			}
		}
		else
		{
			$message = "Something went wrong";
		}
		
		// validate not robot
		if($robotest)
		{
			$message = "No bots allowed!";
		}
		
	}
	else
	{
		//Form has not been seen by the user.  display the form
	}
	


?>

<style>
.robotic{
	display: none;
}
</style>

<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Form Validation Example</title>
<style>

#orderArea	{
	width:600px;
	background-color:#CF9;
}

.error	{
	color:red;
	font-style:italic;	
}
</style>
</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Form Validation Assignment


</h2>
<div id="orderArea">
  <form id="form1" name="form1" method="post" action="formValidationAssignment.php">
  <h3>Customer Registration Form</h3>
  <table width="587" border="0">
    <tr>
      <td width="117">Name:</td>
      <td width="246"><input type="text" name="inName" id="inName" size="40" value=""/></td>
      <td width="210" class="error"></td>
    </tr>
    <tr>
      <td>Social Security</td>
      <td><input type="text" name="inSocialSecurity" id="inSocialSecurity" size="40" value="" /></td>
      <td class="error"></td>
    </tr>
    <tr>
      <td>Choose a Response</td>
      <td><p>
        <label for="customerResponse">
          <input type="radio" name="inCustomerResponse" id="Phone">
          Phone</label>
        <br>
        <label>
          <input type="radio" name="inCustomerResponse" id="Email">
          Email</label>
        <br>
        <label>
          <input type="radio" name="inCustomerResponse" id="US_Mail">
          US Mail</label>
        <br>
      </p></td>
      <td class="error"></td>
    </tr>
		<tr>
      <!-- The following field is for robots only, invisible to humans: -->
    <p class="robotic" id="pot">
      <label>If you're human leave this blank:</label>
      <input name="inRobotest" type="text" id="inRobotest" class="inRobotest" />
    </p>
    </tr>
  </table>
  <p>
    <input type="submit" name="submit" id="button" value="Register" />
    <input type="reset" name="button2" id="button2" value="Clear Form" />
  </p>
</form>
</div>

</body>
</html>