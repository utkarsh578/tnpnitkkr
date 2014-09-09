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
if ($_SERVER["REQUEST_METHOD"] == "GET")
{

	$result = mysqli_query($con,"SELECT * FROM studentsData where rollno=".$_GET['roll']."");
	$row = mysqli_fetch_array($result);
}
	if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$result = mysqli_query($con,"SELECT * FROM studentsData where rollno=".$_POST['roll']."");
$row = mysqli_fetch_array($result);
}
echo "<html><head>

<title>Student's Information</title>

<link rel='stylesheet' type='text/css' href='comm.css' />
<script src='jquery.min.js'></script>
<script src='comm.js'></script>

<link rel='stylesheet' type='text/css' href='searchstudent2.css' />
<style type='text/css'>
.tftable {font-size:12px;color:#333333;width:auto;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:16px;background-color:#acc8cc;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:center;}
.tftable tr {background-color:#ffffff;}
.tftable td {font-size:15px;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;}
.tftable tr:hover {background-color:#acc8cc;}
</style>
<link rel='stylesheet' type='text/css' href='searchstudent2.css' />
<script>

</script>
</head><body>

<h1 align='center'>NIT KURUSHETRA</h1>
<h2 align='center'>Student Details</h2>
<br>
<br>



<div id='header-wrap'>
	<div id='header-container'>
		<div id='header'>
			<img src='nitlogo.png' style='height:80px; width:80px; position:absolute; top:6px; left:-50px;'/>
			<h2 style='font-size:50px; color:white; position:absolute; top:15px; left:300px;'>NIT Placement</h2>
			
			<img id='btn1' src='set.png' width='39px' style='position:absolute; top:27px; right:0px; z-index:+1;' height='39px' onclick='f5()'/>
			<h2 id='name'><p style='position:absolute; right:30px;top:10px; cursor: default;'><a id='abc' href='frontpage.php'>Back</a></p></h2>

			</div>
	</div>
</div>


";
echo "<table style='position:absolute; left:250px; width:200px; top:173px' class='tftable' align='center' border='5px'><tr><th>Heading</th><th>Information</th></tr>";
echo "<tr><td>Name </td><td>".$row['name']."</td></tr>";
echo "<tr><td>Roll Number </td><td>".$row['rollno']."</td></tr>";
echo "<tr><td>E-Mail </td><td>".$row['email']."</td></tr>";
echo "<tr><td>Address </td><td>".$row['address']."</td></tr>";
echo "<tr><td>Contact Number: </td><td>".$row['contacts']."</td></tr>";
echo "<tr><td>Year </td><td>".$row['year']."</td></tr>";
echo "<tr><td>Degree </td><td>".$row['degree']."</td></tr>";
echo "<tr><td>Branch </td><td>".$row['branch']."</td></tr>";
if($row['subBranch']!=NULL)
echo "<tr><td>Sub-Branch </td><td>".$row['subBranch']."</td></tr>
</table>";
echo "<table style='position:absolute; left:750px; width:350px; top:173px;' class='tftable' align='center' border='5px'><tr><th>Heading</th><th>Information</th></tr>";
$stat="";
if($row['placementStatus'] == NULL)
{
	$stat = "Not Placed";
}
else if($row['placementStatus']==0){
$stat="Normal";}
else if($row['placementStatus']==1){
$stat="Dream";}
else if($row['placementStatus']==2){
$stat="SuperDream";}
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
echo "<tr><td>10th </td><td>".$row['10th']."</td></tr>";
echo "<tr><td>12th </td><td>".$row['12th']."</td></tr>";
echo "<tr><td>SGPA1 </td><td>".$row['sgpa1']."</td></tr>";
echo "<tr><td>SGPA2 </td><td>".$row['sgpa2']."</td></tr>";
echo "<tr><td>SGPA3 </td><td>".$row['sgpa3']."</td></tr>";
echo "<tr><td>SGPA4 </td><td>".$row['sgpa4']."</td></tr>";
echo "<tr><td>SGPA5 </td><td>".$row['sgpa5']."</td></tr>";
echo "<tr><td>CGPA </td><td>".$row['cgpa']."</td></tr>";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
echo "</table><a style='position:absolute; left:500px; font-size:20px; top:100px;' href='searchstudent3.php?roll=".$_POST['roll']."'>Edit</a>

<div id='footer-wrap'>
	<div id='footer-container'>
		<div id='footer'>
			<p style='color:white; font-size:12px; position:absolute; top:10px; right:-150px;'>Developed By <b style='font-size:15px;'>U</b>tkarsh, <b style='font-size:15px;'>H</b>imanshu <b style='font-size:15px;'>S</b>oni and <b style='font-size:15px;'>A</b>nirudh <b style='font-size:15px;'>A</b>garwal</p>
			<a style='color:white; font-size:18px; font-weight:bold; position:absolute; top:10px; left:415px;' href='http://www.nitkkr.ac.in' target='_blank'>NIT WEBSITE</a>
		</div>
	</div>
</div>
</body></html>";
}
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
echo "</table><a href='searchstudent3.php?roll=".$_GET['roll']."'>Edit</a>

<div id='footer-wrap'>
	<div id='footer-container'>
		<div id='footer'>
			<p style='color:white; font-size:12px; position:absolute; top:10px; right:-150px;'>Developed By <b style='font-size:15px;'>U</b>tkarsh, <b style='font-size:15px;'>H</b>imanshu <b style='font-size:15px;'>S</b>oni and <b style='font-size:15px;'>A</b>nirudh <b style='font-size:15px;'>A</b>garwal</p>
			<a style='color:white; font-size:18px; font-weight:bold; position:absolute; top:10px; left:415px;' href='http://www.nitkkr.ac.in' target='_blank'>NIT WEBSITE</a>
		</div>
	</div>
</div>
</body></html>";
}
?>
