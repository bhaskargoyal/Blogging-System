<?php
	session_start();
	require_once('./connect.php');
	if(isset($_SESSION['login'])){
		if($_SESSION['login']){
			?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:light" />
	<link rel = "stylesheet" href="css/style.css" type="text/css">
	<title>Blogging System | Home page</title>
</head>
<body>
	<div class="container-fluid">
		<div id="head-navbar">
			<div id="logo" class="menu inline">
				<h3 style="margin:0px;">Blogging System</h3>
			</div>
			<div class="menu inline pull-right">
				<a class="btn btn-info" href="logout.php">Logout</a>
			</div>
		</div>
		<section id="home-main" class="row">
		<?php 
			if(isset($_SESSION['username'])){
				$query = "SELECT id, firstname, lastname, age, username FROM users WHERE username='".$_SESSION['username']."'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_assoc($result);
				$id = $row['id']; 
				$username = $row['username'];
				$age = $row['age'];
				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				?>

				<div id="home-main-left" class="col-sm-8">
				<div class="panel panel-default">
				<div class="panel-heading"><?php echo $firstname; ?>'s Blogs</div>
				<div class="panel-body">

				<?php
				if(isset($_SESSION['status'])){
						$status = $_SESSION['status'];
						unset($_SESSION['status']);
				}
				?>

				<p><?php if(isset($status))echo "Status : ".$status; ?></p>

				<?php
				$query = "SELECT * FROM blogs WHERE user_id = ".$id.";";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result)  == 0){
					echo "<h3>No Blogs Found</h3>";
				} else {
					
					$count =0;
					while($row = mysqli_fetch_assoc($result)){
						$count = $count +1;
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
							
						} 

						echo "<a class='btn btn-success' href=\"blog.php?blog=".$row['id']."\">Read More</a>&nbsp;";
						echo '<a class=\'btn btn-success\' href="editblog.php?blog='.$row['id'].'">Edit</a>&nbsp;';
						echo '<a class=\'btn btn-danger\' href="deleteblog.php?blog='.$row['id'].'">Delete</a>&nbsp;';
						echo "</div></div>";
					}
				}
				
				?>
				</div>
				</div>
				</div>
				<div class="col-sm-4">
					<div class="row">
						<div class="panel panel-default">
							<div class="panel-heading">
								Write a New Blog
							</div>
							<div class="panel-body">
								<p>Bring your mind to a peacefull yet mysterious journey.</p>
								<p>Showcase what you are capable off.</p>
								<p><a class="btn btn-danger" href="newblog.php">New Blog</a></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="panel panel-default">
							<div class="panel-heading">
								Details
							</div>
							<div class="panel-body">
								<p>Full Name - <?php echo $firstname.' '.$lastname;?></p>
								<p>Age - <?php echo $age; ?></p>
								<p>Username - <?php echo $username; ?></p>
								<p><a href="editdetails.php">Edit Deltails</a> | <a href= "editpassword.php">Edit Password</a></p>
							</div>
						</div>
					</div>
				</div>
				<?php

			} else {
				header("Location: logout.php");
				exit();
			}
		?>
		</section>
		<footer>
		</footer>
	</div>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>


			<?php
		}
	} else {
		$_SESSION['wrong'] = "You are logged out.";
		header("Location: index.php");
		exit();
	}

?>