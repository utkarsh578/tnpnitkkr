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
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Training & Placement</title>
<link rel="stylesheet" type="text/css" href="searchstudent.css" />
<script>
function f1(){

	var degree=document.getElementById("degree").value;
	var select = document.getElementById("branch");
	document.getElementById('branch').innerHTML = "";
	
	var option0 = document.createElement('option');
	option0.text = option0.value = 'Branch';
    select.add(option0, 0);
	
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
	document.getElementById("subbranch").disabled=true;
	var option1 = document.createElement('option');
	option1.text = option1.value = 'MCA';
    select.add(option1, 1);
	}

	
	if(degree == 'B.Tech' || degree == 'MBA'||degree == 'MCA'){
	document.getElementById("subbranch").text="";
	document.getElementById("subbranch").disabled=true;
	}
	
}

function f2(){

	var degre=document.getElementById("degree").value;
	var degree=document.getElementById("branch").value;
	var select = document.getElementById("subbranch");
	document.getElementById('subbranch').innerHTML = "";
	
	if(degre == 'M.Tech'){
	document.getElementById("subbranch").disabled=false;
	if(degree == 'Civil'){
	var option1 = document.createElement('option');
	option1.text = option1.value = 'Structural Engg. & Constructional Techniques';
    select.add(option1, 1);
	
	var option2 = document.createElement('option');
	option2.text = option2.value = 'Soil Mechanics & Foundation Engg.';
    select.add(option2, 2);
	
	var option3 = document.createElement('option');
	option3.text = option3.value = 'Transportation';
    select.add(option3, 3);
	
	var option4 = document.createElement('option');
	option4.text = option4.value = 'Water Resources';
    select.add(option4, 4);
	
	var option5 = document.createElement('option');
	option5.text = option5.value = 'Environment';
    select.add(option5, 5);
	}
	
	if(degree == 'Computer'){
	var option1 = document.createElement('option');
	option1.text = option1.value = 'Computer Engg.';
    select.add(option1, 1);
	}
	
	if(degree == 'Electrical'){
	var option1 = document.createElement('option');
	option1.text = option1.value = 'Power System Engg.';
    select.add(option1, 1);
	
	var option2 = document.createElement('option');
	option2.text = option2.value = 'Power Electronics & Electric Drives';
    select.add(option2, 2);
	
	var option3 = document.createElement('option');
	option3.text = option3.value = 'Control System Engg.';
    select.add(option3, 3);
	}
	
	if(degree == 'Electronics'){
	var option1 = document.createElement('option');
	option1.text = option1.value = 'Electronics & Communication Engg.';
    select.add(option1, 1);
	}
	
	if(degree == 'School of VLSI & Embedded System'){
	var option1 = document.createElement('option');
	option1.text = option1.value = 'VLSI';
    select.add(option1, 1);
	
	var option2 = document.createElement('option');
	option2.text = option2.value = 'Embedded System';
    select.add(option2, 2);
	}
	
	if(degree == 'Mechanical'){
	var option1 = document.createElement('option');
	option1.text = option1.value = 'Machine Design Engg.';
    select.add(option1, 1);
	
	var option2 = document.createElement('option');
	option2.text = option2.value = 'Industrial & Production Engg.';
    select.add(option2, 2);
	
	var option3 = document.createElement('option');
	option3.text = option3.value = 'Thermal Engg.';
    select.add(option3, 3);
	}
	
	if(degree == 'Department of Physics'){
	var option1 = document.createElement('option');
	option1.text = option1.value = 'Instrumentation Engg.';
    select.add(option1, 1);
	
	var option2 = document.createElement('option');
	option2.text = option2.value = 'Nano Technology';
    select.add(option2, 2);
	}
	
	if(degree == 'School of Renewable Energy & Efficiency'){
	var option1 = document.createElement('option');
	option1.text = option1.value = 'Renewable Energy Systems';
    select.add(option1, 1);
	}
	
	if(degree == 'School of Bio Medical Engg.'){
	var option1 = document.createElement('option');
	option1.text = option1.value = 'Bio Medical Engg.';
    select.add(option1, 1);
	}
	
	if(degree == 'School of Material Science & Technology'){
	var option1 = document.createElement('option');
	option1.text = option1.value = 'Material Science & Technology';
    select.add(option1, 1);
	}
	}
}
</script>
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
		<form action="searchstudent2.php" method="post">
			<h1>Search By Roll No.</h1>
			<div>
				<input type="text" name="roll" required placeholder="Roll No."/>
			</div>
			
			<div>
				<input type="submit" id="sub1" value="Search" />
			</div>
		</form><!-- form -->
		
		<form action="searchstudent2.php" method="post" style="top:-40px;">
			<h1>Search By CGPA</h1>
			<div>
				<input type="text" name="cgpa" required placeholder="CGPA"/>
			</div>
			
			
			<div>
				<select id="year" name="year">
				<option value="" selected disabled>Year</option>
				<option name="first" value="first">First</option>
				<option name="second" value="second">Second</option>
				<option name="third" value="third">Third</option>
				<option name="fourth" value="fourth">Fourth</option>
				</select>
				
				
				<select name="degree" id="degree" onchange='f1()'>
					<option value="" selected disabled>Degree</option>
  					<option value="B.Tech">B.Tech</option>
  					<option value="M.Tech">M.Tech</option>
  					<option value="MCA">MCA</option>
  					<option value="MBA">MBA</option>
				</select>
				
				<select name="branch" id="branch" onchange='f2()'>
				<option value="" selected disabled>Branch</option>
				</select>
				
				<select name="subbranch" id="subbranch">
				<option value="" selected disabled>Sub Branch</option>
				</select>
				
			</div>
			
			
			<div>
				<input type="submit"  id="sub2" value="Search" />
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