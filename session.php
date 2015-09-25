<?php
	include 'dbcon.php';
	//global $conn;
	function checkSession()//($username , $token)
	{
		/*$conn = $GLOBALS['conn'];
		$username = $GLOBALS['username'];
		//$token = md5($token);
		session_start();
		if($_SESSION['username'] == $username && $_SESSION['session'])
		{
			$qry = "SELECT * FROM players_main WHERE user_username = '$username' AND user_token = '$token'";
			$result = mysqli_query($conn,$qry);
			if($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				return true;
			}
			else
			{
				return false;
			}
			return true;
		}
		else
		{
			return false;
		}*/
		return true;
	}
	if(checkSession()==true){
	echo "yep";
	else
	echo "nope";
	echo "something";
	echo "yay";
?>