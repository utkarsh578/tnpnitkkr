<?php
session_start();

if(!isset($_SESSION['name']))
{
	header("location:loginpage.php");
}
else
{
	$name=$_SESSION['name'];
	unset($_SESSION['name']);
	$_SESSION['name']=$name;
}
$id=0;
include "db_connect.php";
$result = mysqli_query($con,"SELECT count(*) FROM Company");
$row = mysqli_fetch_array($result);
$count=$row['count(*)'];
for($i=1;$i<=$count;$i++)
{
	$str="id".$i;
	if(isset($_POST[$str]))
	{
		$id=$_POST[$str];
		break;
	}
}
mysqli_query($con,"DELETE FROM Company where id=".$id);
mysqli_close($con);
$_SESSION['action']=2;
header("location:http://localhost/tnp/viewcompany.php");

?>