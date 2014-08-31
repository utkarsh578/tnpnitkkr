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
$value = 1;
include 'db_connect.php';

$result = mysqli_query($con,"SELECT * FROM company");
//$count=mysqli_fetch_array($result);
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	if(isset($_GET["companyId"]))
	{
		$companyId = $_GET["companyId"];
		$value = $companyId;
	}
	else
	{
		$companyId = "";
	}

	$result1 = mysqli_query($con,"SELECT * FROM studentCompanyAttended LEFT JOIN studentsData ON studentCompanyAttended.studentId = studentsData.id WHERE studentCompanyAttended.companyId = '$companyId'");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

	if(isset($_POST["companyId"]))
	{
		$companyId = $_POST["companyId"];
		$value = $companyId;

	}
	else
	{
		$companyId = "";
	}
	


	$result1 = mysqli_query($con,"SELECT * FROM studentCompanyAttended LEFT JOIN studentsData ON studentCompanyAttended.studentId = studentsData.id WHERE studentCompanyAttended.companyId = '$companyId'");
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title> Update student placement detail</title>
</head>
<body>
	<?php
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);

	}

 ?>
	<form method="post" action="deleteAttendance.php">
		Company Name: <select name="companyId" value = <?php echo $value; ?>>
		<?php
			while ($row = mysqli_fetch_array($result)) {

				echo "<option value=".$row['id']; if($value == $row['id']){echo " selected =".$row['id'].">".$row['companyName']."</option>";}else{ echo ">".$row['companyName']."</option>";}
			}
		?>
		</select><br>
		<input type="submit" value="Submit"><br>

		</form>
	<table>
	<tr>
		<th>Name</th>
		<th>Roll No</th>
		<th>Brnach</th>
	</tr>
	<?php while ($row = mysqli_fetch_array($result1)) {
		echo "<tr>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['rollno']."</td>";
		echo "<td>".$row['branch']."</td>";
		echo "<td>".$row['dateCompany']."</td>";
		$studentId = $row['id'];
		echo "<td><a href = deleteStudentAttendance.php?studentId=".$studentId."&companyId=".$companyId."&rollno=".$row['rollno']."&date=".$row['dateCompany'].">Delete</a></td>";
		echo "</tr>";
	}
	?>
</table>

</body>
</html>