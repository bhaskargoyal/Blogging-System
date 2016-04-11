<?php
	session_start();
	require_once('./connect.php');
	if(isset($_SESSION['login'])){
		if($_SESSION['login']){
			if(isset($_SESSION['username'])){

				if(isset($_POST['submit'])){
					$select = $_POST['select'];
					if($select == "no"){
						header("Location: home.php");
						exit();
					}
					$query = "SELECT id FROM users WHERE username = '".$_SESSION['username']."';";
					$result1 = mysqli_query($con, $query);
					$row = mysqli_fetch_assoc($result1);
					$userid = $row['id'];
					$query = "DELETE FROM blogs WHERE id ='".$_SESSION['blogid']."' AND user_id = ".$userid.";";
					$result = mysqli_query($con, $query);
					if($result == True){
						$_SESSION['status'] = "Successfully Deleted";
						header("Location: home.php");
						exit();
					} else {
						$_SESSION['status'] = "Unsuccessfull Delete";
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
						<?php
							if(!isset($_GET['blog'])){
								header("Location: home.php");
								exit();
							}
							$_SESSION['blogid'] = $_GET['blog'];
							$query = "SELECT * FROM blogs WHERE id = ".$_SESSION['blogid'].";";
							$result = mysqli_query($con, $query);
							$row = mysqli_fetch_assoc($result);
						?>
						<form method="post" action="deleteblog.php">
							Select: 
							<select name="select">
								<option value="yes">Yes</option>
								<option value="no">No</option>
							</select>
							<br>
							<input type="submit" name="submit" value="Submit">
						</form>
						<br><br>
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