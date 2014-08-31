<?php
session_start();
if(isset($_SESSION['name']))
{
	header("location:frontpage.php");
}
if(isset($_POST["username"]) && isset($_POST["password"]))
{
	$user=$_POST["username"];
	$pass=$_POST["password"];
	$l1=strlen($user);
	$l2=strlen($pass);
	$flag=0;
    for($i=0;$i<$l1;$i++)
    { 
		$ch=$user[$i];
        if(!($ch>='a' && $ch<='z' || $ch>='A' && $ch<='Z' || $ch>='0' && $ch<='9' || $ch=='_'))
        {
			$flag=1;
            break;
        }
    }
    for($i=0;$i<$l2;$i++)
    { 
		$ch=$pass[$i];
        if(!($ch>='a' && $ch<='z' || $ch>='A' && $ch<='Z' || $ch>='0' && $ch<='9' || $ch=='_'))
        {
			$flag=1;
            break;
        }
    }
	if($flag==1 || $l1<3 || $l2<3 || $l1>29 || $l2>29)
    {
        echo "<h1>Error</h1>";                   
    }
	else
	{
	//echo "<h1>No sql Injection</h1>";
	$con=mysqli_connect("localhost","root","evm","nitkkrplacements");
	if (mysqli_connect_errno()) {
	header("location:loginpage.php");
	}
	$result = mysqli_query($con,"SELECT * FROM users where username='".$user."'");
	$row = mysqli_fetch_array($result);
	if($row['password']!=null && strcmp($row['password'],sha1($pass))==0)
	{
		$_SESSION['name']=$row['name'];
		header("location:frontpage.php");
	}
	else
	{
		$counter=1;
		//echo "hello";
		//echo $row['password']." ".sha1($pass);
		header("location:loginpage.php");
	}
	mysqli_close($con);
	}
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
<link rel="stylesheet" type="text/css" href="loginpage.css" />
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
		<form action="loginpage.php" method="post">
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password" />
			</div>
			<div>
				<input type="submit" value="Log in" />
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