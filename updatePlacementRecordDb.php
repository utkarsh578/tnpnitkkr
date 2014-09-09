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
	if(isset($_POST["companyId"]))
	{
		$companyId = $_POST["companyId"];
	}
	else
	{
		$companyId = "";
	}
	if(isset($_POST["rollno"]))
	{
		$rollno = $_POST["rollno"];
	}
	else
	{
		$rollno = "";
	}

	$result = mysqli_query($con,"SELECT * FROM studentsData WHERE rollno = '$rollno'");
	$count=mysqli_fetch_array($result);
	
	$flag = $count['noOfOffers'];
	$studentId = $count['id'];


	$result1 = mysqli_query($con,"SELECT * FROM studentPlaced WHERE studentId = '$studentId' AND companyId = $companyId");
	$count1=mysqli_fetch_array($result1);

	if(empty($count['id']))
	{
		$_SESSION['message'] = "Roll not found in the database, Please Check the database or else re-enter the roll no";
		header("location:updatePlacementRecord.php?companyId=".$companyId);
	}
	else if(!empty($count1['id']))
	{
		$_SESSION['message'] = "The Student is allready added to the selected company";
		header("location:updatePlacementRecord.php?companyId=".$companyId);
	}
	else{
		
	$result = mysqli_query($con,"SELECT * FROM company WHERE id = '$companyId'");
	$count=mysqli_fetch_array($result);
	$totalHired = $count['studentHired']+1;
	$offer = $count['offer'];
	
	$companyName = $count['companyName'];
	$result = mysqli_query($con,"UPDATE company SET studentHired = '$totalHired' WHERE id = '$companyId'");
	$companyname = "companyName".$offer;
	$noOfOffers = $flag+1;

	$result = mysqli_query($con,"UPDATE studentsData SET placementStatus = '$offer', $companyname = '$companyId', noOfOffers = '$noOfOffers'   WHERE id = '$studentId'");

	$result = mysqli_query($con,"INSERT INTO studentPlaced (companyId,studentId) VALUES ('$companyId','$studentId')");

	if($result)
	{
		$_SESSION['message'] = "Successfully you have added <b>".$rollno."</b> to the selected company";
		header("location:updatePlacementRecord.php?companyId=".$companyId);
	}
	else
	{
		echo "failed";
		$_SESSION['message'] = "Failed";
		header("location:updatePlacementRecord.php?companyId=".$companyId);
	}
}
}

?>