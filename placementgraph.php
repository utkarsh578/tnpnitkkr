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
<link rel="stylesheet" type="text/css" href="placementgraph.css" />
</head>
<body>
<div class="container">
<h2><img src="nitlogo.png" style="height:100px; width:100px; position:absolute; top:-12px; left:-110px;"/>&nbsp;View<br><br><br>&nbsp;Placement</h2>
	<section id="content">
		<form action="" method="post">
			<h1>View</h1>
			<div>
				<a href="searchmtech.php"><input type="button" value="M.Tech"></input></a>
				<a href="searchbtech.php"><input type="button" value="B.Tech"></input></a>
				<a href="searchmca.php"><input type="button" value="MCA"></input></a>
				<a href="searchmba.php"><input type="button" value="MBA"></input></a>
				<a href="searchcombine.php"><input style="left:-100px;" type="button" value="View All"></input></a>
			</div>
		</form><!-- form -->
		<br><br>
		<div class="button">
			<a href="#">Placement Graph</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>