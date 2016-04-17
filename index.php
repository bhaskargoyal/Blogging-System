<?php
	session_start();
	if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
		header("Location: home.php");
		exit();
	}
	require_once('./connect.php');
	if(isset($_POST['submit'])){
		// check for username and password
		$username = strtolower($_POST['username']);
		$password = $_POST['password'];
		// check from db
		$query = 'SELECT username, password FROM login WHERE username LIKE \''.$username.'\' AND password LIKE \''.$password.'\';';
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			if($username == strtolower($row['username']) && $password == $row['password']){
				mysqli_close();
				$_SESSION['wrong'] = "";
				$_SESSION['login'] = 1;
				$_SESSION['username'] = $username;
				header("Location: home.php");
				exit();
			} else {
				
			}
		} else {
			mysqli_close();
			$_SESSION['wrong'] = "Wrong Username and Password";
			header("Location: index.php");
			exit();
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
	<title>Blogging System | Index Page</title>
</head>
<body>
	<div class="container-fluid">
		<div id="head-navbar">
			<div id="logo" class="menu inline">
				<h3 style="margin:0px;">Blogging System</h3>
			</div>
			<div class="menu inline pull-right">
				<a class="btn btn-info" href="newuser.php">New User</a>
			</div>
		</div>
	    <div id="wrapper">
	    	<h1 id="slogan" class="center-text">A publishing platform for professional bloggers</h1>
			<h3 class="center-text"> Already user</h3>
			<form role="form" method="post" action="index.php">
				<div id="login" class="row">
					<div class="col-sm-2 col-sm-offset-3">
						<div class="form-group">
							<input type="text" name="username" class="form-control" id="username" placeholder="Username"required />
						</div>

					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<input type="password" name="password" class="form-control" id="pwd" placeholder="Password" required/>
						</div>
					</div>
					<div class="col-sm-2">
					<button type="submit" name="submit" class="btn btn-warning btn-block" id="submitbutton" value="Sign In">Login</button>
					</div>
				</div>
			</form>
			<script>
					var wrapper = document.getElementById('wrapper');
					var wrapper_height = window.innerHeight - document.getElementById('head-navbar').offsetHeight;
					wrapper.style.height = wrapper_height + "px";
					var slogan = document.getElementById('slogan');
					slogan.style.paddingTop = wrapper_height*0.25+ "px";
			</script>
			<div class="center-text">

		    <?php 
				if(isset($_SESSION['wrong'])){
					echo '<h4>'.$_SESSION['wrong'].'</h4>';
					unset($_SESSION['wrong']);
				}
			?>
			</div>
			<div  style="position:absolute; bottom:0px; width: 98%;">
				<img id="scroll-image" class="img-responsive center-block" src="images/scroll-down-arrow-small.png" height="20" width="20">
				<!-- <img id="scroll-image-2" class="img-responsive center-block" src="images/scroll-down-arrow-small.png" height="20" width="20"> -->
				<br>
				<p class ="center-text">Scroll down, to read popular blogs</p>
			</div>
			
		</div>
		<section>
		<h1 class="center-text">Popular Blogs</h1>
		<br>
		<?php
			$query = "SELECT * FROM blogs;";
			$result = mysqli_query($con, $query);
			if(mysqli_num_rows($result)  == 0){
				echo "<br>"."<h3>No Blogs Found</h3>";
			} else {
				$count =0;
				while($row = mysqli_fetch_assoc($result)){
					$count = $count +1;
					if($count %2 == 1) {
						echo "<div class='row'>";
					}
					echo "<div class='col-sm-6'>";
					echo "<div class=\"panel panel-info\">";
					echo "<div class='panel-heading'><span id='blog-heading'>".$row['heading']."</span></div>";
					echo "<div class='panel-body'><h4>".$row['subheading']."</h4>";
					echo "<p class=\"truncate panel-body\">".$row['text']."</p>";
					$query = 'SELECT firstname, lastname, age, username FROM users WHERE id = '.$row['user_id'].';';
					$rre = mysqli_query($con, $query);
					if(mysqli_num_rows($rre) == 1){
						$rr = mysqli_fetch_assoc($rre);
						echo "<p>Written by <b>".$rr['firstname']." ".$rr['lastname']."</b>, Age ".$rr['age'].".</p>";
						echo "<p>".$row['time']."</p>";
						echo "<br>";
					} 
					echo "<a class='btn btn-success' href=\"blog.php?blog=".$row['id']."\">Read More</a>";
					echo "</div></div></div>";
					if($count %2 == 0) {
						echo "</div>";
					}
				}
			}
			
		?>
		</section>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>

<?php 
	}
?>

