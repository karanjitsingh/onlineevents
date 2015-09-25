<?php
//1-Green 0-Red 2-Blue 3-Black
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
$answered=$row['Answered'];
$sql="select * from oe_mechatron_currentstate where Username='$username'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count==36)
{
$sql="update oe_mechatron_users set Complete='1' where Username='$username'";
$result=mysqli_query($con,$sql);

  $data=array("status"=>"complete");
  echo json_encode($data);
}
$sqlgreen="select * from oe_mechatron_currentstate where Color='1' and Username='$username'";
$resultgreen=mysqli_query($con,$sqlgreen);
$sqlred="select * from oe_mechatron_currentstate where Color='0' and Username='$username'";
$resultred=mysqli_query($con,$sqlred);
$count_green=mysqli_num_rows($resultgreen);
$count_red=mysqli_num_rows($resultred);
if($count_green>=3)
{
  $i=0;
while($row=mysqli_fetch_array($resultgreen,MYSQL_ASSOC))
{
  $sidgreen[$i]=$row['SId'];
  $i++;
}
$sidgreen_sort=$sidgreen;
sort($sidgreen_sort);
$length=count($sidgreen_sort);
for($i=0;$i<$length;$i++) //11 21 22 31
{
  $s1=$sidgreen_sort[$i];//11
  $flag=0;
  $send=array();
  $k=1;
  for($j=$i+1;$j<$length;$j++)
  {
    
    $s2=$sidgreen_sort[$j];//21
    if($s2==($s1+1) || $s2==($s1+10))
    {
      array_push($send, $s2);
      $s1=$s2;//s1=21 send[0]=21 send[1]=22 send0=11
      $flag++;
    }
    else
    {
      if($flag==1)
      {
        if($sidgreen_sort[$j]==($sidgreen_sort[$i]+1) || $sidgreen_sort[$j]==($sidgreen_sort[$i]+10))
        {
         array_pop($send);
         $s1=$sidgreen_sort[$i];
          $j--;
          $flag=0;
          continue;
        }
        else
        {
          $s1=$send[0];
         continue; 
          
        }
      }
    }
    if($flag==2)
    {
     $check=check($sidgreen_sort[$i],$send[1]);
     if($check==0)
     {
      $s1=$sidgreen_sort[$j-1];
      $flag--;
      array_pop($send);
      continue;
     }
     break;
    }
  }
  if($flag==2)
  {
    $send0=$sidgreen_sort[$i];
    if($send[1]==($send0+2) || $send[1]==($send0+20))
    {
    $key[0]=array_search($send0,$sidgreen);
    $key[1]=array_search($send[0],$sidgreen);
    $key[2]=array_search($send[1],$sidgreen);
    sort($key);
    $sidgreen0=$sidgreen[$key[0]];
    $sidgreen1=$sidgreen[$key[1]];
    $sidgreen2=$sidgreen[$key[2]];
    $sql="update oe_mechatron_currentstate SET Color='3' where SId='$sidgreen0' and Username='$username'";
    $result=mysqli_query($con,$sql);
    $sql1="delete from oe_mechatron_currentstate where SId in ('$sidgreen1','$sidgreen2') and Username='$username'";
    $result1=mysqli_query($con,$sql1);
    $sql="select * from oe_mechatron_users where Username='$username'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQL_ASSOC);
    $score=$row['Score'];
    $score=$score+15;
    $sql="update oe_mechatron_users set Score='$score' where Username='$username'";
    $result=mysqli_query($con,$sql);
    $data=array(
      "id"=>$sidgreen[$key[0]],
      "id1"=>$sidgreen[$key[1]],
      "id2"=>$sidgreen[$key[2]],
      "status"=>"111",
      "score"=>$score);
    echo json_encode($data);
  }
  else
  {

  }
}
}
}
//for three red
if($count_red>=3)
{
  $i=0;
while($row=mysqli_fetch_array($resultred,MYSQL_ASSOC))
{
  $sidred[$i]=$row['SId'];
  $i++;
}
$sidred_sort=$sidred;
sort($sidred_sort);
$length=count($sidred_sort);
for($i=0;$i<$length;$i++)
{
  $s1=$sidred_sort[$i];//32
  $flag=0;
  $send=array();
  $k=1;
  for($j=$i+1;$j<$length;$j++)
  {
    
    $s2=$sidred_sort[$j];//34
    if($s2==($s1+1) || $s2==($s1+10))
    {
      array_push($send, $s2);//33 34
      $s1=$s2;//33
      $flag++;//flag=1
    }
    else
    {
      if($flag==1)
      {
        if($sidred_sort[$j]==($sidred_sort[$i]+1) || $sidred_sort[$j]==($sidred_sort[$i]+10))
        {
         array_pop($send);
         $s1=$sidred_sort[$i];
          $j--;
          $flag=0;
          continue;
        }
        else
        {
          $s1=$send[0];
         continue; 
          
        }
      }
    }
    if($flag==2)
    {
     $check=check($sidred_sort[$i],$send[1]);

     if($check==0)
     {
      $s1=$sidred_sort[$j-1];
      $flag--;
      array_pop($send);
      continue;
     }
     break;
    }
  }
  if($flag==2)
  {

    $send0=$sidred_sort[$i];
    if($send[1]==($send0+2) || $send[1]==($send0+20))
    {
  
    $key[0]=array_search($send0,$sidred);
    $key[1]=array_search($send[0],$sidred);
    $key[2]=array_search($send[1],$sidred);
    sort($key);
    $sidred0=$sidred[$key[0]];
    $sidred1=$sidred[$key[1]];
    $sidred2=$sidred[$key[2]];
    $sql="update oe_mechatron_currentstate SET Color='2' where SId='$sidred0' and Username='$username'";
    $result=mysqli_query($con,$sql);
    $sql1="delete from oe_mechatron_currentstate where SId in ('$sidred1','$sidred2') and Username='$username'";
    $result1=mysqli_query($con,$sql1);
    $sql="select * from oe_mechatron_users where Username='$username'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQL_ASSOC);
    $score=$row['Score'];
    $score=$score+5;
    $sql="update oe_mechatron_users set Score='$score' where Username='$username'";
    $result=mysqli_query($con,$sql);
    $data=array(
      "id"=>$sidred[$key[0]],
      "id1"=>$sidred[$key[1]],
      "id2"=>$sidred[$key[2]],
      "status"=>"000",
      "score"=>$score);
    echo json_encode($data);
    break;
  }
}
}
}

