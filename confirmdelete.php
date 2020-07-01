<!DOCTYPE html>
<html>
<head>
<!-- extern css --!>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset="utf-8">
<title>Yi's Assignment3 Website for CS3319 - Confirm Delete Doctor Page</title>
</head>
<body>

<!-- connect to database --!>
<?php
include 'connecttodb.php';
?>

<h1>Confirm Delete Doctor</h1>

<?php
/*
	get doctor license, and the user's choose
	if user choose yes, delete doctor from doctor table and assign table
	if user choose cancel, do nothing but go back to home
*/
$license = $_POST["doctor"];
$choose = $_POST["choose"];
$query1 = 'DELETE FROM doctor WHERE license = "'.$license.'"';
$query3 = 'DELETE FROM assign WHERE doctorlicense = "'.$license.'"';

if($choose == 'Yes'){
	if (!mysqli_query($connection,$query1))
	{
		die("Error: insert failed".mysqli_error($connection));
	}
	if (!mysqli_query($connection,$query3))
	{
		die("Error: insert failed".mysqli_error($connection));
	}
	echo "Delete successfully!";
}
else
{
	echo "Delete canceled!";
}

/*
	"Go Back to Home Page"
*/
echo "<br><br>";
echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = 'submit' value = 'Back to Home Page'>";
echo "</form>";

mysqli_close($connection);

?>
</body>
</html>
