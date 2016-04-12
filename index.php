<?php
	session_start();
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
		<input type= "text" name="username" required />
		<br><br>
		Password:
		<input type="password" name="password" required/>
		<br><br>
		<input type="submit" name="submit" value="Sign In">
	</form>
	<br>
	<h2><?php 
		if(isset($_SESSION['wrong'])){
			echo '<br>'.'<h4>'.$_SESSION['wrong'].'</h4>';
			unset($_SESSION['wrong']);
		}
	?></h2>
	<br>
	<h4><a href="newuser.php">New User</a></h4>
	</center>
	<!-- all blogs on db  -->
	<?php
		$query = "SELECT * FROM blogs;";
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result)  == 0){
			echo "<br>"."<h3>No Blogs Found</h3>";
		} else {
			while($row = mysqli_fetch_assoc($result)){
				echo "<h2><a href=\"blog.php?blog=".$row['id']."\" target=\"_blank\">".$row['heading']."</a></h2>";
				echo "<h3>".$row['subheading']."</h3>";
				echo "<p class=\"truncate\">".$row['text']."</p>";
				$query = 'SELECT firstname, lastname, age, username FROM users WHERE id = '.$row['user_id'].';';
				$rre = mysqli_query($con, $query);
				if(mysqli_num_rows($rre) == 1){
					$rr = mysqli_fetch_assoc($rre);
					echo "<p>Written by <b>".$rr['firstname']." ".$rr['lastname']."</b>, Age ".$rr['age'].".</p>";
					echo "<p>".$row['time']."</p>";
					echo "<br>";
				} 
			}
		}
		


	?>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>

<?php 
	}
?>
