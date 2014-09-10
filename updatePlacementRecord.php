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
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	if(isset($_GET["companyId"]))
	{
		$companyId = $_GET["companyId"];
		$value = $companyId;
	}
	else
	{
		$companyId = "";
	}
}
$result = mysqli_query($con,"SELECT * FROM company");
//$count=mysqli_fetch_array($result);


for($i=0;$i<strlen($name);$i++)
{
	if($name[$i]==' ')
	break;
}

$name=substr($name,0,$i);
?>
<!DOCTYPE html>
<html>
<head>
	<title> Update student placement detail</title>
	<link rel="stylesheet" type="text/css" href="updatePlacementRecord.css" />
	<link rel="stylesheet" type="text/css" href="comm.css" />
<script src="jquery.min.js"></script>

</head>
<body>
<?php
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}

 ?>
 
 
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
		<form method="post" action="updatePlacementRecordDb.php">
			<h1>Update Record</h1>
			<div>
				<select name="companyId">
				<option selected disabled>Company Name</option>
				<?php
					while ($row = mysqli_fetch_array($result)) {

				echo "<option value=".$row['id']; if($value == $row['id']){echo " selected =".$row['id'].">".$row['companyName']."</option>";}else{ echo ">".$row['companyName']."</option>";}
					}
				?>
				</select>
			</div>
			<div>
				<input type="text" placeholder="Roll No." autofocus="autofocus" required name="rollno" />
			</div>
			<div>
				<input type="submit" value="Submit" />
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