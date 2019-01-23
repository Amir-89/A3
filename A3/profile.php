<?php
//must appear BEFORE the <html> tag
session_start();
include_once('required/config.php');
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="JS/nav.js"></script>
    <script src="JS/read_more.js"></script>
    <script src="JS/member.js"></script>
    <link rel="stylesheet" href="Apply.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Profile page</title>
	<style>
		.row {
			margin: 3em 1em;
		}
		.col label {
			
			width: 18%;
		}
		h1{
			margin-bottom: 1em;
		}
		
		/* For extra small: */
    	body {font-size: 10px; line-height: 1.8em;}
		h1 { font-size: 28px;}
		h2 { font-size: 20px;}
		
		/* For small: */
		@media only screen and (min-width: 576px){ 
  			body { font-size: 14px;}
			h1 { font-size: 32px;}
			h2 { font-size: 24px;}
		
		/* For medium: */
		@media only screen and (min-width: 968px){
  			body { font-size: 16px;} 
			h1 { font-size: 60px;}
			h2 { font-size: 32px;}
		
		
		
	</style>
</head>

<body onLoad="run_first()">

    <div class="container">
		<div class="bg-info mt-4 px-3 member_frm" style="border-radius: 5px; border: #000000 solid thick">
        <h1>Profile Page</h1>
        <?php
        // check session variable
        if (isset($_SESSION['valid_user']))
        {
            //make the database connection
            $conn  = db_connect();
            $user_check = $_SESSION['valid_user'];

            //make a query to check if a valid user
            $ses_sql = "select fname, lname, age, country, university, gpa from applications where email='$user_check'";
            $result1 = $conn -> query($ses_sql);
			$row = mysqli_fetch_assoc($result1);
            if ($result1= 1) {
                
                //$name = $row['name'];
                //echo "<p>Welcome <b>$name!</b></p>";
                $fname = $_SESSION['fname'];
				$image="male.jpg";
				//$lname= $_SESSION['lname'];
				echo "<img src=\"images/$image\" style=\"float:left; width:20%; margin-right: 5em;\">";
                echo "Welcome<br>";
				echo "Name: ".$row['fname'];
				echo "<br>Last Name: ".$row['lname'];
				echo "<br>Age: ".$row['age'];
				echo "<br>Country of Origin: ".$row['country'];
				echo "<br>Previous University: ".$row['university'];
				echo "<br> Overall GPA: ".$row['gpa'];
				echo "<br><br> <form action=\"image_upload_process.php\" method=\"post\" enctype=\"multipart/form-data\"> Select image to upload: 
  									<input type=\"file\" name=\"filetoupload\" id=\"filetoupload\" accept=\"image\">
  									<input type=\"submit\" value=\"Upload Image\" name=\"submit\">
								</form>";
				
                echo "<br><br><p><a href=\"log_out.php\">Sign out</a></p>";
            }
            else {
                echo "<p>Something is wrong.</p>";
                echo "<p><a href=\"login .php\" id=\"4\" 
				onClick=\"nav_item_selected(4)\">Login</a></p>";
            }
        }
        else
        {
            echo "<p>You are not logged in.</p>";
            echo "<p><a href=\"login .php\" id=\"4\" 
			onClick=\"nav_item_selected(4)\">Login</a></p>";
        }
        ?>
		</div>
    </div>
</body>
</html>