if($answered>1 && $answered<=3)
{
  $sql="select * from oe_mechatron_currentstate where Username='$username' order by Id DESC limit 2";
  $result=mysqli_query($con,$sql);
  $i=0;

  while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
  {
    $sid[$i]=$row['SId'];
    $color[$i]=$row['Color'];
    $i++;
  }
  if($sid[0]==($sid[1]+1) || $sid[0]==($sid[1]+10) || $sid[1]==($sid[0]+1) || $sid[1]==($sid[0]+10))
{
if($color[0]+$color[1]==1)
{
  $sql="update oe_mechatron_users set Answered='3' where Username='$username'";
$result=mysqli_query($con,$sql);
  $data=array(
    "status"=>"10");
  echo json_encode($data);
}
}
}
$sqlblue="select * from oe_mechatron_currentstate where Color='3' and Username='$username'";
$resultblue=mysqli_query($con,$sqlblue);
$countblue=mysqli_num_rows($resultblue);
//for three blue
if($countblue>=3)
{
 while($row=mysqli_fetch_array($resultblue,MYSQL_ASSOC))
{
  $sidblue[$i]=$row['SId'];
  $i++;
}
$sidblue_sort=$sidblue;
sort($sidblue_sort);
$length=count($sidblue_sort);
for($i=0;$i<$length;$i++)
{
  $s1=$sidblue_sort[$i];
  $flag=0;
  $send=array();
  $k=1;
  for($j=$i+1;$j<$length;$j++)
  {
    
    $s2=$sidblue_sort[$j];
    if($s2==($s1+1) || $s2==($s1+10))
    {
      array_push($send, $s2);
      $s1=$s2;
      $flag++;
    }
    else
    {
      if($flag==1)
      {
        if($sidblue_sort[$j]==($sidblue_sort[$i]+1) || $sidblue_sort[$j]==($sidblue_sort[$i]+10))
        {
         array_pop($send);
         $s1=$sidblue_sort[$i];
          $j--;
          $flag=0;
          continue;
        }
        else
        {
          $s1=$send[0];
         continue; 
          
        }
      }
    }
    if($flag==2)
    {
     $check=check($sidblue_sort[$i],$send[1]);
     if($check==0)
     {
      $s1=$sidblue_sort[$j-1];
      $flag--;
      array_pop($send);
      continue;
     }
     break;
    }
  }
  if($flag==2)
  {
    $send0=$sidblue_sort[$i];
    if($send[1]==($send0+2) || $send[1]==($send0+20))
    {
  
    $key[0]=array_search($send0,$sidblue);
    $key[1]=array_search($send[0],$sidblue);
    $key[2]=array_search($send[1],$sidblue);
    sort($key);
        $sidblue0=$sidblue[$key[0]];
    $sidblue1=$sidblue[$key[1]];
    $sidblue2=$sidblue[$key[2]];
    $sql="update oe_mechatron_currentstate SET Color='4' where SId='$sidblue0' and Username='$username'";
    $result=mysqli_query($con,$sql);
    $sql1="delete from oe_mechatron_currentstate where SId in ('$sidblue1','$sidblue2') and Username='$username'";
    $result1=mysqli_query($con,$sql1);
    $sql="select * from oe_mechatron_users where Username='$username'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQL_ASSOC);
    $score=$row['Score'];
$answered=$row['Score'];
    $score=$score+20;
    $sql="update oe_mechatron_users set Score='$score' where Username='$username'";
    $result=mysqli_query($con,$sql);
    $data=array(
      "id"=>$sidblue[$key[0]],
      "id1"=>$sidblue[$key[1]],
      "id2"=>$sidblue[$key[2]],
"answered"=>$answered,
      "status"=>"222",
      "score"=>$score);
    echo json_encode($data);
    break;
  }
  }
} 
}
$sqlblack="select * from oe_mechatron_currentstate where Color='2' and Username='$username'";
$resultblack=mysqli_query($con,$sqlblack);
$countblack=mysqli_num_rows($resultblack);
if($countblack>=3)
{
 while($row=mysqli_fetch_array($resultblack,MYSQL_ASSOC))
{
  $sidblack[$i]=$row['SId'];
  $i++;
}
$sidblack_sort=$sidblack;
sort($sidblack_sort);
$length=count($sidblack_sort);
for($i=0;$i<$length;$i++)
{
  $s1=$sidblack_sort[$i];
  $flag=0;
  $k=1;
  $send=array();
  for($j=$i+1;$j<$length;$j++)
  {
    
    $s2=$sidblack_sort[$j];
    if($s2==($s1+1) || $s2==($s1+10))
    {
      array_push($send, $s2);
      $s1=$s2;
      $flag++;
    }
    else
    {
      if($flag==1)
      {
        if($sidblack_sort[$j]==($sidblack_sort[$i]+1) || $sidblack_sort[$j]==($sidblack_sort[$i]+10))
        {
         array_pop($send);
         $s1=$sidblack_sort[$i];
          $j--;
          $flag=0;
          continue;
        }
        else
        {
          $s1=$send[0];
         continue; 
          
        }
      }
    }
   if($flag==2)
    {
     $check=check($sidblack_sort[$i],$send[1]);
     if($check==0)
     {
      $s1=$sidblack_sort[$j-1];
      $flag--;
      array_pop($send);
      continue;
     }
     break;
    }
  }
  if($flag==2)
  {
    $send0=$sidblack_sort[$i];
    if($send[1]==($send0+2) || $send[1]==($send0+20))
    {
  
    $key[0]=array_search($send0,$sidblack);
    $key[1]=array_search($send[0],$sidblack);
    $key[2]=array_search($send[1],$sidblack);
    sort($key);
        $sidblack0=$sidblack[$key[0]];
    $sidblack1=$sidblack[$key[1]];
    $sidblack2=$sidblack[$key[2]];
    $sql="update oe_mechatron_currentstate SET Color='5' where SId='$sidblack0' and Username='$username'";
    $result=mysqli_query($con,$sql);
    $sql1="delete from oe_mechatron_currentstate where SId in ('$sidblack1','$sidblack2') and Username='$username'";
    $result1=mysqli_query($con,$sql1);
    $sql="select * from oe_mechatron_users where Username='$username'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQL_ASSOC);
    $score=$row['Score'];
    $score=$score+10;
    $sql="update oe_mechatron_users set Score='$score' where Username='$username'";
    $result=mysqli_query($con,$sql);
    $data=array(
      "id"=>$sidblack[$key[0]],
      "id1"=>$sidblack[$key[1]],
      "id2"=>$sidblack[$key[2]],
      "status"=>"333",
      "score"=>$score);
    echo json_encode($data);
    break;
  }
}
}
}
function check($send0,$send1)
{
  if($send1==($send0+2) || $send1==($send0+20))
  {
    return 1;
  }
  else
    return 0;
}
?>


