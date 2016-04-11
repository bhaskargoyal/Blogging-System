<?php
	session_start();
	require_once('./connect.php');
	if(isset($_SESSION['login'])){
		if($_SESSION['login']){
			if(isset($_SESSION['username'])){

				if(isset($_POST['submit'])){
					$firstname = $_POST['firstname'];
					$lastname = $_POST['lastname'];
					$age = $_POST['age'];
					$query = "UPDATE users 
							SET firstname = '".$firstname."', lastname = '".$lastname."', age = '".$age."' 
							WHERE username= '".$_SESSION['username']."';";
					$result = mysqli_query($con, $query);
					if($result == True){
						$_SESSION['status'] = "Successfully Updated";
						header("Location: home.php");
						exit();
					} else {
						$_SESSION['status'] = "Unsuccessfull update";
						header("Location: home.php");
						exit();
					}

				} else {
					// create a form
					?>
					<!DOCtype html>
					<html>
					<head>
						<title>Blogging System | Edit Details</title>
						<link rel = "stylesheet" href="css/style.css"/ type="text/css">
					</head>
					<body>
						<br><br>
						<center>
						<form method="post" action="editdetails.php">
							First Name:
							<input type= "text" name="firstname" required/>
							<br><br>
							Last Name:
							<input type="text" name="lastname" required/>
							<br><br>
							Age:
							<input type="text" name="age" required/>
							<br><br>
							<input type="submit" name="submit" value="Update">
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