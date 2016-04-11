<?php
	session_start();
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
				<center><br><br>
				<h2><?php 
					if(isset($_SESSION['username'])){
						echo 'Welcome '.$_SESSION['username'];

					}
				?></h2>
				<br><br>
				<a href="logout.php">Logout</a>
				</center>
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