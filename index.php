<?php
	session_start();
	// require_once('');
	if(isset($_SESSION['login']) && $_SESSION['login']){
		header("Location: home.php");
		exit();
	}
	if(isset($_POST['submit'])){
		// check for username and password
		$username = $_POST['username'];
		$password = $_POST['password'];
		// check from db
		$con = mysqli_connect("localhost", "root", "", "blog");
		if (!$con)
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		} else {
			// echo "hello2";
		}
		$query = 'SELECT username, password FROM login WHERE username LIKE \''.$username.'\' AND password LIKE \''.$password.'\';';
		echo $query;
		$result = mysqli_query($con, $query);
		// echo "hello4";
		// $result.toString();
		// exit();
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			if($username == $row['username'] && $password == $row['password']){
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
<!DOCtype html>
<html>
<head>
	<title>Blogging System | Index Page</title>
	<link rel = "stylesheet" href="css/style.css"/ type="text/css">
</head>
<body>
	<form method="post" action="index.php">
		<br><br><br><center>
		Username:
		<input type= "text" name="username"/>
		<br><br>
		Password:
		<input type="password" name="password"/>
		<br><br>
		<input type="submit" name="submit" value="Sign In">
	</form>
	<br><br>
	<h2><?php 
		if(isset($_SESSION['wrong'])){
			echo $_SESSION['wrong'];
			unset($_SESSION['wrong']);
		}
	?></h2>
	</center>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>

<?php 
	}
?>
