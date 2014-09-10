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
	$attendance = "";
	$flag = 0;
	$notFound = "";
	$found = "";
	if(isset($_POST["companyId"]))
	{
		$companyId = $_POST["companyId"];
	}
	else
	{
		$companyId = "";
	}
	if(isset($_POST["date"]))
	{
		$date = $_POST["date"];
		$dateCompany = $date;
	}
	else
	{
		$date = "";
	}
		if(isset($_POST["date"]))
	{
		$date = $_POST["date"];
	}
	else
	{
		$date = "";
	}
	


	include 'db_connect.php';
	if(!empty($_POST["rollno1"]))
	{
		$attendance = "";
		$rollno = $_POST["rollno1"];
		//echo $rollno;
		$result = mysqli_query($con,"SELECT * FROM studentsData WHERE rollno = '$rollno'");
		$count = mysqli_fetch_array($result);

		if(empty($count['id']))
		{
		$flag = 1;
		$notFound = $_POST["rollno1"];
		}
		else
		{
			$studentId = $count['id'];
			$result = mysqli_query($con,"SELECT * FROM studentCompanyAttended WHERE studentId = '$studentId' AND companyId = '$companyId' AND dateCompany = '$dateCompany' ");
			$count = mysqli_fetch_array($result);
			$found = $_POST["rollno1"];
		if(empty($count['id'])){
			//echo "inside count ";
			$a = $companyId;
			$b = $studentId;
			$c = $date;
			mysqli_query($con,"INSERT INTO studentCompanyAttended (companyId,studentId,dateCompany) VALUES ('$a','$b','$c')");
			$result = mysqli_query($con,"SELECT * FROM attendance WHERE rollno = '$rollno'");
			$count = mysqli_fetch_array($result);
			$result1 = mysqli_query($con,"SELECT * FROM company WHERE id = '$companyId'");
			$count1 = mysqli_fetch_array($result1);
			if(!empty($count['totalDays']))
			{
				$attendance = $count['totalDays'];
			}
			$noOfDays = $count1['noOfDays'];
			$date1=date_create($date);
			date_add($date1,date_interval_create_from_date_string("0 days"));
			$dateTemp = date_format($date1,"d-m");
			if(strstr($attendance, $dateTemp)!=0)
			{
				echo "found";
			}
			else
			{
				$attendance = $attendance.",".date_format($date1,"d-m");
				echo "not found";
			}
			
			if(empty($count['rollno']))
			{
				$result = mysqli_query($con,"INSERT INTO attendance (rollno,totalDays) VALUES ('$rollno','$attendance')");

			}
			else
			{
				$result = mysqli_query($con,"UPDATE attendance SET totalDays = '$attendance' WHERE rollno = '$rollno'");

			}
			}
			

		}
		$rollno=$studentId=$result1=$count=$count1="";

	}
	if(!empty($_POST["rollno2"]))
	{
		$attendance = "";
		$rollno = $_POST["rollno2"];
		//echo $rollno;
		$result = mysqli_query($con,"SELECT * FROM studentsData WHERE rollno = '$rollno'");
		$count = mysqli_fetch_array($result);

		if(empty($count['id']))
		{
		$flag = 1;
		$notFound = $notFound."<br>".$_POST["rollno2"];
		}
		else
		{
			$studentId = $count['id'];
			$result = mysqli_query($con,"SELECT * FROM studentCompanyAttended WHERE studentId = '$studentId' AND companyId = '$companyId' AND dateCompany = '$dateCompany' ");
			$count = mysqli_fetch_array($result);
			$found = $found."<br>".$_POST["rollno2"];
		if(empty($count['id'])){
			$result = mysqli_query($con,"INSERT INTO studentCompanyAttended (companyId,studentId,dateCompany) VALUES ('$companyId','$studentId','$date')");
			$result = mysqli_query($con,"SELECT * FROM attendance WHERE rollno = '$rollno'");
			$count = mysqli_fetch_array($result);
			$result1 = mysqli_query($con,"SELECT * FROM company WHERE id = '$companyId'");
			$count1 = mysqli_fetch_array($result1);
			if(!empty($count['totalDays']))
			{
				$attendance = $count['totalDays'];
			}
			$noOfDays = $count1['noOfDays'];
			$date2=date_create($date);
			date_add($date2,date_interval_create_from_date_string("0 days"));
			$dateTemp = date_format($date2,"d-m");
			if(strstr($attendance, $dateTemp)!=0)
			{
				
			}
			else
			{
				$attendance = $attendance.",".date_format($date2,"d-m");
				
			}
			//return;
			//$attendance = $attendance.",".date_format($date2,"d-m");
			
			if(empty($count['rollno']))
			{
				$result = mysqli_query($con,"INSERT INTO attendance (rollno,totalDays) VALUES ('$rollno','$attendance')");

			}
			else
			{
				$result = mysqli_query($con,"UPDATE attendance SET totalDays = '$attendance' WHERE rollno = '$rollno'");

			}
			}
			

		}
		$rollno=$studentId=$result1=$count=$count1="";

	}
	if(!empty($_POST["rollno3"]))
	{
		$attendance = "";
		$rollno = $_POST["rollno3"];
		//echo $rollno;
		$result = mysqli_query($con,"SELECT * FROM studentsData WHERE rollno = '$rollno'");
		$count = mysqli_fetch_array($result);

		if(empty($count['id']))
		{
		$flag = 1;
		$notFound = $notFound."<br>".$_POST["rollno3"];
		}
		else
		{
			$studentId = $count['id'];
			$result = mysqli_query($con,"SELECT * FROM studentCompanyAttended WHERE studentId = '$studentId' AND companyId = '$companyId' AND dateCompany = '$dateCompany' ");
			$count = mysqli_fetch_array($result);
			$found = $found."<br>".$_POST["rollno3"];
		if(empty($count['id'])){
			//echo "string companyId = ".$companyId."studentId = ".$studentId."date = ".$date;
			$result = mysqli_query($con,"INSERT INTO studentCompanyAttended (companyId,studentId,dateCompany) VALUES ('$companyId','$studentId','$date')");
			$result = mysqli_query($con,"SELECT * FROM attendance WHERE rollno = '$rollno'");
			$count = mysqli_fetch_array($result);
			$result1 = mysqli_query($con,"SELECT * FROM company WHERE id = '$companyId'");
			$count1 = mysqli_fetch_array($result1);
			if(!empty($count['totalDays']))
			{
				$attendance = $count['totalDays'];
			}
			$noOfDays = $count1['noOfDays'];
			$date3=date_create($date);
			date_add($date3,date_interval_create_from_date_string("0 days"));
			$dateTemp = date_format($date3,"d-m");
			if(strstr($attendance, $dateTemp)!=0)
			{
				
			}
			else
			{
				$attendance = $attendance.",".date_format($date3,"d-m");
				
			}
			
			if(empty($count['rollno']))
			{
				$result = mysqli_query($con,"INSERT INTO attendance (rollno,totalDays) VALUES ('$rollno','$attendance')");

			}
			else
			{
				$result = mysqli_query($con,"UPDATE attendance SET totalDays = '$attendance' WHERE rollno = '$rollno'");

			}
			}
			

		}
		$rollno=$studentId=$result1=$count=$count1="";

	}
	if(!empty($_POST["rollno4"]))
	{
		$attendance = "";
		$rollno = $_POST["rollno4"];
		//echo $rollno;
		$result = mysqli_query($con,"SELECT * FROM studentsData WHERE rollno = '$rollno'");
		$count = mysqli_fetch_array($result);

		if(empty($count['id']))
		{
		$flag = 1;
		$notFound = $notFound."<br>".$_POST["rollno4"];
		}
		else
		{
			$studentId = $count['id'];
			$result = mysqli_query($con,"SELECT * FROM studentCompanyAttended WHERE studentId = '$studentId' AND companyId = '$companyId' AND dateCompany = '$dateCompany' ");
			$count = mysqli_fetch_array($result);
			$found = $found."<br>".$_POST["rollno4"];
		if(empty($count['id'])){
			//echo "string companyId = ".$companyId."studentId = ".$studentId."date = ".$date;
			$result = mysqli_query($con,"INSERT INTO studentCompanyAttended (companyId,studentId,dateCompany) VALUES ('$companyId','$studentId','$date')");
			$result = mysqli_query($con,"SELECT * FROM attendance WHERE rollno = '$rollno'");
			$count = mysqli_fetch_array($result);
			$result1 = mysqli_query($con,"SELECT * FROM company WHERE id = '$companyId'");
			$count1 = mysqli_fetch_array($result1);
			if(!empty($count['totalDays']))
			{
				$attendance = $count['totalDays'];
			}
			$noOfDays = $count1['noOfDays'];
			$date4=date_create($date);
			date_add($date4,date_interval_create_from_date_string("0 days"));
			$dateTemp = date_format($date4,"d-m");
			if(strstr($attendance, $dateTemp)!=0)
			{
				
			}
			else
			{
				$attendance = $attendance.",".date_format($date4,"d-m");
				
			}
			
			if(empty($count['rollno']))
			{
				$result = mysqli_query($con,"INSERT INTO attendance (rollno,totalDays) VALUES ('$rollno','$attendance')");

			}
			else
			{
				$result = mysqli_query($con,"UPDATE attendance SET totalDays = '$attendance' WHERE rollno = '$rollno'");

			}
			}
			

		}
		$rollno=$studentId=$result1=$count=$count1="";

	}
	if(!empty($_POST["rollno5"]))
	{
		$attendance = "";
		$rollno = $_POST["rollno5"];
		//echo $rollno;
		$result = mysqli_query($con,"SELECT * FROM studentsData WHERE rollno = '$rollno'");
		$count = mysqli_fetch_array($result);

		if(empty($count['id']))
		{
		$flag = 1;
		$notFound = $notFound."<br>".$_POST["rollno5"];
		}
		else
		{
			$studentId = $count['id'];
			$result = mysqli_query($con,"SELECT * FROM studentCompanyAttended WHERE studentId = '$studentId' AND companyId = '$companyId' AND dateCompany = '$dateCompany' ");
			$count = mysqli_fetch_array($result);
			$found = $found."<br>".$_POST["rollno5"];
		if(empty($count['id'])){
			//echo "string companyId = ".$companyId."studentId = ".$studentId."date = ".$date;
			$result = mysqli_query($con,"INSERT INTO studentCompanyAttended (companyId,studentId,dateCompany) VALUES ('$companyId','$studentId','$date')");
			$result = mysqli_query($con,"SELECT * FROM attendance WHERE rollno = '$rollno'");
			$count = mysqli_fetch_array($result);
			$result1 = mysqli_query($con,"SELECT * FROM company WHERE id = '$companyId'");
			$count1 = mysqli_fetch_array($result1);
			if(!empty($count['totalDays']))
			{
				$attendance = $count['totalDays'];
			}
			$noOfDays = $count1['noOfDays'];
			$date5=date_create($date);
			date_add($date5,date_interval_create_from_date_string("0 days"));
			$dateTemp = date_format($date5,"d-m");
			if(strstr($attendance, $dateTemp)!=0)
			{
				
			}
			else
			{
				$attendance = $attendance.",".date_format($date5,"d-m");
				
			}
			
			if(empty($count['rollno']))
			{
				$result = mysqli_query($con,"INSERT INTO attendance (rollno,totalDays) VALUES ('$rollno','$attendance')");

			}
			else
			{
				$result = mysqli_query($con,"UPDATE attendance SET totalDays = '$attendance' WHERE rollno = '$rollno'");

			}
			}
			

		}
		$rollno=$studentId=$result1=$count=$count1="";

	}
	if($flag == 0)
	{
		$_SESSION['message'] = "Successfully you have added the attendance of the following students :<br>".$found;
		header("location:addStudentAttendance.php?companyId=".$companyId."&date=".$date);
	}
	if($flag == 1)
	{
		$_SESSION['message'] = "Successfully you have the attendance of the following students :".$found." <br>"."Following students are not found in database".$notFound;
		header("location:addStudentAttendance.php?companyId=".$companyId."&date=".$date);

	}

} 
?>