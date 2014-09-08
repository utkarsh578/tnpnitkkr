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
<head>
<link rel="stylesheet" type="text/css" href="placementgraph.css" />
<link rel="stylesheet" type="text/css" href="comm.css" />
<script src="jquery.min.js"></script>
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

<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>View</h1>
			<div>
				<a href="searchmtech.php" target="_blank"><input type="button" value="M.Tech"></input></a>
				<a href="searchbtech.php" target="_blank"><input type="button" value="B.Tech"></input></a>
				<a href="searchmca.php" target="_blank"><input type="button" value="MCA"></input></a>
				<a href="searchmba.php" target="_blank"><input type="button" value="MBA"></input></a>
				<a href="searchcombine.php" target="_blank"><input style="left:-100px;" type="button" value="View All"></input></a>
			</div>
		</form><!-- form -->
		<br><br>
		<div class="button">
			<a href="#">Placement Graph</a>
		</div><!-- button -->
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