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
include "db_connect.php";
$result="";
echo $_POST['cgpa']." ".$_POST['year']." ".$_POST['degree'];
//if(isset($_POST['subbranch']))
//$result = mysqli_query($con,"SELECT * FROM studentsData where cgpa>=".$_POST['cgpa']." and year=".$_POST['year']." and degree='".$_POST['degree']."' and branch='".$_POST['branch']."' and subbranch='".$_POST['subbranch']."'");
//else
$result = mysqli_query($con,"SELECT * FROM studentsData where cgpa>=".$_POST['cgpa']." and year=".$_POST['year']." and degree='".$_POST['degree']."' and branch='".$_POST['branch']."'");
echo "<html><head><title>View Student</title></head><body>";
echo "<table border='5px'><tr>";
echo "<th>Name</th>";
echo "<th>RollNumber</th>";
echo "<th>E-Mail</th>";
echo "<th>Contact Number</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
{
	echo "<tr><td>".$row['name']."</td>";
	echo "<td>".$row['rollno']."</td>";
	echo "<td>".$row['email']."</td>";

	echo "<td>".$row['contacts']."</td></tr>";
}
echo "</table></body></html>";
?>