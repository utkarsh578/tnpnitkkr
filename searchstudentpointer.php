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
//echo $_POST['cgpa']." ".$_POST['year']." ".$_POST['degree'];
if(isset($_POST['subbranch']))
$result = mysqli_query($con,"SELECT * FROM studentsData where cgpa>=".$_POST['cgpa']." and year=".$_POST['year']." and degree='".$_POST['degree']."' and branch='".$_POST['branch']."' and subBranch='".$_POST['subbranch']."'");
else
$result = mysqli_query($con,"SELECT * FROM studentsData where cgpa>=".$_POST['cgpa']." and year=".$_POST['year']." and degree='".$_POST['degree']."' and branch='".$_POST['branch']."'");
echo "<html><head><title>View Student</title></head><body>";
echo "cgpa >= ".$_POST['cgpa']."<br>";
echo "year = ".$_POST['year']."<br>";
echo "degree = ".$_POST['degree']."<br>";
echo "branch = ".$_POST['branch']."<br>";
echo "subbranch = ".$_POST['subbranch']."<br>";
echo "<form action='studentinterested.php' method='post'><table border='5px'><tr>";
echo "<th>Name</th>";
echo "<th>RollNumber</th>";
echo "<th>E-Mail</th>";
echo "<th>Contact Number</th>";
echo "<th>Interested</th>";
echo "</tr>";
$count=0;
while($row = mysqli_fetch_array($result))
{
	$count++;
	echo "<tr><td>".$row['name']."</td>";
	echo "<td>".$row['rollno']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['contacts']."</td>";
	echo "<td><input type='checkbox' name='chk".$count."' value=".$row['id']."></td></tr>";
}
echo "<input type='hidden' name='count' value=".$count.">";
echo "</table><input type='submit' value='Generate'></form></body></html>";
?>