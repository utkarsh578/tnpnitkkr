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
$companyname=$_POST['name'];
$package=$_POST['package'];
$status=$_POST['status'];
$offer=0;
if($status=="dream")
	$offer=1;
if($status=="superdream")
	$offer=2;
$date_of_visit=$_POST['date_of_visit'];
$no_of_days=$_POST['no_of_days'];
$pac_member=$_POST['pac_member'];
$hrname=$_POST['hr_name'];
$hrcontact=$_POST['hr_contact'];
$hremail=$_POST['hr_email'];
include "db_connect.php";
$sql="UPDATE company set companyName='".$companyname."' ,ctc='".$package."' ,offer='".$offer."',dateOfVisit='".$date_of_visit."',noOfDays=".$no_of_days.",pacMember='".$pac_member."',hrName='".$hrname."',hrEmail='".$hremail."',hrContact='".$hrcontact."' where id=".$_POST['id'];
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
$_SESSION['action']=1;
header("location:viewcompany.php");
mysqli_close($con);
?>