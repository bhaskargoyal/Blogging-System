<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/opensanslight.css" />
	<link rel = "stylesheet" href="css/style.css" type="text/css">
	<title>Blogging System | Blog Page</title>
</head>
<body>
	<div class="container">
<?php
	session_start();
	require_once('./connect.php');
	if(isset($_GET['blog'])){
		$id = $_GET['blog'];
		$query = "SELECT * FROM blogs WHERE id = ".$id.";";
		$result = mysqli_query($con, $query);
		if($result == null){
			echo "<h3>No Blogs Found</h3>";
		} else {
			 $row = mysqli_fetch_assoc($result);
			// echo "<h2>".$row['heading']."</h2>";
			// echo "<h3>".$row['subheading']."</h3>";
			// echo "<p>".$row['text']."</p>";
			// $query = 'SELECT firstname, lastname, age, username FROM users WHERE id = '.$row['user_id'].';';
			// $rre = mysqli_query($con, $query);
			// if(mysqli_num_rows($rre) == 1){
			// 	$rr = mysqli_fetch_assoc($rre);
			// 	echo "<p>Written by <b>".$rr['firstname']." ".$rr['lastname']."</b>, Age ".$rr['age'].".</p>";
			// 	echo "<p>".$row['time']."</p>";
			// } 
			echo "<div class=\"panel panel-info\">";
			echo "<div class='panel-heading'><span id='blog-heading'>".$row['heading']."</span></div>";
			echo "<div class='panel-body'><h4>".$row['subheading']."</h4>";
			echo "<p class=\"panel-body\">".$row['text']."</p>";
			$query = 'SELECT firstname, lastname, age, username FROM users WHERE id = '.$row['user_id'].';';
			$rre = mysqli_query($con, $query);
			if(mysqli_num_rows($rre) == 1){
				$rr = mysqli_fetch_assoc($rre);
				echo "<p>Written by <b>".$rr['firstname']." ".$rr['lastname']."</b>, Age ".$rr['age'].".</p>";
				echo "<p>".$row['time']."</p>";
				echo "<br>";
			} 
			echo "<a class='btn btn-success' href='index.php'>Go back</a>";
			echo "</div></div>";
		}
	} else {
		echo "<h2>No Blog Found</h2>";
	}
	

?>

	</div>
			<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>