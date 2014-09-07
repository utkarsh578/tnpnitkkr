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
$result = mysqli_query($con,"SELECT * FROM studentsData where rollno=".$_POST['roll']."");
$row = mysqli_fetch_array($result);
echo "<html><head><title>Student's Information</title>
<link rel='stylesheet' type='text/css' href='searchstudent2.css' />
<style type='text/css'>
.tftable {position:relative; top:-30px;font-size:12px;color:#333333;width:60%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:20px;background-color:white;border-width: 1px;padding: 5px;border-style: solid;border-color: black; text-align:center;}
.tftable tr {background-color:#ffffff; }
.tftable td {font-size:18px;border-width: 1px;padding: 5px;border-style: solid;border-color: black;}
.tftable tr:hover {background-color:white;}
</style>
<script>
function f1(){
document.getElementById('sub').style.display='none';
document.getElementById('sub2').style.display='none';
window.print();
}
</script>
</head><body>

<h1 align='center'>NIT KURUSHETRA</h1>
<h2 align='center'>Student Details</h2>
<br>
<br>
";
echo "<table  class='tftable' align='center' border='5px'><tr><th>Heading</th><th>Information</th></tr>";
echo "<tr><td>Name </td><td>".$row['name']."</td></tr>";
echo "<tr><td>Roll Number </td><td>".$row['rollno']."</td></tr>";
echo "<tr><td>E-Mail </td><td>".$row['email']."</td></tr>";
echo "<tr><td>Contact Number: </td><td>".$row['contacts']."</td></tr>";
echo "<tr><td>Year </td><td>".$row['year']."</td></tr>";
echo "<tr><td>Degree </td><td>".$row['degree']."</td></tr>";
echo "<tr><td>Branch </td><td>".$row['branch']."</td></tr>";
if($row['subbranch']!=NULL)
echo "<tr><td>Sub-Branch </td><td>".$row['subbranch']."</td></tr>";
$stat="";
if($row['placementStatus']==0)
$stat="Normal";
if($row['placementStatus']==1)
$stat="Dream";
if($row['placementStatus']==2)
$stat="SuperDream";
echo "<tr><td>Status </td><td>".$stat."</td></tr>";
if($row['companyName0']!=NULL)
{
$result1 = mysqli_query($con,"SELECT companyName FROM company where id=".$row['companyName0']."");
$row1 = mysqli_fetch_array($result1);
echo "<tr><td>Normal Company </td><td>".$row1['companyName']."</td></tr>";
}
if($row['companyName1']!=NULL)
{
$result1 = mysqli_query($con,"SELECT companyName FROM company where id=".$row['companyName1']."");
$row1 = mysqli_fetch_array($result1);
echo "<tr><td>Dream Company </td><td>".$row1['companyName']."</td></tr>";
}
if($row['companyName2']!=NULL)
{
$result1 = mysqli_query($con,"SELECT companyName FROM company where id=".$row['companyName2']."");
$row1 = mysqli_fetch_array($result1);
echo "<tr><td>SuperDream Company </td><td>".$row1['companyName']."</td></tr>";
}
echo "<tr><td>No Of Offers </td><td>".$row['noOfOffers']."</td></tr>";
echo "<tr><td>SGPA1 </td><td>".$row['sgpa1']."</td></tr>";
echo "<tr><td>SGPA2 </td><td>".$row['sgpa2']."</td></tr>";
echo "<tr><td>SGPA3 </td><td>".$row['sgpa3']."</td></tr>";
echo "<tr><td>SGPA4 </td><td>".$row['sgpa4']."</td></tr>";
echo "<tr><td>SGPA5 </td><td>".$row['sgpa5']."</td></tr>";
echo "<tr><td>CGPA </td><td>".$row['cgpa']."</td></tr>";
echo "</table><a id='sub' href='searchstudent3.php?roll=".$_POST['roll']."'>Edit</a><a id='sub2' href='#' onclick='f1()'>Print</a></body></html>";
?>
