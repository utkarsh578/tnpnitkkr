<?php
$con=mysqli_connect("localhost","root","evm","nitkkrplacements");
	if (mysqli_connect_errno()) {
	header("location:loginpage.php");
	}
?>