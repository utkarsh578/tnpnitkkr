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
echo "<html><head><title>View Student</title></head><body>";
echo "<table border='5px'><tr>";
echo "<th>Name</th>";
echo "<th>RollNumber</th>";
echo "<th>E-Mail</th>";
echo "<th>Contact Number</th>";
echo "</tr>";
for($i=1;$i<=$_POST['count'];$i++)
{
	if(isset($_POST["chk".$i]))
	{
		$result = mysqli_query($con,"SELECT * FROM studentsData where id=".$_POST["chk".$i]);
		$row = mysqli_fetch_array($result);
		echo "<tr><td>".$row['name']."</td>";
		echo "<td>".$row['rollno']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['contacts']."</td>";
		echo "</tr>";
	}
}
echo "</table></body></html>";
?>