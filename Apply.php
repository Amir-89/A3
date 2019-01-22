<?php

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
    <title>Application form</title>
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
    	<form action="apply_process.php" method="post">
        <div class="bg-info mt-4 px-3 member_frm" style="border-radius: 5px; border: #000000 solid thick">
        	<h1 style="margin-bottom: 2em; text-align: center;">Application Form</h1>
            <h2>Please fill up the blanks and submit your application</h2>
            <p><i> (*) Mandetory fields</i></p>
			<div class="row">
            	<div class="col">
                	<label for="fname">*First Name:</label>
                    <input type="text" id="fname" name="fname" size="30" maxlength="50" required />
                </div>
            </div>
			<div class="row">
            	<div class="col">
                	<label for="lname" >Last Name:</label>
                    <input type="text" id="lname" name="lname" size="30" maxlength="50"/>
                </div>
            </div>
			
			<div class="row">
            	<div class="col">
                	<label for="age">*Age:</label>
					<input type="number" id="age" name="age" size="20" maxlength="20" onChange="checkAge(document)" required/>
					<span id="age_msg" class="error_msg"></span>
                </div>
            </div>
			
			<div class="row">
            	<div class="col">
                	<label for="country">Country of Origin:</label>
					<input type="text" id="country" name="country" size="20" maxlength="20"/>
                </div>
            </div>
			
			<div class="row">
            	<div class="col">
                	<label for="university">Previous University:</label>
                    <input type="text" id="university" name="university" size="30" maxlength="50"/>
                </div>
            </div>
			
			
			<div class="row">
            	<div class="col">
                	<label for="gpa">GPA:</label>
                    <input type="text" id="gpa" placeholder="between 0 & 7" name="gpa" size="15"  maxlength="10" onChange="checkGPA(document)" />
					<span id="gpa_msg" class="error_msg"></span>
                </div>
            </div>
			
            <div class="row">
            	<div class="col">
                	<label for="email">* Valid Email:</label>
                	<input type="email" id="email" name="email" placeholder="Email" size="30" maxlength="50" required />
                </div>
            </div>
            <div class="row">
            	<div class="col">
                	<label for="password">* Password:</label>
                    <input type="password" id="password" name="password" placeholder="at least 6 characters" size="20" maxlength="20" onChange="passwordCheck(document)" required />
                    <span id="pwd_msg" class="error_msg"></span>
					<span id="password_check" class="error_msg"></span>
                </div>
            </div>
            <div class="row">
            	<div class="col">
                	<label for="rePassword">* Retry Password:</label>
                    <input type="password" id="rePassword" size="20" maxlength="20"
                               onChange="checkRePassword(document)" />
                </div>
            </div>
            <!--<div class="row">
            	<div class="col">
                	<label for="zip">* Postcode:</label>
                    <input type="text" id="zip" name="zip" size="10" maxlength="10" placeholder="4 digits"
                               onChange="checkZIPCode(document)" required />
                    <span class="error_msg" id="zip_msg"></span>
                </div>
            </div>-->
            <div class="row">
            	<div class="col">
                	<label>&nbsp;</label>
                    <input type="submit" id="submit" name="submit" value="Submit" onClick="return validateInfo(document)" />
                    <input type="reset" id="reset" value="Clear Form" onClick="reset_frm(document)" />
                </div>
            </div>

        
        </div>
        </form>
    </div>
</body>
</html>