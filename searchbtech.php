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
<center><h3>Degree:</h3></center>
<br>
<br>
<br>
<table class='tftable' border='5px' align='center'><tr>";
echo "<th>Company Name</th>";
echo "<th>Computer</th>";
echo "<th>Electronics</th>";
echo "<th>IT</th>";
echo "<th>Electrical</th>";
echo "<th>Mechanical</th>";
echo "<th>IEM</th>";
echo "<th>Civil</th></tr>";
$com=0;
$ece=0;
$it=0;
$ele=0;
$mec=0;
$iem=0;
$civ=0;
$result = mysqli_query($con,"SELECT * FROM company");
while($row = mysqli_fetch_array($result)) {
	echo "<tr><td>".$row['companyName']."</td>";
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where companyName".$row['offer']."=".$row['id']." and degree='B.Tech' and branch='Computer'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$com+=$count;
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where companyName".$row['offer']."=".$row['id']." and degree='B.Tech' and branch='Electronics'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$ece+=$count;
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where companyName".$row['offer']."=".$row['id']." and degree='B.Tech' and branch='IT'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$it+=$count;
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where companyName".$row['offer']."=".$row['id']." and degree='B.Tech' and branch='Electrical'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$ele+=$count;
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where companyName".$row['offer']."=".$row['id']." and degree='B.Tech' and branch='Mechanical'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$mec+=$count;
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where companyName".$row['offer']."=".$row['id']." and degree='B.Tech' and branch='IEM'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$iem+=$count;
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where companyName".$row['offer']."=".$row['id']." and degree='B.Tech' and branch='Civil'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$civ+=$count;
	echo "<tr>";
}
echo "<tr><td><b>Total Placed : </b></td><td>".$com."</td><td>".$ece."</td><td>".$it."</td><td>".$ele."</td><td>".$mec."</td><td>".$iem."</td><td>".$civ."</td></tr>";
echo "<tr><td><b>Total Students : </b></td>";
$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where degree='B.Tech' and branch='Computer'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where degree='B.Tech' and branch='Electronics'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where degree='B.Tech' and branch='IT'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where degree='B.Tech' and branch='Electrical'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where degree='B.Tech' and branch='Mechanical'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where degree='B.Tech' and branch='IEM'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
$result1= mysqli_query($con,"SELECT count(*) FROM studentsData where degree='B.Tech' and branch='Civil'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td></tr>";
echo "</table><a id='sub' href='#' onclick='f1()'>Print</a></body></html>";
mysqli_close($con);
?>