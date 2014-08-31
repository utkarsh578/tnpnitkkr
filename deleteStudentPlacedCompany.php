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

	include 'db_connect.php';
	$result1 = mysqli_query($con,"SELECT * FROM company  WHERE id = '$companyId'");
	$count1=mysqli_fetch_array($result1);
	$totalHired = $count1['studentHired']-1;
	$result = mysqli_query($con,"UPDATE company SET studentHired = '$totalHired' WHERE id = '$companyId'");

	$result = mysqli_query($con,"DELETE FROM studentPlaced WHERE studentId = '$studentId' AND companyId = '$companyId'");
	$result = mysqli_query($con,"SELECT * FROM studentsData WHERE id = '$studentId'");
	$count=mysqli_fetch_array($result);

	$noOfOffers = $count['noOfOffers'];
	$noOfOffers = $noOfOffers-1;
	$companyName = "companyName".$noOfOffers;

	if($noOfOffers > 0)
	{
		$temp = $noOfOffers-1;
		$tempCompanyName = "companyName".$temp;
		$tempCompanyId = $count[$tempCompanyName];
		$result1 = mysqli_query($con,"SELECT * FROM company WHERE id = '$tempCompanyId'");
		$tempCount=mysqli_fetch_array($result1);
		$placementStatus = $tempCount['offer'];
		
		$result = mysqli_query($con,"UPDATE studentsData SET placementStatus = '$placementStatus', $companyName = NULL , noOfOffers = '$noOfOffers'   WHERE id = '$studentId'");
	}
		else
		{
			$result = mysqli_query($con,"UPDATE studentsData SET placementStatus = 0, $companyName = NULL , noOfOffers = '$noOfOffers'   WHERE id = '$studentId'");
			
		}

	$_SESSION['message'] = "Successfully you have deleted";
	header('location:viewStudentPlacedCompany.php?companyId='.$companyId);

}
?>