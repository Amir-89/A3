<?php
//must appear BEFORE the <html> tag
session_start();
include_once('required/config.php');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<p> Well done <!--<?php
		$conn  = db_connect();
		
		$fname = $_SESSION['fname'];
                echo "<p>Welcome <b>$fname</b></p>";
		?>-->
		!</p>
</body>
</html>