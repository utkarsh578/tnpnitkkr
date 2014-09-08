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
if(isset($_POST['uname']) && isset($_POST['old']) && isset($_POST['new1']) && isset($_POST['new2']))
{
	$result = mysqli_query($con,"SELECT username FROM users where name='".$_SESSION['name']."'");
	//echo "SELECT username FROM users where name=".$_SESSION['name'];
	$row = mysqli_fetch_array($result);	
	if(strcmp($row['username'],$_POST['uname'])==0)
	{
		//echo "HEHE";
		$result = mysqli_query($con,"SELECT password FROM users where username='".$_POST['uname']."'");
		$row = mysqli_fetch_array($result);	
		if(strcmp($row['password'],sha1($_POST['old']))==0)
		{
			//echo "HEHEHE";
			if(strcmp($_POST['new1'],$_POST['new2'])==0)
			{
				//echo "HEHEHEHE";
			$sql="UPDATE users set password='".sha1($_POST['new1'])."' where username='".$_POST['uname']."'";
			if (!mysqli_query($con,$sql)) {
  			die('Error: ' . mysqli_error($con));
				}
			}	
		}
	}
	header("location:frontpage.php");
}
?>
<html>
<head>
<title>TNP</title>
<link rel="stylesheet" type="text/css" href="changepassword.css" />
</head>
<body>

<div id="header-wrap">
	<div id="header-container">
		<div id="header">
			<img src="nitlogo.png" style="height:80px; width:80px; position:absolute; top:6px; left:-50px;"/>
			<h2 style="font-size:50px; color:white; position:absolute; top:15px; left:300px;">NIT Placement</h2>
			
		</div>
	</div>
</div>


<div class="container">

	<section id="content">
		<form action="changepassword.php" method="post">
		<h1>Change Password</h1>
		<div>
			<input type="text" name="uname" placeholder="Username">
			<input type="password" name="old" placeholder="Old Passowrd">
		</div>
		<div>
			<input type="password" placeholder="New Password" name="new1">
			<input type="password" placeholder="Confirm Password" name="new2">
		</div>
			<div>
				<input type="submit" value="Change" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">NIT PLACEMENT</a>
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
