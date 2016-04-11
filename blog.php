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
			echo "<h2>".$row['heading']."</h2>";
			echo "<h3>".$row['subheading']."</h3>";
			echo "<p>".$row['text']."</p>";
			$query = 'SELECT firstname, lastname, age, username FROM users WHERE id = '.$row['user_id'].';';
			$rre = mysqli_query($con, $query);
			if(mysqli_num_rows($rre) == 1){
				$rr = mysqli_fetch_assoc($rre);
				echo "<p>Written by <b>".$rr['firstname']." ".$rr['lastname']."</b>, Age ".$rr['age'].".</p>";
				echo "<p>".$row['time']."</p>";
			} 
		}
	} else {
		echo "<h2>No Blog Found</h2>";
	}
	

?>