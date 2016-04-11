<?php 
session_start();
/*unset($_SESSION['login']);
unset($_SESSION['username']);
unset($_SESSION['wrong']);*/

session_destroy();
session_unset();
header("location: index.php");
exit();
?>