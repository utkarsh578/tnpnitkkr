<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("location:http://localhost/tnp/loginpage.php");
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
echo "<th>CS</th>";
echo "<th>ECE</th>";
echo "<th>IT</th>";
echo "<th>ELEC</th>";
echo "<th>MECH</th>";
echo "<th>IEM</th></tr>";
$result = mysqli_query($con,"SELECT * FROM company");
while($row = mysqli_fetch_array($result)) {
	echo "<tr><td>".$row['companyName']."</td>";
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='B.tech' and branch='CS'");
	//echo "SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='B.tech'";
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='B.tech' and branch='ECE'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='B.tech' and branch='IT'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='B.tech' and branch='ELEC'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='B.tech' and branch='MECH'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	$count=0;
	$result1= mysqli_query($con,"SELECT count(*) FROM studentsdata where companyName".$row['offer']."=".$row['id']." and degree='B.tech' and branch='IEM'");
	$row1 = mysqli_fetch_array($result1);
	$count=$row1['count(*)'];
	echo "<td>".$count."</td>";
	echo "<tr>";
}
echo "</table></body></html>";
mysqli_close($con);
?>