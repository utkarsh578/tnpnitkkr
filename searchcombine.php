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
.tftable {position:relative; top:-30px;font-size:12px;color:#333333;width:80%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:20px;background-color:white;border-width: 1px;padding: 8px;border-style: solid;border-color: black;text-align:center;}
.tftable tr {background-color:#ffffff;}
.tftable td {font-size:18px;border-width: 1px;padding: 8px;border-style: solid;border-color: black;}
.tftable tr:hover {background-color:white;}
</style>
<link rel='stylesheet' type='text/css' href='table.css' />
<script>
function f1(){
document.getElementById('sub').style.display='none';
window.print();
}
</script>
</head><body>";
echo "
<h1 align='center'>NIT KURUSHETRA</h1>
<h2 align='center'>Placement Report</h2>
<center></center>
<br>
<br>
<br>
<table class='tftable' border='5px' align='center'><tr>";
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
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where companyName".$row['offer']."=".$row['id']." and degree='B.Tech'");
	//echo "SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='B.tech'";
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$countb+=$count;
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where companyName".$row['offer']."=".$row['id']." and degree='M.Tech'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$countm+=$count;
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where companyName".$row['offer']."=".$row['id']." and degree='MBA'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$countmb+=$count;
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where companyName".$row['offer']."=".$row['id']." and degree='MCA'");
	$row1 = mysqli_fetch_array($result1);
	$countmc+=$count;
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	echo "</tr>";
}
echo "<tr><td><b>Total Placed : </b></td><td>".$countb."</td><td>".$countm."</td><td>".$countmb."</td><td>".$countmc."</td></tr>";
$result = mysqli_query($con,"SELECT count(*) FROM studentsData where degree='B.Tech'");
$row = mysqli_fetch_array($result);
$totalb=$row['count(*)'];
$result = mysqli_query($con,"SELECT count(*) FROM studentsData where degree='M.Tech'");
$row = mysqli_fetch_array($result);
$totalm=$row['count(*)'];
$result = mysqli_query($con,"SELECT count(*) FROM studentsData where degree='MBA'");
$row = mysqli_fetch_array($result);
$totalmb=$row['count(*)'];
$result = mysqli_query($con,"SELECT count(*) FROM studentsData where degree='MCA'");
$row = mysqli_fetch_array($result);
$totalmc=$row['count(*)'];
echo "<tr>";
echo "<tr><td><b>Total Students : </b></td><td>".$totalb."</td><td>".$totalm."</td><td>".$totalmb."</td><td>".$totalmc."</td></tr>";
echo "</table><a id='sub' href='#' onclick='f1()'>Print</a></body></html>";
mysqli_close($con);
?>