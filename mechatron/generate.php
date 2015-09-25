<?php 
header("Content-Type: application/json");
session_start();
if(!isset($_SESSION['username']))
{
die();
}
require_once("dbconnection.php"); 
$username=$_SESSION['username'];
$sql="select * from oe_mechatron_currentstate where Username='$username'";
$result=mysqli_query($con,$sql);
$send=array();
$i=0;
while($row=mysqli_fetch_assoc($result))
{
  $sid=$row['SId'];
  $color=$row['Color'];
  $send[$i]=$row;
  $i++;
}
echo '{"show":'.json_encode($send).'}';
?>