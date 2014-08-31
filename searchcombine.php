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
echo "<html><head><title>Placement Combined</title>
<style type='text/css'>
.tftable {font-size:12px;color:#333333;width:60%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:20px;background-color:#acc8cc;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:left;}
.tftable tr {background-color:#ffffff;}
.tftable td {font-size:18px;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;}
.tftable tr:hover {background-color:#acc8cc;}
</style>
</head><body>";
echo "<table class='tftable' border='5px'><tr>";
echo "<th>Company Name</th>";
echo "<th>B.Tech</th>";
echo "<th>M.Tech</th>";
echo "<th>MBA</th>";
echo "<th>MCA</th></tr>";
$countb=0;
$countm=0;
$countmb=0;
$countmc=0;
$result = mysqli_query($con,"SELECT * FROM company");
while($row = mysqli_fetch_array($result)) {
	echo "<tr><td>".$row['companyName']."</td>";
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='B.tech'");
	//echo "SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='B.tech'";
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$countb+=$count;
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='M.tech'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$countm+=$count;
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='MBA'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$countmb+=$count;
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='MCA'");
	$row1 = mysqli_fetch_array($result1);
	$countmc+=$count;
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	echo "</tr>";
}
echo "<tr><td>Total Placed : </td><td>".$countb."</td><td>".$countm."</td><td>".$countmb."</td><td>".$countmc."</td></tr>";
echo "</table></body></html>";
mysqli_close($con);
?>