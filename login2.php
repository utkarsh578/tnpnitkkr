<?php
session_start();
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
	$con=mysqli_connect("localhost","root","","nitkkrplacements");
	if (mysqli_connect_errno()) {
	header("location:http://localhost/login2.php");
	}
	$result = mysqli_query($con,"SELECT * FROM users where username='".$user."'");
	$row = mysqli_fetch_array($result);
	if($row['password']!=null && strcmp($row['password'],sha1($pass))==0)
	{
		$_SESSION['name']=$row['name'];
		header("location:http://localhost/tnp/page.php");
	}
	else
	{
		$counter=1;
		//echo "hello";
		//echo $row['password']." ".sha1($pass);
		header("location:http://localhost/login2.php");
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
<title>Paper Stack</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="container">
<h2><img src="nitlogo.png" style="height:100px; width:100px; position:absolute; top:-12px; left:-110px;"/>&nbsp;&nbsp;NIT KKR<br><br><br>Placement</h2>
	<section id="content">
		<form action="login2.php" method="POST">
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password" />
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="#">Forgot your password?</a>
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="http://www.nitkkr.ac.in" target="_blank">NIT WEBSITE</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>

</html>