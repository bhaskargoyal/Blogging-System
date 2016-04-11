<?php
	session_start();
	require_once('./connect.php');
	if(isset($_SESSION['login'])){
		if($_SESSION['login']){
			?>

			<!DOCtype html>
			<html>
			<head>
				<title>Blogging System | Home Page</title>
				<link rel = "stylesheet" href="css/style.css"/ type="text/css">
			</head>
			<body>
				<br><br>
				<h2><?php 
					if(isset($_SESSION['username'])){
						$query = "SELECT id, firstname, lastname, age, username FROM users WHERE username='".$_SESSION['username']."'";
						$result = mysqli_query($con, $query);
						$row = mysqli_fetch_assoc($result);
						$id = $row['id']; 
						$username = $row['username'];
						$age = $row['age'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						echo '<h2>'.'Welcome, '.$firstname.'</h2>';
						echo '<p>'.'Full Name - '.$firstname.' '.$lastname.'</p>';
						echo '<p>'.'Age - '.$age.'</p>';
						echo '<p>'.'Username - '.$username.'</p>';
						$query = "SELECT * FROM blogs WHERE user_id = ".$id.";";
						$result = mysqli_query($con, $query);
						if(mysqli_num_rows($result)  == 0){
							echo "<br>"."<h3>No Blogs Found</h3>";
						} else {
							echo "<br>";
							while($row = mysqli_fetch_assoc($result)){
								echo "<h2><a href=\"blog.php?blog=".$row['id']."\" target=\"_blank\">".$row['heading']."</a></h2>";
								echo "<h3>".$row['subheading']."</h3>";
								echo "<p class=\"truncate\">".$row['text']."</p>";
								$query = 'SELECT firstname, lastname, age, username FROM users WHERE id = '.$row['user_id'].';';
								$rre = mysqli_query($con, $query);
								if(mysqli_num_rows($rre) == 1){
									$rr = mysqli_fetch_assoc($rre);
									echo "<p>Written by <b>".$rr['firstname']." ".$rr['lastname']."</b>, Age ".$rr['age'].".</p>";
									echo "<p>".$row['time']."</p>";
									echo "<br>";
								} 
							}
						}
						


					} else {
						header("Location: logout.php");
						exit();
					}
				?></h2>
				<br><br>
				<a href="logout.php">Logout</a>
				<script type="text/javascript" src="js/script.js"></script>
			</body>
			</html>


			<?php
		}
	} else {
		$_SESSION['wrong'] = "You are logged out.";
		header("Location: index.php");
		exit();
	}

?>