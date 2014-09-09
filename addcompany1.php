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
<!--[if (gte IE 9)|!(IE)]><!--> 
<html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Training & Placement</title>
<link rel="stylesheet" type="text/css" href="addcompany1.css" />

<script type='text/javascript'>
var timePeriodInMs = 2000;

setTimeout(function() 
{ 
	document.getElementById("hide").style.display = "none"; 
},timePeriodInMs);
</script>

<link href="jquery.datepick.css" rel="stylesheet"/>
<script src="jquery.min.js"></script>
<script src="jquery.plugin.js"></script>
<script src="jquery.datepick.js"></script>
<script>
$(function() {
	$('#popupDatepicker').datepick({ dateFormat: 'yyyy-mm-dd' });
});
</script>

<link rel="stylesheet" type="text/css" href="comm2.css" />
</head>
<body>
	
<div id="header-wrap">
	<div id="header-container">
		<div id="header">
<?php

if(isset($_SESSION['company']))
{
	echo "
	<h3 id='hide' style='position:absolute; top:90px; text-align:center; color:white; left:350px; display:block; height:45px; width:220px; background-color:maroon; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;'>
	<p id='hide' style='position:absolute; top:8px;'><center>".$_SESSION['company']." Added</center></p></h3>";
	unset($_SESSION['company']);
}

?>

			<img src="nitlogo.png" style="height:80px; width:80px; position:absolute; top:6px; left:-50px;"/>
			<h2 style="font-size:50px; color:white; position:absolute; top:15px; left:280px;">NIT Placement</h2>

			<img id="btn1" src="set.png" width="39px" style="position:absolute; top:27px; right:0px; z-index:+1;" height="39px"/>
			<h2 id="name"><p style="position:absolute; right:30px;top:10px; cursor: default;" ><a id="abc" href="frontpage.php">Back</a></p></h2>
			</div>
	</div>
</div>

<div class="container">
	<section id="content">
		<form action="addcompany2.php" method="post">
			<h1>Company Details</h1>
			<div>
				<input type="text" placeholder="Company Name" name="name" />
				<input type="text" placeholder="Package"  name="package"/>
			</div>

			<div>
				<input type="radio" name="status" id="radio1" value="normal" required><label for="radio1">Normal</label> 
				<input type="radio" name="status" id="radio2" value="dream" required><label for="radio2">Dream</label> 
				<input type="radio" name="status" id="radio3" value="superdream" required><label for="radio3">Super Dream</label>
			</div>
			
			<br>
			<div>
				<input type="text" placeholder="H.R. Name"  name="hr_name" />
				<input type="text" placeholder="H.R. Contact" name="hr_contact"/>
			</div>
			<div>
				<input type="text" placeholder="H.R. Email"  name="hr_email"/>
				<input type="text" placeholder="PAC Member" name="pac_member">
			</div>
			<br>
			<div>
				<input type="" placeholder="Date of Visit" id="popupDatepicker" name="date_of_visit" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="" placeholder="No. of Days" name="no_of_days">
			</div>
			<br>
			<div>
				<input type="submit" value="Submit" />
			<!--</div>
			
				<div>
				<select multiple="multiple" class="asmselect" title="Branch">
				<option id="btech" selected>B.Tech</option>
				<option id="b1" name="btech">Computer</option>
				<option id="b2" name="btech">IT</option>
				<option id="b3" name="btech">Mechanical</option>
				<option id="b4" name="btech">Electrical</option>
				<option id="b5" name="btech">Electronics</option>
				<option id="b6" name="btech">Civil</option>
				<option id="b7" name="btech">IEM</option>
				<option id="a" selected></option>
				
				<option id="mtech">M.Tech</option>
				<option id="a" selected></option>
				
				<option id="mba">MBA</option>
				<option id="a" selected></option>
				
				<option id="mca">MCA</option>
				<option id="a" selected></option>
				
				<option id="bio">Bio - Medical</option>
				</select>
				</div>-->

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
