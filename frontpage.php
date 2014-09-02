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

for($i=0;$i<strlen($name);$i++)
{
	if($name[$i]==' ')
	break;
}

$name=substr($name,0,$i);

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Training & Placement</title>
<link rel="stylesheet" type="text/css" href="frontpage.css" />
<link rel="stylesheet" type="text/css" href="slide_down.css" />

<link rel="stylesheet" type="text/css" href="comm.css" />
<script src="jquery.min.js"></script>
<script src="comm.js"></script>

</head>
<body>

<div id="header-wrap">
	<div id="header-container">
		<div id="header">
			<img src="nitlogo.png" style="height:80px; width:80px; position:absolute; top:6px; left:-50px;"/>
			<h2 style="font-size:50px; color:white; position:absolute; top:15px; left:300px;">NIT Placement</h2>
			<img id="btn1" src="set.png" width="39px" style="position:absolute; top:27px; right:0px; z-index:+1;" height="39px" onclick='f5()'/>
			<img id="btn2" src="set.png" width="39px" style="position:absolute; top:27px;  visibility:hidden; right:0px; z-index:+2;" height="39px" onclick='f6()'/>
			<h2 id="name"><p style="position:absolute; right:5px;top:11px; cursor: default;" ><?php echo $name ?></p></h2>
			<h2 id="log"><p style="position:absolute; right:15px;top:12px;" ><a id="abc" href="logout.php">Sign Out</a></p></h2>
			<h2 id="change"><p style="position:absolute; top:3px;" ><a id="abc" href="#">Change&nbsp;&nbsp;<br> Password</a></p></h2>
		</div>
	</div>
</div>


<div class="container">
	<section id="content" style="top:5px; left:-150px;">
	
	
		<form>
			<h1 style="font-size:30px;">Attendance</h1>
			<div>
				<a href="addStudentAttendance.php"><input type="button" value="Add" /></a>
			</div>
			<div>
				<a href="attendanceReport.php"><input type="button" value="View" /></a>
			</div>
			<div>
				<a href="deleteAttendance.php"><input type="button" value="Delete" /></a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
	
	<section id="content" style="top:5px; left:275px;">
		<form>
			<h1 style="font-size:30px;">Student</h1>
			<div>
				<a href="addStudentDetail.php"><input type="button" style="left:-30px;" value="Add" /></a>
			</div>
			<div>
				<a href="searchstudent.php"><input type="button" style="left:-50px;" value="Search" /></a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
	
	<section id="content" style="top:5px; left:700px;">
		<form>
			<h1 style="font-size:30px;">Add Company</h1>
			<div>
				<a href="addcompany1.php"><input type="button"  style="left:-30px;" value="Add" /></a>
			</div>
			<div>
				<a href="viewcompany.php"><input type="button"  style="left:-50px;" value="View" /></a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
	
	<section id="content" style="top:255px; left:60px;">
		<form>
			<h1 style="font-size:30px;">Placement Graph</h1>
			<div>
				<a href="placementgraph.php"><input type="button" value="View" style="left:-100px;"/></a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
	
	<section id="content" style="top:255px; left:500px;">
		<form>
			<h1 style="font-size:30px;">Update Record</h1>
			<div>
				<a href="updatePlacementRecord.php"><input type="button"  style="left:-30px;" value="Update" /></a>
			</div>
			<div>
				<a href="viewStudentPlacedCompany.php"><input type="button"  style="left:-50px;" value="View" /></a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->

<div id="footer-wrap">
	<div id="footer-container">
		<div id="footer">
			<p style="color:white; font-size:12px; position:absolute; top:10px; right:-150px;">Developed By <b style="font-size:15px;">U</b>tkarsh, <b style="font-size:15px;">H</b>imanshu <b style="font-size:15px;">S</b>oni and <b style="font-size:15px;">A</b>nirudh <b style="font-size:15px;">A</b>garwal</p>
			<a style="color:white; font-size:18px; font-weight:bold; position:absolute; top:10px; left:415px;" href="http://www.nitkkr.ac.in" target="_blank">NIT WEBSITE</a>
		</div>
	</div>
</div>


</body>
</html>