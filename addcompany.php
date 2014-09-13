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
if(isset($_SESSION['company']))
{
	echo "<h3>".$_SESSION['company']." Added <h3><br>";
	unset($_SESSION['company']);
}
?>
<html>
<head>
<title>Add Company</title>
</head>
<body>
<form action="addcompany2.php" method="post">
<table>
<tr>
<th>Entries</th>
<th>Values</th>
</tr>
<tr>
<td>Company Name :</td>
<td><input type="text" name="name" ></td>
</tr>
<tr>
<td>Package :</td>
<td><input type="text" name="package"></td>
</tr>
<tr>
<td>Status :</td>
<td><input type="radio" name="status" value="normal">Normal <input type="radio" name="status" value="dream">Dream <input type="radio" name="status" value="superdream">SuperDream</td>
</tr>
<tr>
<td>Date of Visit :</td>
<td><input type="date" name="date_of_visit"></td>
</tr>
<tr>
<td>Number of Days :</td>
<td><input type="text" name="no_of_days"></td>
</tr>
<tr>
<td>PAC Member :</td>
<td><input type="text" name="pac_member"></td>
</tr>
<tr>
<td>
<input type="submit" value="Submit">
</td>
</tr>
</table>
</form>
</body>
</html>