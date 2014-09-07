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
	$offer = $count1['offer'];
	$result = mysqli_query($con,"UPDATE company SET studentHired = '$totalHired' WHERE id = '$companyId'");

	$result = mysqli_query($con,"DELETE FROM studentPlaced WHERE studentId = '$studentId' AND companyId = '$companyId'");
	$result = mysqli_query($con,"SELECT * FROM studentsData WHERE id = '$studentId'");
	$count=mysqli_fetch_array($result);

	$noOfOffers = $count['noOfOffers'];
	//$offer = $count['placementStatus'];
	$noOfOffers = $noOfOffers-1;
	$companyName = "companyName".$offer;
	switch ($offer) {
		case 0:	
			if($count['companyName2']!=NULL)
			{
				$result = mysqli_query($con,"UPDATE studentsData SET placementStatus = 2 , $companyName = NULL , noOfOffers = '$noOfOffers'   WHERE id = '$studentId'");

			}
			else if($count['companyName1']!=NULL)
			{
				$result = mysqli_query($con,"UPDATE studentsData SET placementStatus = 1 , $companyName = NULL , noOfOffers = '$noOfOffers'   WHERE id = '$studentId'");

			}
			else
			{
				$result = mysqli_query($con,"UPDATE studentsData SET placementStatus = NULL , $companyName = NULL , noOfOffers = '$noOfOffers'   WHERE id = '$studentId'");

			}
			break;
		
		case 1:
			if($count['companyName2']!=NULL)
			{
				$result = mysqli_query($con,"UPDATE studentsData SET placementStatus = 2 , $companyName = NULL , noOfOffers = '$noOfOffers'   WHERE id = '$studentId'");

			}
			else if($count['companyName0']!=NULL)
			{
				$result = mysqli_query($con,"UPDATE studentsData SET placementStatus = NULL , $companyName = NULL , noOfOffers = '$noOfOffers'   WHERE id = '$studentId'");

			}
			else
			{
				$result = mysqli_query($con,"UPDATE studentsData SET placementStatus = NULL , $companyName = NULL , noOfOffers = '$noOfOffers'   WHERE id = '$studentId'");

			}
			break;
		case 2:
			if($count['companyName1']!=NULL)
			{
				$result = mysqli_query($con,"UPDATE studentsData SET placementStatus = 1 , $companyName = NULL , noOfOffers = '$noOfOffers'   WHERE id = '$studentId'");

			}
			else if($count['companyName0']!=NULL)
			{
				$result = mysqli_query($con,"UPDATE studentsData SET placementStatus = NULL , $companyName = NULL , noOfOffers = '$noOfOffers'   WHERE id = '$studentId'");

			}
			else
			{
				$result = mysqli_query($con,"UPDATE studentsData SET placementStatus = NULL , $companyName = NULL , noOfOffers = '$noOfOffers'   WHERE id = '$studentId'");

			}
			break;
	}


	

	$_SESSION['message'] = "Successfully you have deleted";
	header('location:viewStudentPlacedCompany.php?companyId='.$companyId);

}
?>