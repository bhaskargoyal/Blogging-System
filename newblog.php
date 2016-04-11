<?php
	session_start();
	require_once('./connect.php');
	if(isset($_SESSION['login'])){
		if($_SESSION['login']){
			if(isset($_SESSION['username'])){
				if(isset($_POST['submit'])){
					$heading = $_POST['heading'];
					$subheading = $_POST['subheading'];
					$text = $_POST['text'];
					$query = "SELECT id FROM users WHERE username = '".$_SESSION['username']."';";
					$result1 = mysqli_query($con, $query);
					$row = mysqli_fetch_assoc($result1);
					$userid = $row['id'];
					$query = "INSERT INTO blogs (heading, subheading, text, user_id) 
							VALUES ('".$heading."', '".$subheading."', '".$text."', ".$userid.");";
					$result2 = mysqli_query($con, $query);

					if($result2 == True){
						$_SESSION['status'] = "New Blog Created";
						header("Location: home.php");
						exit();
					} else {
						$_SESSION['status'] = "Internal Error3";
						header("Location: home.php");
						exit();
					}
				} else {
					// create a form
					?>
					<!DOCtype html>
					<html>
					<head>
						<title>Blogging System | New Blog</title>
						<link rel = "stylesheet" href="css/style.css"/ type="text/css">
					</head>
					<body>
						<br><br>
						<center>
						<form method="post" action="newblog.php">
							Title:
							<input type= "text" name="heading" required/>
							<br><br>
							Sub Heading:
							<input type="text" name="subheading" required/>
							<br><br>
							Text:
							<br>
							<textarea cols="120" rows="20" name="text" required/>
							</textarea>
							<br>
							<input type="submit" name="submit" value="Submit">
						</form>
						<br>
						</center>
						<script type="text/javascript" src="js/script.js"></script>
					</body>
					</html>
					<?php
				}
			} else {
				header("Location: logout.php");
				exit();
			}
		}
	} else {
		$_SESSION['wrong'] = "You are logged out.";
		header("Location: index.php");
		exit();
	}

?>