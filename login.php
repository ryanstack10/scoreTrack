<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT user_id FROM user WHERE username = '$myusername';";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  
	  $user_id = $row['user_id'];
	  
	  $sql = "SELECT * FROM security WHERE user_id = $user_id;";
	  $result = mysqli_query($db,$sql);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  
	  $password_hash = $row['password'];
	  $salt = $row['salt'];
	  
	  $sql = "SELECT SHA2(CONCAT('$mypassword', '$salt'), 512) AS pass";
	  $result = mysqli_query($db,$sql);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
      if($row['pass'] == $passwrod_hash) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         unset($_SESSION['login_error']);
		 $_SESSION['user_id'] = $user_id;
		 
         header("location: home.php");
		 
      }else {
         $_SESSION['login_error'] = "Your Login Name or Password is invalid";
		 header("location: index.php");
      }
   }
?>