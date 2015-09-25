<?php
 session_start();
if(!isset($_SESSION['username']))
{
	die();
}
require_once("dbconnection.php"); 
$username=$_SESSION['username'];
 $sql="select * from oe_mechatron_users where Username='$username'";
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($result,MYSQL_ASSOC);
 $qno=$row['QNo'];
 $skip=$row['Skip'];
 $complete=$row['Complete'];
 if($complete==1)
 {
 die();
 }
 if($skip>0)
 {
 $skip--;
 $sql1="update oe_mechatron_users set QNo='0', Skip='$skip', Answered='0', Options='0' where Username='$username'";
 $result1=mysqli_query($con,$sql1);
 $data=array("status"=>"1");
 echo json_encode($data);
}
else
{
	$data=array("status"=>"0");
 echo json_encode($data);
}
?>


