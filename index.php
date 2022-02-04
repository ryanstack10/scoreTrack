<?php
include("config.php");
session_start();

if(isset($_SESSION['user_id'])){
	header("location: home.php");
}
?>

<!DOCTYPE html>
<html>
<title>Score Track</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h5 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('/images/CWRURaqLogoGrey.png');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>
<body>

<div class="bgimg w3-display-container w3-text-white">
  <div class="w3-display-middle w3-jumbo">
  </div>
  <div class="w3-display-topleft w3-container w3-xlarge">
    <p><button onclick="document.getElementById('login').style.display='block'" class="w3-button w3-black">Login</button></p>
	<p><button onclick="document.getElementById('register').style.display='block'" class="w3-button w3-black">Register</button></p>
</div>

<!-- Login Modal -->
<div id="login" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black">
      <span onclick="document.getElementById('login').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Login</h1>
    </div>
    <div class="w3-container">
      <p style="color:black">Login to access scoreTrack</p>
      <form action="/login.php" method="POST">
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Username" required name="username"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Password" required name="password"></p>
        <p><button class="w3-button w3-black" type="submit">LOGIN</button></p>
		<?php
		if (isset($_SESSION['login_error'])){
			echo "<p style='color:red;'>".$_SESSION['login_error']."</p>";
			unset($_SESSION['login_error']);
		}
		?>
      </form>
    </div>
  </div>
</div>

<!-- Register Modal -->
<div id="register" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black">
      <span onclick="document.getElementById('register').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Register</h1>
    </div>
    <div class="w3-container">
      <p style="color:black">Register to access scoreTrack</p>
      <form action="/register.php" method="POST">
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Username" required name="username"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Password" required name="password"></p>
		<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="First Name" required name="fname"></p>
		<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Last Name" required name="lname"></p>
		<p><select id="team" name="team">
  		  	<option value="Case Western Reserve University">Case Western Reserve University</option>
  		  	<option value="Saline">Saline</option>
			</select></p>
        <p><button class="w3-button w3-black" type="submit">REGISTER</button></p>
      </form>
    </div>
  </div>
</div>
<?php

if (isset($_SESSION['registration']) && $_SESSION['registration'] == "failed"){
	echo "<script>alert('Registration has failed please try agian');</script>";
	unset($_SESSION['registration']);
} else if (isset($_SESSION['registration']) && $_SESSION['registration'] == "successful"){
	echo "<script>alert('Account creation successful login to access');</script>";
	unset($_SESSION['registration']);
}
?>

</body>
</html>


