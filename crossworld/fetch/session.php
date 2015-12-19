<?php
	include 'dbcon.php';
	global $conn;
	function checkSession()//($username , $token)
	{
		session_start();
		$_SESSION['username']='kj';
		return true;
		if(isset($_SESSION['username'])  && isset($_SESSION['token']) && $_SESSION['session'])
		{
			global $conn;
			$username = $_SESSION['username'];
			$token = $_SESSION['token'];

			$qry = "SELECT * FROM oe_players_main WHERE user_username = '$username' AND user_token = '$token'";
			
			$result = mysqli_query($conn,$qry);
	
			
			if($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
?>