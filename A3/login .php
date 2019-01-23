<?php

session_start();
include_once('required/config.php');

if (isset($_SESSION['valid_user'])) {
    header("Location: profile.php");
}

//make the database connection
$conn  = db_connect();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $email = $conn -> real_escape_string($_POST['email']);
    $password = $conn -> real_escape_string($_POST['password']);

    //make a query to check if user login successfully
    $sql = "select * from applications where email='$email' and password='$password'";
    $result = $conn -> query($sql);
    $numOfRows = mysqli_num_rows($result);
    $row = $result -> fetch_assoc();
    if ($numOfRows == 1) {
        $_SESSION['valid_user'] = $email;
        //get the first word of the name and uppercase the first letter
        $tempStr = trim($row["fname"]);
        $tempArr = explode(' ',$tempStr);
        $_SESSION['fname'] = ucwords($tempArr[0]);
        //header("location: member_only.php");
		header("Location: profile.php");
    }else {
        $error = 'Your Email or Password is invalid';
    }
}
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
    <title>Login page</title>
	<style>
		.row {
			margin: 3em 1em;
		}
		.col label {
			
			width: 18%;
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
    	<form action="login .php" method="post">
        <div class="bg-info mt-4 px-3 member_frm" style="border-radius: 5px; border: #000000 solid thick">
        	<h1>Sign in</h1>
            <p>Please enter your email and password</p>
            <div class="row">
            	<div class="col">
                	<label for="email">Email:</label>
                	<input type="email" id="email" name="email" size="30" maxlength="50" placeholder="your email" required />
                </div>
            </div>
            <div class="row">
            	<div class="col">
                	<label for="password">Password:</label>
                    <input type="password" id="password" name="password"
                           size="20" maxlength="20" required />
                </div>
           	</div>
			<div class="row">
            	<div class="col">
                	<label>&nbsp;</label>
                    <input type="submit" id="submit" value="Submit" />
                    <input type="reset" id="reset" value="Clear" />
                    <?php
                    if(isset($error)) {
                        echo "<p style=\"color: red;\">$error</p>";
                        unset($error);
                    }
                    ?>
                </div>
            </div>            
        </div>
        </form>
    </div>
</body>
</html>
</html>