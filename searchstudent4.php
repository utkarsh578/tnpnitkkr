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
$id=$_POST['id'];
$name=$_POST['name'];
$rollno=$_POST['rollno'];
$email=$_POST['email'];
$contacts=$_POST['contacts'];
$year=$_POST['year'];
$degree=$_POST['degree'];
$branch=$_POST['branch'];
$subbranch=$_POST['subbranch'];
$sgpa1=$_POST['sgpa1'];
$sgpa2=$_POST['sgpa2'];
$sgpa3=$_POST['sgpa3'];
$sgpa4=$_POST['sgpa4'];
$sgpa5=$_POST['sgpa5'];
$cgpa=$_POST['cgpa'];
include "db_connect.php";
$sql="UPDATE studentsdata set name='".$name."' ,rollno=".$rollno." ,email='".$email."',contacts=".$contacts.",year=".$year.",degree='".$degree."',branch='".$branch."',subBranch='".$subbranch."',sgpa1=".$sgpa1.",sgpa2=".$sgpa2.",sgpa3=".$sgpa3.",sgpa4=".$sgpa4.",sgpa5=".$sgpa5.",cgpa=".$cgpa." where id=".$_POST['id'];
//echo $sql;
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "updated";
mysqli_close($con);
?>