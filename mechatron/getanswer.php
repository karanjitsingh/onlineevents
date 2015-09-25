<?php
session_start();
if(!isset($_SESSION['username']))
{
	die();
}
require_once("dbconnection.php"); 
if($_GET['option'])
{
$option=mysqli_real_escape_string($con,($_GET['option']));
$sid=mysqli_real_escape_string($con,($_GET['id']));
$username=$_SESSION['username'];
$sql="select * from oe_mechatron_users where Username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
$qno=$row['QNo'];
$sql="select * from oe_mechatron_questions where Id='$qno' and (O1='$option' OR O2='$option' OR O3='$option' OR O4='$option' OR O5='$option' OR O6='$option')";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count==1)
{
$sql="select * from oe_mechatron_answers where O='$option'";
$result=mysqli_query($con,$sql) or die(mysqli_error());
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
$status=$row['Status'];
$username=$_SESSION['username'];

if($status==1)
{
 $sql2="select * from oe_mechatron_currentstate where SId='$sid' and Username='$username'";
 $result2=mysqli_query($con,$sql2);
 $count2=mysqli_num_rows($result2);
 if($count2==0)
 {
 	$sql="select * from oe_mechatron_users where Username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
$answered=$row['Answered'];
$answered++;
$sql="update oe_mechatron_users set Answered='$answered' where Username='$username'";
$result=mysqli_query($con,$sql);

$sql="select * from oe_mechatron_users where Username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
$opt=$row['Options'];
$opt=unserialize($opt);
$opt=array_values($opt);
$key=array_search($option, $opt);
if($key!==FALSE)
{
unset($opt[$key]);
$store=serialize($opt);
$sql="update oe_mechatron_users set Options='$store' where Username='$username'";
$result=mysqli_query($con,$sql);
$sql="select * from oe_mechatron_users where Username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQL_ASSOC);

 $sql1="insert into oe_mechatron_currentstate(Username,SId,Color,Flag) values('$username','$sid',1,0)";
 $result1=mysqli_query($con,$sql1);
 $data=array("status"=>"1",
 	"color"=>"rgb(46,254,46)");
 echo json_encode($data);
}
}
else
{
	$data=array("status"=>"reload");
}
}
else
{
	$sql2="select * from oe_mechatron_currentstate where SId='$sid' and Username='$username'";
 $result2=mysqli_query($con,$sql2);
 $count2=mysqli_num_rows($result2);
 if($count2==0)
 {
 	$sql="select * from oe_mechatron_users where Username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
$answered=$row['Answered'];
$answered++;
$sql="update oe_mechatron_users set Answered='$answered' where Username='$username'";
$result=mysqli_query($con,$sql);

$sql="select * from oe_mechatron_users where Username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
$opt=$row['Options'];
$opt=unserialize($opt);
$opt=array_values($opt);
$key=array_search($option, $opt);
if($key!==FALSE)
{
unset($opt[$key]);
$store=serialize($opt);
$sql="update oe_mechatron_users set Options='$store' where Username='$username'";
$result=mysqli_query($con,$sql);
$sql="select * from oe_mechatron_users where Username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQL_ASSOC);

 $sql1="insert into oe_mechatron_currentstate(Username,SId,Color,Flag) values('$username','$sid',0,0)";
 $result1=mysqli_query($con,$sql1);
 $data=array("status"=>"1",
 	"color"=>"rgb(255,0,0)");
 echo json_encode($data);
}
else
{
$data=array("status"=>"reload");
echo json_encode($data);
}
}
else
{
	$data=array("status"=>"reload");
	echo json_encode($data);
}
}
}
else
{
	$data=array("status"=>"reload");
	echo json_encode($data);
}
}

?>