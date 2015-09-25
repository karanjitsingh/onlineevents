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
$count=mysqli_num_rows($result);
if($count==0)
{
	$q=randomize();
	$sql="insert into oe_mechatron_users(Username,QNo,Skip,Answered,Options,Score,Complete) values('$username','0','3','0','0','0','0')";
	$result=mysqli_query($con,$sql);
}
$sql1="select * from oe_mechatron_users where Username='$username'";
$result1=mysqli_query($con,$sql1);
$row=mysqli_fetch_array($result1,MYSQL_ASSOC);
$qno=$row['QNo'];
$answered=$row['Answered'];
if($qno==0 || $answered>3)
{
	$q=randomize();
	$sql="update oe_mechatron_users set QNo='$q' where Username='$username'";
$result=mysqli_query($con,$sql);
$sql="insert into oe_mechatron_user_log(Username,QNo) values('$username','$q')";
 $result=mysqli_query($con,$sql);
$sql="select * from oe_mechatron_questions where Id='$q'";
$result=mysqli_query($con,$sql);
$row1=mysqli_fetch_array($result);
$question=$row1['Question'];
$o1=$row1['O1'];
$o2=$row1['O2'];
$o3=$row1['O3'];
$o4=$row1['O4'];
$o5=$row1['O5'];
$o6=$row1['O6'];
$image=$row1['Image'];
$sql="select * from oe_mechatron_users where Username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
$skip=$row['Skip'];
$score=$row['Score'];
$option=array($o1,$o2,$o3,$o4,$o5,$o6);
$store=serialize($option);
$sql="update oe_mechatron_users set Options='$store',Answered='0' where Username='$username'";
$result=mysqli_query($con,$sql);
$sql="select * from oe_mechatron_users where Username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
$options=unserialize($row['Options']);
$options=array_values($options);
}
else
{
$sql="select * from oe_mechatron_questions where Id='$qno'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
$question=$row['Question'];
$sql="select * from oe_mechatron_users where Username='$username'";
$result=mysqli_query($con,$sql);
$row1=mysqli_fetch_array($result);
$skip=$row1['Skip'];
$score=$row1['Score'];
$options_array=$row1['Options'];
$options=unserialize($row1['Options']);
$options=array_values($options);
}
function randomize()
{
	$send=0;
	$username=$_SESSION['username'];
	while($send==0)
	{
	$qno=rand(1,146);
	if($qno==12) continue;
	$sql="select * from oe_mechatron_user_log where Username='$username' and QNo='$qno'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	if($count==0)
	{
		$sql="insert into oe_mechatron_user_log(Username,QNo) values('$username','$qno')";
		$result=mysqli_query($con,$sql);
		$send=$qno;
	}
	}
	return $send;
}
?>

