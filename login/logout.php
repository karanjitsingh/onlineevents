<?php

include "../dbcon.php";
global $conn;
session_start();
if(isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	$token = $_SESSION['token'];
	$qry = "UPDATE oe_players_main set user_token='' WHERE user_username = '$username'";
	$result = mysqli_query($conn,$qry);
	
	$_SESSION['username'] = 0;
	$_SESSION['session'] = false;
	$_SESSION['token'] = "";
	
	
}
?>