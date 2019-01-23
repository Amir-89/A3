<?php
//must appear BEFORE the <html> tag
session_start();
include_once('required/config.php');
?>

<?php

if(isset($_POST["submit"])) {
	$target_dir = "images/";
	$target_file = basename($_FILES["filetoupload"]["name"]);
	echo "$target_file <br />\n";
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	//$csvFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	echo "$imageFileType <br />\n";

	// Check if file already exists
	if (file_exists($target_dir . $target_file)) {
		echo "Sorry, file already exists.<br />\n";
		$uploadOk = 0;
	}
	else {
	
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		else {
			echo "File is an image file.<br />\n";
        	$uploadOk = 1;
		}
		// Check file size
		if ($_FILES["filetoupload"]["size"] > 500000) {
			echo "Sorry, your file is too large.<br />\n";
			$uploadOk = 0;
		}
    }
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.<br />\n";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"],$target_dir . $target_file)) {
			echo "The file ". $target_file. " has been uploaded.<br />\n";
		} else {
			echo "Sorry, there was an error uploading your file.<br />\n";
		}
	}
	}
else {
	echo "Error form submit.<br />\n";
}
?>

<?php
if(isset($_POST['submit'])) {
	$target_file = basename($_FILES["filetoupload"]["name"]);
    //make the database connection
    $conn  = db_connect();
    //$target_file = $conn -> real_escape_string($_POST['submit']);
	/*$lname = $conn -> real_escape_string($_POST['lname']);
	$age = $conn -> real_escape_string($_POST['age']);
	$country = $conn -> real_escape_string($_POST['country']);
	$university = $conn -> real_escape_string($_POST['university']);
	//$degree = $_POST['degree'];
	$gpa = $conn -> real_escape_string($_POST['gpa']);
    $email = $conn -> real_escape_string($_POST['email']);
    $password = $conn -> real_escape_string($_POST['password']);*/
    //create an insert query
    $sql = "insert into images (image) 
			VALUES ('$target_file')";
    //execute the query
    if($conn -> query($sql))
    {
        /*echo "<div class=\"container\">";
        echo "<h2> Dear $fname, your application was submitted successfully.</h1>";
        echo "<p> You can <a href=\"login .php\"> Login now</a></p>";
        echo "</div>";*/
		echo "<img src=\"images/$target_file\" style=\"float:left; width:20%; margin-right: 5em;\">";
    }
    $conn -> close();
}
else {
    die("Input error");
}
?>
