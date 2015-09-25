<?php
if($_GET['username'])
{
 $username=$_GET['username'];
require_once("dbconnection.php");
$sql="select * from oe_mechatron_users where Username='$username'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count==1)
{
 $sql="update oe_mechatron_users set Skip='3', Answered='0', QNo='0',Options='0',Complete='0',Score='0' where Username='$username'";
$result=mysqli_query($con,$sql);
$sql="delete from oe_mechatron_currentstate where Username='$username'";
$result=mysqli_query($con,$sql);
$sql="delete from oe_mechatron_user_log where Username='$username'";
$result=mysqli_query($con,$sql);
}
}
?>
