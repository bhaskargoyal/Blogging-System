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
					<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:light" />
	<link rel = "stylesheet" href="css/style.css" type="text/css">
	<title>Blogging System | Edit Password</title>
</head>
<body>
	<div class="container">
		<div id="head-navbar">
			<div id="logo" class="menu inline">
				<h3 style="margin:0px;">Blogging System</h3>
			</div>
			<div class="menu inline pull-right">
				<a class="btn btn-info" href="home.php">Back</a>
			</div>
		</div>
    
	    <div class="row give-top-margin">
			<div class="col-sm-6 col-sm-offset-3">
						<form method="post" action="editpassword.php">
							<div class="form-group">
					        	<label for="username">Password</label>
					            <input type="password" name="opassword" class="form-control" placeholder="Enter Password" required />
					        </div>
					        <div class="form-group">
					        	<label for="username">New Password</label>
					            <input type="password" name="npassword" class="form-control" placeholder="Enter New Password" required />
					        </div>
							<div class="form-group">
					        	<label for="username">Confirm Password</label>
					            <input type="password" name="ncpassword" class="form-control" placeholder="Confirm Password" required />
					        </div>
					        <button type="submit" name="submit" class="btn btn-primary" value="reset">Reset Password</button>
							<?php
							if(isset($_SESSION['status'])){
									echo '<h4 class="center-text">'.$_SESSION['status'].'</h4>';
									unset($_SESSION['status']);
							}
						?>
						</form>
						<br>
						
		</div>
		</div>
	</div>
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