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

<!DOCtype html>
<html>
<head>
	<title>Blogging System | New User</title>
	<link rel = "stylesheet" href="css/style.css"/ type="text/css">
</head>
<body>
	<form method="post" action="newuser.php">
		<br><br><br><center>
		Username:
		<input type="text" name="username" required/>
		<br><br>
		Password:
		<input type="password" name="password" required/>
		<br><br>
		Confirm Password:
		<input type="password" name="cpassword" required/>
		<br><br>
		First Name:
		<input type= "text" name="firstname" required/>
		<br><br>
		Last Name:
		<input type="text" name="lastname" required/>
		<br><br>
		Age:
		<input type="text" name="age" required/>
		<br><br>
		<input type="submit" name="submit" value="Sign In">
	</form>
	<br>
	<h2><?php 
		if(isset($_SESSION['status'])){
			echo '<br>'.'<h4>'.$_SESSION['status'].'</h4>';
			unset($_SESSION['status']);
		}
	?></h2>
	<br>
	</center>
	<!-- all blogs on db  -->
	<!-- <?php
		$query = "SELECT * FROM blogs;";
		$result = mysqli_query($con, $query);
		if($result == null){
			echo "<h3>No Blogs Found</h3>";
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
		


	?> -->
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>

<?php
	}
?>
