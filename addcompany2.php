<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("location:http://localhost/tnp/loginpage.php");
}
else
{
	$name=$_SESSION['name'];
	unset($_SESSION['name']);
	$_SESSION['name']=$name;
}
$companyname=$_POST['name'];
$package=$_POST['package'];
$status=$_POST['status'];
$date_of_visit=$_POST['date_of_visit'];
$no_of_days=$_POST['no_of_days'];
$pac_member=$_POST['pac_member'];
$offer=0;
if($status=="dream")
	$offer=1;
if($status=="superdream")
	$offer=2;
include "db_connect.php";
$sql="INSERT INTO company (companyName,ctc,offer,dateOfVisit,noOfDays,pacMember,studentHired)
VALUES ('".$companyname."','".$package."',".$offer.",'".$date_of_visit."',".$no_of_days.",'".$pac_member."',0)";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
mysqli_close($con);
$_SESSION['company']=$_POST['name'];
header("location:http://localhost/tnp/addcompany1.php");
?>