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
	include 'db_connect.php';
	if(isset($_POST["degree"]))
	{
		$degree = $_POST["degree"];
	}
	else
	{
		$companyId = "";
	}
	if(isset($_POST["branch"]))
	{
		$branch = $_POST["branch"];
	}
	else
	{
		$branch = "";
	}

$result = mysqli_query($con,"SELECT * FROM attendance LEFT  JOIN studentsData ON attendance.rollno = studentsData.rollno WHERE studentsData.degree = '$degree' AND studentsData.branch = '$branch' ORDER BY studentsData.rollno  ");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type='text/css'>
.tftable {position:relative; top:-30px;font-size:12px;color:#333333;width:80%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:20px;background-color:white;border-width: 1px;padding: 8px;border-style: solid;border-color: black;text-align:center;}
.tftable tr {background-color:#ffffff;}
.tftable td {font-size:18px;border-width: 1px;padding: 8px;border-style: solid;border-color: black;}
.tftable tr:hover {background-color:white;}
</style>

</head>
<body>
<h1 align="center">TRAINING & PLACEMENT, NIT KURUSHETRA</h1>
<h2 align="center">Attendance Report</h2>
<center><h3>Degree: <?php echo $degree; ?>&nbsp;&nbsp;&nbsp;&nbsp;Branch: <?php echo $branch; ?></h3></center>
<br>
<br>
<br>
<table class="tftable" border="1" align="center">
		<tr>
			<th>Name</th>
			<th>Roll No</th>
			<th>Date</th>
		</tr>
		<?php while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['rollno']."</td>";
		$totalDays = substr($row['totalDays'], 1);
		echo "<td>".$totalDays."</td>";
		echo "</tr>";
	}
	?>
	</table>
	<h3 align="right">Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Training & Placement Officer&nbsp;&nbsp;&nbsp;</h3>
</body>
</body>
</html>
