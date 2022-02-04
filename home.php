<?php
	include("config.php");
	session_start();

	if(!isset($_SESSION['user_id'])){
		header("location: index.php");
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>scoreTrack</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<div class="section">
			<div class="logo">
				<a href="index.html">ScoreTrack</a>
			</div>
			<ul>
				<li class="selected">
					<a href="index.html">home</a>
				</li>
				<li>
					<a href="about.html">about</a>
				</li>
				<li>
					<a href="hairstyle.html">hairstyles</a>
				</li>
				<li>
					<a href="news.html">news</a>
				</li>
				<li>
					<a href="contact.html">contact</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="body">
		
	</div>
	<div id="footer">
		<div>
			<div class="connect">
				<a href="http://freewebsitetemplates.com/go/twitter/" id="twitter">twitter</a>
				<a href="http://freewebsitetemplates.com/go/facebook/" id="facebook">facebook</a>
				<a href="http://freewebsitetemplates.com/go/googleplus/" id="googleplus">googleplus</a>
				<a href="http://pinterest.com/fwtemplates/" id="pinterest">pinterest</a>
			</div>
			<p>
				&copy; copyright 2023 | all rights reserved.
			</p>
		</div>
	</div>
</body>
</html>