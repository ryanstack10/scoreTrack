<?php
   include("config.php");
   session_start();
   
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
	  $lname = mysqli_real_escape_string($db,$_POST['lname']);
	  $fname = mysqli_real_escape_string($db,$_POST['fname']);
	  $team = mysqli_real_escape_string($db,$_POST['team']);
	  
	  $sql = "SELECT * FROM user WHERE username='$username';";
	  $result = mysqli_query($db,$sql);
	  
	  if(mysqli_num_rows($result) > 0){
		  $_SESSION['registration'] = "failed";
		  header("location: index.php");
	  	
	  } else {
      
      $sql = "INSERT INTO user (fname, lname, username, team_id) VALUES ('$fname', '$lname', '$username', (SELECT team_id FROM team WHERE teamname = '$team';))";
      $result = mysqli_query($db,$sql);
      
		  $sql = "SELECT SUBSTRING(SHA2(RAND(), 512), -32) AS salt;";
		  $result = mysqli_query($db,$sql);
		  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		  
		  $salt = $row['salt'];
		  
		  $sql = "INSERT INTO security (user_id, password, salt) VALUES ((SELECT user_id FROM user WHERE username='$username'), SHA2(CONCAT('$password', '$salt'), 512),'$salt}');";
		  $result = mysqli_query($db,$sql);
		  
		  if($result){
			  $sql = "DELETE FROM user WHERE username='$username';";
			  $result = mysqli_query($db,$sql);
			  $_SESSION['registration'] = "failed";
		 
	          header("location: index.php");
		  } else {
			  $_SESSION['registration'] = "successful";
		 
	          header("location: index.php");
		  }

  	}
   }
?>