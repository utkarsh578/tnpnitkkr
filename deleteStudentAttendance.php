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
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	$studentId = $_GET["studentId"];
	$companyId = $_GET["companyId"];
	$rollno = $_GET['rollno'];
	$date = $_GET['date'];
	$dateCompany = $_GET['date'];

	include 'db_connect.php';
	$attendance = "";
	$date=date_create($date);
	$date = date_add($date,date_interval_create_from_date_string("0 days"));
	$date = ",".date_format($date,"d-m");
	$result1 = mysqli_query($con,"SELECT * FROM attendance WHERE rollno = '$rollno'");
	$count1 = mysqli_fetch_array($result1);
	$attendance = $count1['totalDays'];
	$attendance = preg_replace('/'.$date.'/', "", $attendance, 1);

	$result = mysqli_query($con,"DELETE FROM studentCompanyAttended WHERE studentId = '$studentId' AND companyId = '$companyId'");

	$result = mysqli_query($con,"SELECT * FROM studentCompanyAttended WHERE studentId = '$studentId' AND dateCompany = '$dateCompany'");
	$count = mysqli_fetch_array($result);
	if(!empty($count['id']))
	{
		$result = mysqli_query($con,"DELETE FROM studentCompanyAttended WHERE studentId = '$studentId' AND companyId = '$companyId'");
	}

	else{

	$result = mysqli_query($con,"UPDATE attendance SET totalDays = '$attendance' WHERE rollno = '$rollno'");
	$result = mysqli_query($con,"DELETE FROM studentCompanyAttended WHERE studentId = '$studentId' AND companyId = '$companyId'");
	$_SESSION['message'] = "Successfully you have deleted the ".$rollno." rollno";
	}
	header('location:deleteAttendance.php?companyId='.$companyId);

}
?>