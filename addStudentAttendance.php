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
	if(isset($_GET["date"]))
	{
		$date = $_GET["date"];
		//$value = $companyId;
	}
	else
	{
		$date = "";
	}
	//$result1 = mysqli_query($con,"SELECT * FROM studentCompanyAttended LEFT JOIN studentsData ON studentCompanyAttended.studentId = studentsData.id WHERE studentCompanyAttended.companyId = '$companyId'");
}
$result = mysqli_query($con,"SELECT * FROM company");
//$count=mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Training & Placement</title>
<link rel="stylesheet" type="text/css" href="addStudentAttendence.css" />
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
			<h2 style="font-size:14px; color:maroon; position:absolute; top:30px; right:-160px; display:block; padding: 8px 8px 10px 10px; background-color:white;">Log Out</h2>
</div>
	</div>
</div>


<div class="container">
	<section id="content">
		<form method="post" action="addStudentAttendanceDb.php">
			<h1>Student Attendance</h1>
			<br><br>
			<div>
				<select name="companyId" required value = <?php echo $value; ?>>
				<option selected disabled>Company Name</option>
				<?php
					while ($row = mysqli_fetch_array($result)) {

				echo "<option value=".$row['id']; if($value == $row['id']){echo " selected =".$row['id'].">".$row['companyName']."</option>";}else{ echo ">".$row['companyName']."</option>";}
					}
				?>
				</select>
				<br><br>
			</div>
			<br><br>
			<div>
			Date : <input type="date" name="date" value=<?php echo $date;?>><br>

				<input type="text" placeholder="Roll No. 1" name="rollno1"/>
			
				<input type="text" placeholder="Roll No. 2" name="rollno2"/>
			
				<input type="text" placeholder="Roll No. 3" name="rollno3"/>
			
				<input type="text" placeholder="Roll No. 4" name="rollno4"/>
			
				<input type="text" placeholder="Roll No. 5" name="rollno5"/>
			
				<input type="submit" value="Submit" />
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