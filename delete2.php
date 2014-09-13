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

if(isset($_SESSION['action']) && $_SESSION['action']==1)
{
  //echo "<h3>Record Edited</h3><br>";
  unset($_SESSION['action']);
}
if(isset($_SESSION['action']) && $_SESSION['action']==2)
{
  //echo "<h3>Record Deleted</h3><br>";
  unset($_SESSION['action']);
}
include "db_connect.php";
echo "<html>
<head>
<title>View Company</title>
<style type='text/css'>
.tftable {position:relative; top:110px;font-size:12px;color:#333333;width:auto;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:16px;background-color:#acc8cc;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:center;}
.tftable tr {background-color:#ffffff;}
.tftable td {font-size:15px;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;}
.tftable tr:hover {background-color:#acc8cc;}
</style>
<link rel='stylesheet' type='text/css' href='viewcompany.css' />

</head>
<body>


";
echo "<center><table class='tftable' id='table1' border='5px'>
<thead><tr>";
echo "<th>Name</th>";
echo "<th>Package</th>";
echo "<th>Status</th>";
echo "<th>Date of Visit</th>";
echo "<th>No of Days</th>";
echo "<th>Pac Member</th>";
echo "<th>HR Name</th>";
echo "<th>HR Phone</th>";
echo "<th>HR Email</th>";
echo "<th>Students Hired</th>
<th>Edit</th>
<th>Del</th>
</tr>
</thead>
<tbody>";
$result = mysqli_query($con,"SELECT * FROM company");
$count=0;
$stat="normal";
while($row = mysqli_fetch_array($result)) {
  $count=$count+1;
  echo "<tr>";
  echo "<td>".$row['companyName']."</td>";
  echo "<td>".$row['ctc']."</td>";
  if($row['offer']==0)
    $stat="normal";
  if($row['offer']==1)
    $stat="dream";
  if($row['offer']==2)
    $stat="superdream";
  echo "<td>".$stat."</td>";
  echo "<td>".$row['dateOfVisit']."</td>";
  echo "<td>".$row['noOfDays']."</td>";
  echo "<td>".$row['pacMember']."</td>";
  echo "<td>".$row['hrName']."</td>";
  echo "<td>".$row['hrContact']."</td>";
  echo "<td>".$row['hrEmail']."</td>";
  echo "<td>".$row['studentHired']."</td>";
  echo "<td><form action='editcompany.php' method='post'><input type='hidden' name='id".$count."' value='".$row['id']."'><input type='submit' id='submit' value='E'></form></td>";
  echo "<td><form action='deletecompany.php' method='post'><input type='hidden' name='id".$count."' value='".$row['id']."'><input type='submit' id='submit' value='D'></form></td>";
  echo "</tr>";
}
echo "</tbody></table></center>
<div id='footer-wrap'>
	<div id='footer-container'>
		<div id='footer'>
			<p style='color:white; font-size:12px; position:absolute; top:10px; right:-150px;'>Developed By <b style='font-size:15px;'>U</b>tkarsh, <b style='font-size:15px;'>H</b>imanshu <b style='font-size:15px;'>S</b>oni and <b style='font-size:15px;'>A</b>nirudh <b style='font-size:15px;'>A</b>garwal</p>
			<a style='color:white; font-size:18px; font-weight:bold; position:absolute; top:10px; left:415px;' href='http://www.nitkkr.ac.in' target='_blank'>NIT WEBSITE</a>
		</div>
	</div>
</div>

</body></html>";
mysqli_close($con);
?>

<html>
<head>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<link rel="stylesheet" type="text/css" href="comm.css" />


<script language="javascript" type="text/javascript">

        $(document).ready(function () {
            $("#table1").freezeHeader({ 'height': '600px' });
        })
</script>
<title>Training & Placement</title>
</head>
<body>
 <div id="header-wrap">
  <div id="header-container">
    <div id="header">
      <img src="nitlogo.png" style="height:80px; width:80px; position:absolute; top:6px; left:-50px;"/>
      <h2 style="font-size:50px; color:white; position:absolute; top:15px; left:300px;">NIT Placement</h2>
    
      <img id="btn1" src="set.png" width="39px" style="position:absolute; top:27px; right:0px; z-index:+1;" height="39px"/>
      <h2 id="name"><p style="position:absolute; right:30px;top:10px; cursor: default;" ><a id="abc" href="frontpage.php">Back</a></p></h2>
    </div>
  </div>
</div>

</body>
</html>

