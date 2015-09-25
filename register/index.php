<?php
	include '../dbcon.php';
	global $conn; 
	//STATUS VARIABLES
	$status101 = array('status' => '101');
	$status102 = array('status' => '102');
	$status103 = array('status' => '103');
	$status104 = array('status' => '104');
	$status105 = array('status' => '105');
	$status106 = array('status' => '106');
	//POST VARIABLE
	$name = $_REQUEST['name'];
	$registration = $_REQUEST['registration'];
	$phone = $_REQUEST['phone'];
	$email = $_REQUEST['email'];
	$college = $_REQUEST['college'];
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	
	//echo $name." ".$registration." ".$phone." ".$email." ".$college." ".$username." ".$password;
	
	$pass_hashed = md5($password);
	//FIELDS CHECKS
	function isRegistered($name,$email,$phone)
	{
		global $conn;
		$qry = "SELECT * FROM oe_players_main WHERE user_name = '$name' AND user_email = '$email' AND user_phone = '$phone'";
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
	function isAvailableUserName($user)
	{
		global $conn;
		$qry = "SELECT * FROM oe_players_main WHERE user_username = '$user'";
		$result = mysqli_query($conn,$qry);
		if($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	if($name == "" || $registration == "" || $phone == "" || $email == "" || $college == "" || $username == "" || $password == "")
	{
		// INCOMPLETE FIELDS
		echo json_encode($status101);
	}
	else
	{
		if(isRegistered($name,$email,$phone))
		{
			echo json_encode($status106);
		}
		else if(isAvailableUserName($username))
		{
			if(!preg_match("/^[a-zA-Z ]*$/",$name))
			{
				echo json_encode($status103);
			}
			else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				echo json_encode($status103);
			}
			else if(!is_numeric($phone))
			{
				echo json_encode($status103);	
			}
			else
			{
				// REGISTER USER
				$qry = "INSERT INTO oe_players_main (user_name , user_registration_no , user_phone , user_email , user_college , user_username , user_password) VALUES ('$name' , '$registration' , '$phone' , '$email' , '$college' , '$username' , '$pass_hashed')";
				//echo mysql_error();
				if($result = mysqli_query($conn,$qry))
				{
					//REGISTERED
					echo json_encode($status105);
				}
				else
				{
					//NOT REGISTERED
					echo json_encode($status104);	
				}
			}
		}
		else
		{
			echo json_encode($status102);
		}
	}
?>