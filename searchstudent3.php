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
$result = mysqli_query($con,"SELECT * FROM studentsData where rollno=".$_GET['roll']."");
//	id	rollno	name	email	contacts	year	degree	branch	placementStatus	companyName0	companyName1	noOfOffers
$row = mysqli_fetch_array($result);
echo "<html><head><title>Student's Information</title>
<link rel='stylesheet' type='text/css' href='searchstudent3.css' />
<style type='text/css'>
.tftable {position:relative; top:-30px;font-size:12px;color:#333333;width:40%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:20px;background-color:white;border-width: 1px;padding: 5px;border-style: solid;border-color: black;text-align:center;}
.tftable tr {background-color:#ffffff;}
.tftable td {font-size:18px;border-width: 1px;padding: 5px;border-style: solid;border-color: black;}
.tftable tr:hover {background-color:white;}
</style>
</head><body>

<h1 align='center'>NIT KURUSHETRA</h1>
<h2 align='center'>Student Details</h2>
<br>
<br>";
echo "<form action='searchstudent4.php' method='post'>
<table  class='tftable' align='center' border='5px'><tr><th>Heading</th><th>Information</th></tr>";
echo "<input type='hidden' name='id' value='".$row['id']."'></input>";
echo "<tr><td>Name : </td><td><input type='text' name='name' value='".$row['name']."'></input></td></tr>";
echo "<tr><td>Roll Number : </td><td><input type='text' name='rollno' value='".$row['rollno']."'></input></td></tr>";
echo "<tr><td>E-Mail : </td><td><input type='text' name='email' value='".$row['email']."'></input></td></tr>";
echo "<tr><td>Contact Number: </td><td><input type='text' name='contacts' value='".$row['contacts']."'></input></td></tr>";
echo "<tr><td>Year : </td><td><input type='text' name='year' value='".$row['year']."'></input></td></tr>";
echo "<tr><td>Degree : </td><td><input type='text' name='degree' value='".$row['degree']."'></input></td></tr>";
echo "<tr><td>Branch : </td><td><input type='text' name='branch' value='".$row['branch']."'></input></td></tr>";
if($row['subbranch']!=NULL)
echo "<tr><td>Sub-Branch : </td><td><input type='text' name='subbranch' value='".$row['subbranch']."'></input></td></tr>";
echo "<tr><td>SGPA1 : </td><td><input type='text' name='sgpa1' value=".$row['sgpa1']."></input></td></tr>";
echo "<tr><td>SGPA2 : </td><td><input type='text' name='sgpa2' value=".$row['sgpa2']."></input></td></tr>";
echo "<tr><td>SGPA3 : </td><td><input type='text' name='sgpa3' value=".$row['sgpa3']."></input></td></tr>";
echo "<tr><td>SGPA4 : </td><td><input type='text' name='sgpa4' value=".$row['sgpa4']."></input></td></tr>";
echo "<tr><td>SGPA5 : </td><td><input type='text' name='sgpa5' value=".$row['sgpa5']."></input></td></tr>";
echo "<tr><td>CGPA : </td><td><input type='text' name='cgpa' value='".$row['cgpa']."'></input></td></tr>";
echo "</table>
<input type='submit' id='sub' value='Submit'></form></body></html>";
?>