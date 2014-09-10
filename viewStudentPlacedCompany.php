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
$value = 1;
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
	$result1 = mysqli_query($con,"SELECT * FROM studentPlaced LEFT  JOIN studentsData ON studentPlaced.studentId = studentsData.id WHERE studentPlaced.companyId = '$companyId'");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["companyId"]))
	{
		$companyId = $_POST["companyId"];
		$value = $companyId;
	}
	else
	{
		$companyId = "";
	}

	$result1 = mysqli_query($con,"SELECT * FROM studentPlaced LEFT  JOIN studentsData ON studentPlaced.studentId = studentsData.id WHERE studentPlaced.companyId = '$companyId'");
}

	$result = mysqli_query($con,"SELECT * FROM company");
	
	

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
	<title> Student Placed</title>
	
	<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>


<script language="javascript" type="text/javascript">

        $(document).ready(function () {
            $("#table1").freezeHeader({ 'height': '500px' });
        })
 

</script>

	<link rel="stylesheet" type="text/css" href="viewStudentPlacedCompany.css" />
	<link rel="stylesheet" type="text/css" href="comm.css" />
<script src="jquery.min.js"></script>

	<style type='text/css'>
.tftable {position:absolute; top:10px; left:520px;font-size:12px;color:#333333;width:60%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:20px;background-color:#acc8cc;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:center;}
.tftable tr {background-color:#ffffff;}
.tftable td {font-size:18px;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;}
.tftable tr:hover {background-color:#acc8cc;}
</style>

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
		<form action="viewStudentPlacedCompany.php" method="post">
			<h1>Students Placed</h1>
			<div>
				<select name="companyId" value = <?php echo $value; ?>>
				<?php
					while ($row = mysqli_fetch_array($result)) {

						echo "<option value=".$row['id']; if($value == $row['id']){echo " selected =".$row['id'].">".$row['companyName']."</option>";}else{ echo ">".$row['companyName']."</option>";}
					}
				?>
				</select>
			</div>
			<div>
				<input type="submit" value="Submit">
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">NIT PLACEMENT</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->


<table class='tftable'  id='table1' border='5px'>
<thead>
	<tr>
		<th>Name</th>
		<th>Roll No</th>
		<th>Email</th>
		<th>Brnach</th>
		<th>Degree</th>
		<th>Delete</th>
	</tr>
</thead>
<tbody>
	<?php while ($row = mysqli_fetch_array($result1)) {
		echo "<tr>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['rollno']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['branch']."</td>";
		echo "<td>".$row['degree']."</td>";
		$studentId = $row['id'];
		echo "<td><a href = deleteStudentPlacedCompany.php?studentId=".$studentId."&companyId=".$companyId.">Delete</a></td>";
		echo "</tr>";
	}
	?>
</tbody>
</table>


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