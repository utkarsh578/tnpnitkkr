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

<script src="jquery.min.js"></script>
<script>
$(document).ready(function()
  {
  $("#btn1").click(function(){
	$("#log").animate({width:"110px"});
	$("#change").animate({width:"110px"});
  });
  $("#btn2").click(function(){
	$("#log").animate({width:"0px"});
	$("#change").animate({width:"0px"});
  });
});

function f1()
{
document.getElementById("name").style.visibility="hidden";
document.getElementById("log").style.visibility="visible";
document.getElementById("change").style.visibility="visible";
document.getElementById("btn1").id='btn2';
}

</script>

</head>
<body>

<div id="header-wrap">
	<div id="header-container">
		<div id="header">
			<img src="nitlogo.png" style="height:80px; width:80px; position:absolute; top:6px; left:-50px;"/>
			<h2 style="font-size:50px; color:white; position:absolute; top:15px; left:300px;">NIT Placement</h2>
			<img id="btn1" src="set.png" width="40px" style="position:absolute; top:27px; right:0px; z-index:+1;" height="40px" onclick='f1()'/>
			<h2 id="name" style="font-size:18px; color:maroon; position:absolute; text-align:right; width:130px; height:25px;top:25px; border-top-right-radius:15px; border-bottom-right-radius:15px; border-bottom-left-radius:30px; border-top-left-radius:30px; right:-107px; display:block; background-color:white; padding: 8px 8px 10px 10px;"><?php echo $name ?></h2>-->
			<h2 id="log" style="font-size:18px; color:maroon; visibility:hidden; position:absolute; text-align:right; width:0px; height:25px;top:25px; border-top-right-radius:15px; border-bottom-right-radius:15px; border-bottom-left-radius:30px; border-top-left-radius:30px; left:899px; display:block; background-color:white; padding: 8px 8px 10px 10px;"><a id="a" href="logout.php">Log Out</a></h2>
			<h2 id="change" style="font-size:15px; color:maroon; visibility:hidden; position:absolute; text-align:right; width:0px; height:25px;top:25px; border-top-right-radius:30px; border-bottom-right-radius:30px; border-bottom-left-radius:15px; border-top-left-radius:15px; right:-1px; display:block; background-color:white; padding: 8px 8px 10px 10px;"><p style="position:absolute; top:3px;" ><a id="a" href="#">Change&nbsp;&nbsp;<br> Password</a></p></h2>-->
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
		</form><!-- form -->
		
	</section><!-- content -->
	
	<section id="content" style="top:5px; left:275px;">
		<form>
			<h1 style="font-size:30px;">Student</h1>
			<div>
				<a href="addStudentDetail.php"><input type="button" value="Add" /></a>
			</div>
			<div>
				<a href="searchstudent.php"><input type="button" value="Search" /></a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
	
	<section id="content" style="top:5px; left:700px;">
		<form>
			<h1 style="font-size:30px;">Add Company</h1>
			<div>
				<a href="addcompany1.php"><input type="button" value="Add" /></a>
			</div>
			<div>
				<a href="viewcompany.php"><input type="button" value="View" /></a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
	
	<section id="content" style="top:255px; left:60px;">
		<form>
			<h1 style="font-size:30px;">Placement Graph</h1>
			<div>
				<a href="placementgraph.php"><input type="button" value="View" style="left:-80px;"/></a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
	
	<section id="content" style="top:255px; left:500px;">
		<form>
			<h1 style="font-size:30px;">Update Record</h1>
			<div>
				<a href="updatePlacementRecord.php"><input type="button" value="Update" /></a>
			</div>
			<div>
				<a href="viewStudentPlacedCompany.php"><input type="button" value="View" /></a>
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