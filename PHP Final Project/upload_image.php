<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload Image</title>
	<style type="text/css" title="text/css" media="all">
	.error {
		font-weight: bold;
		color: #C00;
	}
	</style>
</head>
<body>
<?php # Script 11.2 - upload_image.php
	require 'dbConnect_PDO.php';

//check if the form has been submitted:
		if ($_SERVER['REQUEST_METHOD']) == 'POST') {
			
			//check for an uploaded file:
			if (isset($_FILES['upload'])) {
			
			//validate the type. should be jpeg or png
			$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
			if (in_array($_FILES['upload']['type'], $allowed)) {
				
				//move the file overload
				if (move_uploaded_file($_FILES['upload']['tmp_name'], "../uploads/{$_FILES['upload']['name']}")) {
					echo '<p><em>The file been uploaded!</em></p>';
				} //end of move... IF.
				
			}else{ //invalid type
				echo '<p class="error">Please upload a JPEG or PNG image.</p>';
			}
			
			} //end of isset($_FILES['upload']) IF.
			
			//check for error
			if ($_FILES['upload']['error'] > 0) {
				echo '<p class="error">The file could not be uploaded because: <strong>';
				
				//print a message based on the error
				switch ($_FILES['upload']['error']){
					case 1:
					print 'The file exceeds the upload_max_filesize setting in php.ini.';
					break;
					case 2:
					print 'The file exceedsthe MAX_FILE_SIZE setting in the HTML form.';
					break;
					case 3:
					print 'The file was only partially uploaded.';
					break;
					case 4:
					print 'No file was uploaded.';
					break;
					case 5:
					print 'No temporary folder was available.';
					break;
					case 6:
					print 'Unable to write to the disk.';
					break;
					case 7:
					print 'File upload stopped.';
					break;
					default:
					print 'A system error occured.';
					break;
				} //end of switch
				
				print '</strong></p>';
				
			} //End of error IF.
			
			//Delete the file if it still exists
			if(file_exists ($_FILES['upload']['tmp_name'] && is_file($_FILES['upload']['temp_name'])) {
				unlink ($_FILES['upload']['temp_name']);
			}
			
		}//end of the submitted conditional.
?>
			
<form enctype="multipart/form-data" action="upload_image.php" method="post">

<input type="hidden" name="MAX_FILE_SIZE" value="524288" />

<fieldset><legend>Select a JPEG or PNG image of 512KB or smaller to be uploaded:</legend>

<p><b>File:</b> <input type="file" name="upload" /></p>

</fieldset>
<div align="center"><input type="submit" name="submit" value="Submit" /></div>

</form>
</body>
</html>

	