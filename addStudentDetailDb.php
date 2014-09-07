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
	if(isset($_POST["sgpa1"]))
	{
		$sgpa1 = $_POST["sgpa1"];
	}
	else
	{
		$sgpa1 = "";
	}
	if(isset($_POST["sgpa2"]))
	{
		$sgpa2 = $_POST["sgpa2"];
	}
	else
	{
		$sgpa2 = "";
	}
	if(isset($_POST["sgpa3"]))
	{
		$sgpa3 = $_POST["sgpa3"];
	}
	else
	{
		$sgpa3 = "";
	}
	if(isset($_POST["sgpa4"]))
	{
		$sgpa4 = $_POST["sgpa4"];
	}
	else
	{
		$sgpa4 = "";
	}
	if(isset($_POST["sgpa5"]))
	{
		$sgpa5 = $_POST["sgpa5"];
	}
	else
	{
		$sgpa5 = "";
	}
	if(isset($_POST["cgpa6"]))
	{
		$cgpa = $_POST["cgpa6"];
	}
	else
	{
		$cgpa = "";
	}
	if(isset($_POST["subbranch"]))
	{
		$subbranch = $_POST["subbranch"];
	}
	else
	{
		$subbranch = "";
	}
	if(isset($_POST["address"]))
	{
		$address = $_POST["address"];
	}
	else
	{
		$address = "";
	}
	if(isset($_POST["10th"]))
	{
		$tenth = $_POST["10th"];
	}
	else
	{
		$tenth = "";
	}
	if(isset($_POST["12th"]))
	{
		$twelth = $_POST["12th"];
	}
	else
	{
		$twelth = "";
	}
	$result = mysqli_query($con,"SELECT * FROM studentsData WHERE rollno = $rollno");
	$count=mysqli_fetch_array($result);
	if($count['rollno'] == $rollno)
	{
		$_SESSION["message"] = "The roll no you have entered all ready exists";
		header("location:addStudentDetail.php");

	}
	else{
	$result = mysqli_query($con,"INSERT INTO studentsData (rollno,name,email,contacts,year,degree,branch,sgpa5,sgpa4,sgpa3,sgpa2,sgpa1,cgpa,subBranch,address,10th,12th) VALUES ('$rollno','$name','$email','$contacts','$year','$degree','$branch','$sgpa5','$sgpa4','$sgpa3','$sgpa2','$sgpa1','$cgpa','$subbranch','$address','$tenth','$twelth')");
	if($result)
	{
		$_SESSION['message'] = "Student Detail of Roll no ".$rollno." Has Been Added";
		header("location:addStudentDetail.php");
	}
	else
	{
		$_SESSION['message'] = "Sorry! Student Detail is not Added, Please Try Again";
		header("location:addStudentDetail.php");
	}
}
}

?>