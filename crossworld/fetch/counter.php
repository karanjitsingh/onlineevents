<?php
	include "../../dbcon.php";
	
	$result=$conn->query("select count(username) as count from crossworld_users;");
	$data=$result->fetch_assoc();
	echo $data['count'];
?>