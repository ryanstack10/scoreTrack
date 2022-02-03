<?php
include("config.php");
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
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
</div>

<!-- Login Modal -->
<div id="login" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black">
      <span onclick="document.getElementById('login').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Login</h1>
    </div>
    <div class="w3-container">
      <p>Login to access scoreTrack</p>
      <form action="/login.php" method="POST">
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="username" required name="username"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="password" required name="password"></p>
        <p><button class="w3-button w3-black" type="submit">LOGIN</button></p>
		<?php
		if (isset($_SESSION['login_error'])){
			echo "<p style='color:red;'>".$_SESSION['login_error']."</p>";
		}
		?>
      </form>
    </div>
  </div>
</div>

</body>
</html>


