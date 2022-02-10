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
				<a href="index.php">ScoreTrack</a>
			</div>
			<ul>
				<li class="selected">
					<a href="index.php">leaderboard</a>
				</li>
				<li>
					<a href="report.php">report</a>
				</li>
				<li>
					<a href="tournament.php">tournament</a>
				</li>
				<li>
					<a href="contact.php">contact</a>
				</li>
				<li>
					<a href="profile.php">profile</a>
				</li>
				<li>
					<a href="logout.php">logout</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="body">
		<table class="styled-table">
		    <thead>
		        <tr>
					<th>Rank</th>
		            <th>Name</th>
		            <th>Record</th>
					<th>Recent Game</th>
		        </tr>
		    </thead>
		    <tbody>
				<?php
				$sql = "SELECT user_id, fname, lname FROM user;";
		        $result = mysqli_query($db,$sql);
				$game_history = array();
				
				$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
				foreach($users as $row) 
				{
		        	$user_id = $row['user_id'];
					$name = $row['fname']. ' '. $row['lname'];
					
					$sql = "SELECT  COUNT(*) AS wins FROM game WHERE winner1=$user_id OR winner2=$user_id;";
					$win_results = mysqli_query($db,$sql);
					$wins = mysqli_fetch_assoc($win_results)['wins'];
					
					$sql = "SELECT  COUNT(*) AS losses FROM game WHERE loser1=$user_id OR loser2=$user_id;";
					$loss_results = mysqli_query($db,$sql);
					$losses = mysqli_fetch_assoc($loss_results)['losses'];
					
					$sql = "SELECT game_id FROM game WHERE winner1=$user_id OR winner2=$user_id OR loser1=$user_id OR loser2=$user_id ORDER BY game_date DESC limit 1;";
					$recent_results = mysqli_query($db,$sql);
					$recent_game_id = mysqli_fetch_assoc($recent_results)['game_id'];
					
					array_push($game_history, [($wins/$losses == 0 ? 1 : $losses), $wins, $losses, $recent_game_id, $user_id, $name]);
				}
				
				usort($game_history, function($a, $b){
					$ret = $a[0] - $b[0];
					echo "<div>". $a[5]. " ". $a[0]. " ". $b[5]. " ". $b[0]. "</div>";
					if($ret == 0){
						$ret = a[1] - b[1];
						if($ret == 0){
							$ret = b[2] - a[2];
						}
					}
					return $ret;
				});
				
				
				$count = 0;
				foreach($game_history as $val){
					if($val[4] == $_SESSION['user_id']){
						echo "<tr class='active-row'>";
					}else{
						echo "<tr>";
					}
					echo "<td>$count</td>";
					echo "<td>$val[5]</td>";
					echo "<td>$val[1]-$val[2]</td>";
					echo "<td>$val[3]</td>";
					echo "</tr>";
					$count = $count + 1;
				}
				?>
		    </tbody>
		</table>
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