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
$con=mysqli_connect("localhost","root","evm","nitkkrplacements");
	if (mysqli_connect_errno()) {
	header("location:loginpage.php");
	}
?>