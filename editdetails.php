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
						$_SESSION['status'] = "Unsuccessfull Update";
						header("Location: home.php");
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
	<title>Blogging System | Edit Details</title>
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
							<form method="post" action="editdetails.php">
								<div class="form-group">
						        	<label for="username">First Name</label>
						            <input type="text" name="firstname" class="form-control" placeholder="Enter First Name"required />
						        </div>
						        <div class="form-group">
						        	<label for="username">Last Name</label>
						            <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name"required />
						        </div>
								<div class="form-group">
						        	<label for="username">Age</label>
						            <input type="text" name="age" class="form-control" placeholder="Enter age"required />
						        </div>
						        <button type="submit" name="submit" class="btn btn-primary" value="update">Update Details</button>
							</form>
							
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