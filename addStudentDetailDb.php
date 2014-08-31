<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	include 'db_connect.php';
	if(isset($_POST["rollno"]))
	{
		$rollno = $_POST["rollno"];
	}
	else
	{
		$rollno = "";
	}
	if(isset($_POST["name"]))
	{
		$name = $_POST["name"];
	}
	else
	{
		$name = "";
	}
	if(isset($_POST["email"]))
	{
		$email = $_POST["email"];
	}
	else
	{
		$email = "";
	}
	if(isset($_POST["contacts"]))
	{
		$contacts = $_POST["contacts"];
	}
	else
	{
		$contacts = "";
	}
	if(isset($_POST["year"]))
	{
		$year = $_POST["year"];
	}
	else
	{
		$year = "";
	}
	if(isset($_POST["degree"]))
	{
		$degree = $_POST["degree"];
	}
	else
	{
		$degree = "";
	}
	if(isset($_POST["branch"]))
	{
		$branch = $_POST["branch"];
	}
	else
	{
		$branch = "";
	}
	$result = mysqli_query($con,"SELECT * FROM studentsData WHERE rollno = $rollno");
	$count=mysqli_fetch_array($result);
	if($count['rollno'] == $rollno)
	{
		$_SESSION["message"] = "The roll no you have entered all ready exists";
		header("location:addStudentDetail.php");
	}
	$result = mysqli_query($con,"INSERT INTO studentsData (rollno,name,email,contacts,year,degree,branch) VALUES ('$rollno','$name','$email','$contacts','$year','$degree','$branch')");
	if($result)
	{
		$_SESSION['message'] = "Student Detail Has Been Added";
		header("location:addStudentDetail.php");
	}
	else
	{
		$_SESSION['message'] = "Sorry! Student Detail is not Added, Please Try Again";
		header("location:addStudentDetail.php");
	}
}

?>