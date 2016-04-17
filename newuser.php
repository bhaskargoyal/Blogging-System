<?php
	session_start();
	require_once('./connect.php');
		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$age = $_POST['age'];
			
			if($password != $cpassword){
				$_SESSION['status'] = "Passwords Don't Match";
				header("Location: newuser.php");
				exit();
			}
			$query = "SELECT username  FROM users WHERE username='".$username."'";
			$result = mysqli_query($con, $query);
			if(mysqli_num_rows($result) > 0){
				$_SESSION['status'] = "Username Already Exists";
				header("Location: newuser.php");
				exit();
			} else {
				// create a new user
				$query = "INSERT INTO users (firstname, lastname, age, username) 
							VALUES ('".$firstname."', '".$lastname."', ".$age.", '".$username."');";
				$result1 = mysqli_query($con, $query);
				$query = "INSERT INTO login (username, password) 
							VALUES ('".$username."', '".$password."');";
				$result2 = mysqli_query($con, $query);
				if($result1 == True && $result2 == True){
					$_SESSION['wrong'] = "New User Created";
					header("Location: index.php");
					exit();
				} else {
					$_SESSION['status'] = "Something Went Wrong";
					header("Location: newuser.php");
					exit();
				}
			}
		} else {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:light" />
	<link rel = "stylesheet" href="css/style.css" type="text/css">
	<title>Blogging System | New User</title>
</head>
<body>
	<div class="container">
		<div id="head-navbar">
			<div id="logo" class="menu inline">
				<h3 style="margin:0px;">Blogging System</h3>
			</div>
			<div class="menu inline pull-right">
				<a class="btn btn-info" href="index.php">Back</a>
			</div>
		</div>
    
    <div class="row give-top-margin">
	    <div class="col-sm-6 col-sm-offset-3">
	        <form method="post" action="newuser.php">
	        <div class="form-group">
	        <label for="username">First Name</label>
	            <input type="text" name="firstname" class="form-control" placeholder="Enter First Name"required />
	        </div>
	        <div class="form-group">
	        <label for="username">Last Name</label>
	            <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name"required />
	        </div>
	        <div class="form-group">
	            <label for="username">Username </label>
	            <input type="text" name="username" class="form-control" placeholder="Enter username"required />
	        </div>
	        <div class="form-group">
	            <label for="pwd">Password</label>
	            <input type="password" name="password" class="form-control" placeholder="Enter password" required/>
	        </div>
	        <div class="form-group">
	            <label for="pwd">Confirm Password</label>
	            <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required/>
	        </div>
	        
	        <div class="form-group">
	        <label for="username">Age</label>
	            <input type="text" name="age" class="form-control" placeholder="Enter age"required />
	        </div>
	        <button type="submit" name="submit" class="btn btn-primary" value="create">Create User</button>
		   </form>
			<?php 
				if(isset($_SESSION['status'])){
					echo '<h4>'.$_SESSION['status'].'</h4>';
					unset($_SESSION['status']);
				}
			?>
		</div>
	</div>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>

<?php
	}
?>
