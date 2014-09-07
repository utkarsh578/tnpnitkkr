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
$id=0;
include "db_connect.php";
$result = mysqli_query($con,"SELECT count(*) FROM company");
$row = mysqli_fetch_array($result);
$count=$row['count(*)'];
for($i=1;$i<=$count;$i++)
{
	$str="id".$i;
	if(isset($_POST[$str]))
	{
		$id=$_POST[$str];
		break;
	}
}
$result = mysqli_query($con,"SELECT * FROM company where id=".$id);
$row = mysqli_fetch_array($result);
?>
<html>
<head>
<title>Edit Company</title>
<link rel="stylesheet" type="text/css" href="editcompany.css" />

<link href="jquery.datepick.css" rel="stylesheet"/>
<script src="jquery.min.js"></script>
<script src="jquery.plugin.js"></script>
<script src="jquery.datepick.js"></script>

<script>
$(function() {
	$('#popupDatepicker').datepick({ dateFormat: 'yyyy-mm-dd' });
});
</script>

</head>
<body>

<div id="header-wrap">
	<div id="header-container">
		<div id="header">
</h1>
			<img src="nitlogo.png" style="height:80px; width:80px; position:absolute; top:6px; left:-50px;"/>
			<h2 style="font-size:50px; color:white; position:absolute; top:15px; left:280px;">NIT Placement</h2>
			</div>
	</div>
</div>

<div class="container">
	<section id="content">
		<form action="editcompany2.php" method="post">
			<h1>Company Details</h1>
			<input type="hidden" value=<?php echo "\"".$id."\""; ?> name="id">
			<div>
				<input type="text" value=<?php echo "\"".$row['companyName']."\""; ?> name="name">
				<input type="text" value=<?php echo "\"".$row['ctc']."\""; ?>  name="package">
			</div>
			<div>
				<?php
				if($row['offer']==0)
				echo "<input type='radio' id='radio1' name='status' value='normal' checked><label for='radio1'>Normal</label> 
				<input type='radio' id='radio2' name='status' value='dream'><label for='radio2'>Dream</label>
				<input type='radio' id='radio3' name='status' value='superdream'><label for='radio3'>Super Dream</label>";
				if($row['offer']==1)
				echo "<input type='radio' id='radio1' name='status' value='normal' ><label for='radio1'>Normal</label> 
				<input type='radio' id='radio2' name='status' value='dream' checked><label for='radio2'>Dream</label>
				<input type='radio' id='radio3' name='status' value='superdream'><label for='radio3'>Super Dream</label>";
				if($row['offer']==2)
				echo "<input type='radio' id='radio1' name='status' value='normal'><label for='radio1'>Normal</label> 
				<input type='radio' id='radio2' name='status' value='dream'><label for='radio2'>Dream</label>
				<input type='radio' id='radio3' name='status' value='superdream'checked><label for='radio3'>Super Dream</label>";
				?>
				
			</div>
			
			<br>
			
			<div>
				<input type="text" value=<?php echo "\"".$row['hrName']."\""; ?>  name="hr_name" placeholder = "HR Name"/>
				<input type="text" value=<?php echo "\"".$row['hrContact']."\""; ?> name="hr_contact" placeholder = "HR Contact"/>
			</div>
			<div>
				<input type="text" value=<?php echo "\"".$row['hrEmail']."\""; ?> name="hr_email" placeholder = "HR Email"/>
				<input type="text" value=<?php echo "\"".$row['pacMember']."\""; ?> name="pac_member" placeholder = "PAC Member" />
			</div>
			<br>
			<div>
				<input type="" id="popupDatepicker" value=<?php echo "\"".$row['dateOfVisit']."\""; ?> name="date_of_visit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" value=<?php echo "\"".$row['noOfDays']."\""; ?> name="no_of_days">
			</div>
			<br>
			<div>
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
<?php
mysqli_close($con);
?>
</html>