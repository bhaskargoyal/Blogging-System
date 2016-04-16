<?php
	session_start();
	require_once('./connect.php');
	if(isset($_POST['submit'])){
		// check for username and password
		$username = $_POST['username'];
		$password = $_POST['password'];
		// check from db
		$query = 'SELECT username, password FROM login WHERE username LIKE \''.$username.'\' AND password LIKE \''.$password.'\';';
		$result = mysqli_query($con, $query);
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
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="area1">
            <div id="signup"><button type="button" class="btn btn-default btn-block"><a href="newuser.php">New User</a></button></div>
        </div>
    <div id="area2">
        <img src="images/message1.png" id="messageleft">
        <img src="images/message1.png" id="messageright">
    <div id="loginarea">
        <div class="container">
        <h2 id="heading">Registered user? Login!</h2>
    <form role="form" id="actualarea" method="post" action="index.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter email"required />
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" required/>
        </div>
        <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary" id="submitbutton" value="Sign In">Login</button>
  </form>
	<h2><?php 
		if(isset($_SESSION['wrong'])){
			echo '<br>'.'<h4>'.$_SESSION['wrong'].'</h4>';
			unset($_SESSION['wrong']);
		}
	?></h2>
	<br>
	
	</center>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>

<?php 
	}
?>
