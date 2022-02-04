<?php
	include("config.php");
	session_start();

	if(!isset($_SESSION['user_id'])){
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
		<p>home page</p>
	</body>
</html>