<?php
echo "string";
include 'db_connect.php';

$result = mysqli_query($con,"SELECT * FROM company");
//$count=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
	<title> Update student placement detail</title>
</head>
<body>
	<form>
		Company Name: <select name="companyId">
		<?php
			while ($row = mysqli_fetch_array($result)) {

				echo "<option value=".$row['id'].">".$row['companyName']."</option>";
			}
		?>
		</select>

	</form>
</body>