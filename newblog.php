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
					<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:light" />
	<link rel = "stylesheet" href="css/style.css" type="text/css">
	<title>Blogging System | New Blog</title>
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
			<div class="col-sm-8 col-sm-offset-2">
						<form method="post" action="newblog.php">
							<div class="form-group">
					        	<label for="select">Title</label>
					            <input type="text" name="heading" class="form-control" placeholder="Enter Title" required />
					        </div>
					        <div class="form-group">
					        	<label for="select">Sub Heading</label>
					            <input type="text" name="subheading" class="form-control" placeholder="Enter Sub Heading" required />
					        </div>
					        <div class="form-group">
							  <label for="comment">Text</label>
							  <textarea class="form-control" rows="10" name="text"></textarea>
							</div>
							<button type="submit" name="submit" class="btn btn-primary" value="submit">Create Blog</button>
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