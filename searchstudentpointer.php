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
$result="";
//echo $_POST['cgpa']." ".$_POST['year']." ".$_POST['degree'];
if(isset($_POST['subbranch']))
$result = mysqli_query($con,"SELECT * FROM studentsData where cgpa>=".$_POST['cgpa']." and year=".$_POST['year']." and degree='".$_POST['degree']."' and branch='".$_POST['branch']."' and subBranch='".$_POST['subbranch']."'");
else
$result = mysqli_query($con,"SELECT * FROM studentsData where cgpa>=".$_POST['cgpa']." and year=".$_POST['year']." and degree='".$_POST['degree']."' and branch='".$_POST['branch']."'");
echo "<html><head><title>View Student</title>

<style type='text/css'>
.tftable {position:relative; top:50px;font-size:12px;color:#333333;width:auto;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:16px;background-color:#acc8cc;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:center;}
.tftable tr {background-color:#ffffff;}
.tftable td {font-size:15px;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;}
.tftable tr:hover {background-color:#acc8cc;}
</style>
<link rel='stylesheet' type='text/css' href='searchstudentpointer.css' />

</head>
<body>

<div id='header-wrap'>
	<div id='header-container'>
		<div id='header'>
			<img src='nitlogo.png' style='height:80px; width:80px; position:absolute; top:6px; left:-50px;'/>
			<h2 style='font-size:50px; color:white; position:absolute; top:15px; left:300px;'>NIT Placement</h2>
			
			<img id='btn1' src='set.png' width='39px' style='position:absolute; top:27px; right:0px; z-index:+1;' height='39px' onclick='f5()'/>
			<img id='btn2' src='set.png' width='39px' style='position:absolute; top:27px;  visibility:hidden; right:0px; z-index:+2;' height='39px' onclick='f6()'/>
			<h2 id='name'><p style='position:absolute; right:5px;top:11px; cursor: default;' ><?php echo $name ?></p></h2>
			<h2 id='change'><p style='position:absolute; left:30px;top:12px;'><a id='abc' href='frontpage.php'>Back</a></p></h2>
			<h2 id='log'><p style='position:absolute; right:15px;top:12px;'><a id='abc' href='#'>Sign Out</a></p></h2>
			</div>
	</div>
</div>
";
echo "cgpa >= ".$_POST['cgpa']."<br>";
echo "year = ".$_POST['year']."<br>";
echo "degree = ".$_POST['degree']."<br>";
echo "branch = ".$_POST['branch']."<br>";
if(isset($_POST['subBranch'])){
echo "subBranch = ".$_POST['subBranch']."<br>";}
echo "<form action='studentinterested.php' target='_blank' method='post'><center><table class='tftable'  id='table1' border='5px'><thead><tr>";
echo "<th>Roll No.</th>";
echo "<th>Name</th>";
echo "<th>E-Mail</th>";
echo "<th>Contact Number</th>";
echo "<th>CGPA</th>";
echo "<th>Interested</th>";
echo "</tr></thead>
<tbody>";
$count=0;
while($row = mysqli_fetch_array($result))
{
	$count++;
	echo "<tr><td>".$row['rollno']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['contacts']."</td>";
	echo "<td>".$row['cgpa']."</td>";
	echo "<td><input type='checkbox' name='chk".$count."' id='chk".$count."' value=".$row['id']."><label for='chk".$count."'></label></input></td></tr>";
}
echo "<input type='hidden' name='count' value=".$count.">";
echo "</tbody></table></center><input type='submit' id='submit' value='Generate'></form>

<div id='footer-wrap'>
	<div id='footer-container'>
		<div id='footer'>
			<p style='color:white; font-size:12px; position:absolute; top:10px; right:-150px;'>Developed By <b style='font-size:15px;'>U</b>tkarsh, <b style='font-size:15px;'>H</b>imanshu <b style='font-size:15px;'>S</b>oni and <b style='font-size:15px;'>A</b>nirudh <b style='font-size:15px;'>A</b>garwal</p>
			<a style='color:white; font-size:18px; font-weight:bold; position:absolute; top:10px; left:415px;' href='http://www.nitkkr.ac.in' target='_blank'>NIT WEBSITE</a>
		</div>
	</div>
</div>
";
?>


<html>
<head>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<link rel="stylesheet" type="text/css" href="comm.css" />
<script src="comm.js"></script>

<script language="javascript" type="text/javascript">

        $(document).ready(function () {
            $("#table1").freezeHeader({ 'height': '500px' });
        })
</script>
<title>Training & Placement</title>
</head>
<body>


</body></html>