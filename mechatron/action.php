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
 $row=mysqli_fetch_array($result);
 $qno=$row['QNo'];
 $answered=$row['Answered'];
 if($answered==3)
 {
 $sql1="update oe_mechatron_users set QNo='0', Answered='0',Options='0' where Username='$username'";
 $result1=mysqli_query($con,$sql1);
 $data=array('redirect'=>'1');	
 }
 else
 {
 	$data=array("redirect"=>"0");
 }
echo json_encode($data);

?>
