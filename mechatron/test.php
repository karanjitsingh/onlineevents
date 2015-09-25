<?php
require_once("dbconnection.php");
$sql="update oe_mechatron_users set QNo='0', Answered='0', Options='0'";
$result=mysqli_query($con,$sql);
if($result)
	echo "success";
else
	echo "failure";
?>