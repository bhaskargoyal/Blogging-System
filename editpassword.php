<?php
	session_start();
	require_once('./connect.php');
	if(isset($_SESSION['login'])){
		if($_SESSION['login']){
			if(isset($_SESSION['username'])){
				if(isset($_POST['submit'])){
					$opassword = $_POST['opassword'];
					$npassword = $_POST['npassword'];
					$ncpassword = $_POST['ncpassword'];
					$query = "SELECT password FROM login WHERE username = '".$_SESSION['username']."';";
					$result = mysqli_query($con, $query);
					if(mysqli_num_rows($result) == 0){
						$_SESSION['status'] = "Internal Error1";
						header("Location: editpassword.php");
						exit();
					}
					$row = mysqli_fetch_assoc($result);
					echo $row['password']." ".$opassword." ".$npassword." ".$ncpassword;
					if($row['password'] == $opassword){
						// check for both passwordss to be same
						if($ncpassword == $npassword){
							$query = "UPDATE login
								SET password = '".$npassword."'
								WHERE username= '".$_SESSION['username']."';";
							$result = mysqli_query($con, $query);
							if($result == True){
								$_SESSION['status'] = "Password Changed Successfullly";
								header("Location: home.php");
								exit();
							} else {
								$_SESSION['status'] = "Internal Error2";
								header("Location: editpassword.php");
								exit();
							}
						} else {
							$_SESSION['status'] = "New Password Don't Match";
							header("Location: editpassword.php");
							exit();
						}
					} else {
						$_SESSION['status'] = "Wrong Password Entered";
						header("Location: editpassword.php");
						exit();
					}
				} else {
					// create a form
					?>
					<!DOCtype html>
					<html>
					<head>
						<title>Blogging System | Home Page</title>
						<link rel = "stylesheet" href="css/style.css"/ type="text/css">
					</head>
					<body>
						<br><br>
						<center>
						<form method="post" action="editpassword.php">
							Password:
							<input type= "password" name="opassword" required/>
							<br><br>
							New Password:
							<input type="password" name="npassword" required/>
							<br><br>
							Confirm Pssword:
							<input type="password" name="ncpassword" required/>
							<br><br>
							<input type="submit" name="submit" value="reset">
						</form>
						<br>
						<?php
							if(isset($_SESSION['status'])){
									echo '<br>'.'<h4>'.$_SESSION['status'].'</h4>';
									unset($_SESSION['status']);
							}
						?>
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