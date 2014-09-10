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
?>
<!DOCTYPE html>
<html>
<head>
	<title> Update student placement detail</title>

<script>
function f1(){

	var degree=document.getElementById("degree").value;
	var select = document.getElementById("branch");
	document.getElementById('branch').innerHTML = "";
	
	if(degree == 'B.Tech'){
	document.getElementById("branch").disabled=false;
	var option1 = document.createElement('option');
	option1.text = option1.value = 'Computer';
    select.add(option1, 1);
	
	var option2 = document.createElement('option');
	option2.text = option2.value = 'IT';
    select.add(option2, 2);
	
	var option3 = document.createElement('option');
	option3.text = option3.value = 'Civil';
    select.add(option3, 3);
	
	var option4 = document.createElement('option');
	option4.text = option4.value = 'Mechanical';
    select.add(option4, 4);
	
	var option5 = document.createElement('option');
	option5.text = option5.value = 'Electronics';
    select.add(option5, 5);
	
	var option6 = document.createElement('option');
	option6.text = option6.value = 'Electrical';
    select.add(option6, 6);
	
	var option7 = document.createElement('option');
	option7.text = option7.value = 'IEM';
    select.add(option7, 7);
	}
	
	if(degree == 'M.Tech'){
	document.getElementById("branch").disabled=false;
	var option1 = document.createElement('option');
	option1.text = option1.value = 'Computer';
    select.add(option1, 1);
	
	var option2 = document.createElement('option');
	option2.text = option2.value = 'School of VLSI & Embedded System';
    select.add(option2, 2);
	
	var option3 = document.createElement('option');
	option3.text = option3.value = 'Civil';
    select.add(option3, 3);
	
	var option4 = document.createElement('option');
	option4.text = option4.value = 'Mechanical';
    select.add(option4, 4);
	
	var option5 = document.createElement('option');
	option5.text = option5.value = 'Electronics';
    select.add(option5, 5);
	
	var option6 = document.createElement('option');
	option6.text = option6.value = 'Electrical';
    select.add(option6, 6);
	
	var option7 = document.createElement('option');
	option7.text = option7.value = 'School of Renewable Energy & Efficiency';
    select.add(option7, 7);
	
	var option8 = document.createElement('option');
	option8.text = option8.value = 'School of Bio Medical Engg.';
    select.add(option8, 8);
	
	var option9 = document.createElement('option');
	option9.text = option9.value = 'School of Material Science & Technology';
    select.add(option9, 9);
	
	var option10 = document.createElement('option');
	option10.text = option10.value = 'Department of Physics';
    select.add(option10, 10);
	}
	
	if(degree == 'MBA'){
	document.getElementById("branch").disabled=false;
	var option1 = document.createElement('option');
	option1.text = option1.value = 'Finance';
    select.add(option1, 1);
	
	var option2 = document.createElement('option');
	option2.text = option2.value = 'Human Resource';
    select.add(option2, 2);
	
	var option3 = document.createElement('option');
	option3.text = option3.value = 'Marketing';
    select.add(option3, 3);
	}
	
	if(degree == 'MCA'){
	document.getElementById("branch").disabled=false;
	var option1 = document.createElement('option');
	option1.text = option1.value = 'MCA';
    select.add(option1, 1);
	}

	
}

</script>
<link rel="stylesheet" type="text/css" href="attendanceReport.css" />


<link rel="stylesheet" type="text/css" href="comm.css" />
<script src="jquery.min.js"></script>
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
	
<form method="post" action="generateAttendanceReport.php" target="_blank">
	<h1>Attendance Report</h1>
			<div>
				<select name="degree" id="degree" required onchange='f1()'>
					<option value="" selected disabled>Degree</option>
  					<option value="B.Tech">B.Tech</option>
  					<option value="M.Tech">M.Tech</option>
  					<option value="MCA">MCA</option>
  					<option value="MBA">MBA</option>
				</select>
			</div>
			<div>
				<select name="branch" required id="branch">
					<option value="" selected disabled>Branch</option>
				</select>
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