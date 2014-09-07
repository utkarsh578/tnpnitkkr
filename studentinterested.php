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
echo "<html><head><title>View Student</title>
<style type='text/css'>
.tftable {position:relative; top:-30px;font-size:12px;color:#333333;width:auto;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:20px;background-color:white;border-width: 1px;padding: 8px;border-style: solid;border-color: black;text-align:center;}
.tftable tr {background-color:#ffffff;}
.tftable td {font-size:18px;border-width: 1px;padding: 8px;border-style: solid;border-color: black;}
.tftable tr:hover {background-color:white;}
</style>

</head><body>
<h1 align='center'>TRAINING & PLACEMENT, NIT KURUSHETRA</h1>
<h2 align='center'>Students Interested</h2>
<center><h3></h3></center>
<br>
<br>
<br>
";
echo "<table class='tftable' border='1' align='center'><tr>";
echo "<th>Roll No.</th>";
echo "<th>Name</th>";
echo "<th>E-Mail</th>";
echo "<th>Contact Number</th>";
echo "<th>Cgpa</th>";

echo "</tr>";
for($i=1;$i<=$_POST['count'];$i++)
{
	if(isset($_POST["chk".$i]))
	{
		$result = mysqli_query($con,"SELECT * FROM studentsData where id=".$_POST["chk".$i]);
		$row = mysqli_fetch_array($result);
		echo "<tr><td>".$row['rollno']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['contacts']."</td>";
		echo "<td>".$row['cgpa']."</td>";
		echo "</tr>";
	}
}
echo "</table></body></html>";
?>