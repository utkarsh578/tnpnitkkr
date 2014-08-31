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
$id=0;
include "db_connect.php";
$result = mysqli_query($con,"SELECT count(*) FROM Company");
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
$result = mysqli_query($con,"SELECT * FROM Company where id=".$id);
$row = mysqli_fetch_array($result);
?>
<html>
<head>
<title>Edit Company</title>
</head>
<body>
<form action="editcompany2.php" method="post">
<input type="hidden" value=<?php echo "\"".$id."\""; ?> name="id">
<table>
<tr>
<th>Entries</th>
<th>Values</th>
</tr>
<tr>
<td>Company Name :</td>
<td><input type="text" value=<?php echo "\"".$row['companyName']."\""; ?> name="name"></td>
</tr>
<tr>
<td>Package :</td>
<td><input type="text" value=<?php echo "\"".$row['ctc']."\""; ?>  name="package"></td>
</tr>
<tr>
<td>Status :</td>
<td>
<?php
if($row['offer']==0)
echo "<input type='radio' name='status' value='normal' checked>Normal <input type='radio' name='status' value='dream'>Dream <input type='radio' name='status' value='superdream'>SuperDream</td>";
if($row['offer']==1)
echo "<input type='radio' name='status' value='normal' >Normal <input type='radio' name='status' value='dream' checked>Dream <input type='radio' name='status' value='superdream'>SuperDream</td>";
if($row['offer']==2)
echo "<input type='radio' name='status' value='normal' >Normal <input type='radio' name='status' value='dream'>Dream <input type='radio' name='status' value='superdream' checked>SuperDream</td>";
?>
</tr>
<tr>
<td>Date of Visit :</td>
<td><input type="date" value=<?php echo "\"".$row['dateOfVisit']."\""; ?> name="date_of_visit"></td>
</tr>
<tr>
<td>Number of Days :</td>
<td><input type="text" value=<?php echo "\"".$row['noOfDays']."\""; ?> name="no_of_days"></td>
</tr>
<tr>
<td>PAC Member :</td>
<td><input type="text" value=<?php echo "\"".$row['pacMember']."\""; ?> name="pac_member"></td>
</tr>
<tr>
<td>
<input type="submit" value="Submit">
</td>
</tr>
</table>
</form>
</body>
<?php
mysqli_close($con);
?>
</html>