<?php
	include '../dbcon.php';
	global $conn;
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$token = $_REQUEST['token'];
	$token = md5($token);
	$pass_hashed = md5($password);
	//JSONS
	$status201 = array('status' => '201');
	$status202 = array('status' => '202');
	$status203 = array('status' => '203');
	$status204 = array('status' => '204');
	$status205 = array('status' => '205');

	function login()
	{
		global $username;
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['session'] = true;
	}
	//FILTERS
	function checkUserName($str)
	{
		if(preg_match('/^[a-zA-Z0-9]{1,}$/', $str)) { // for english chars + numbers only
 	   	// valid username, alphanumeric & longer than or equals 5 chars
			return true;
		}
		else
			return false;
	}
	if($username != "" && $password != "")
	{
		if(checkUserName($username))
		{
			$qry = "SELECT * FROM oe_players_main WHERE user_username = '$username'";
			$result = mysqli_query($conn,$qry);
			if($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				if($row['user_password'] == $pass_hashed)
				{
					//success
					//$qry = "UPDATE oe_players_main SET user_token = '$token' WHERE user_username = '$username'";
					//mysqli_query($conn, $qry);
					login();
					echo json_encode($status204);
				}
				else
				{
					session_destroy();
					//wrong password
					//echo $pass_hashed;
					echo json_encode($status205);
				}
			}
			else
			{
				//wrong username
				echo json_encode($status203);
			}
		}
		else
		{
			echo json_encode($status202);
		}
	}
	else
	{
		//incomplete
		echo json_encode($status201);
	}

?>