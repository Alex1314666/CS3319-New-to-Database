<!DOCTYPE html>
<html>
<head>
<!-- extern css --!>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset="utf-8">
<title>Doctor who curently has no patient</title>
</head>

<body>
<!-- connect to database --!>
<?php
include "connecttodb.php";
?>
<h1>Doctor timetable</h1>
<ol>
<?php
/*
	set query
	slecet doctor who is not in assign table
*/
$query = "SELECT * FROM doctor WHERE doctor.license NOT IN (SELECT doctorlicense FROM assign)";

//echo "<br>".$query."<br>";

$result = mysqli_query($connection,$query);

if(!$result)
{
	die("databases query on hospital information failed.");
}

/*
	output
*/
echo "<ol>";
echo "<h2>Doctor who currently has no patient</h2>";
echo "<hr>";
while ($row = mysqli_fetch_assoc($result))
{
	echo "<li>".$row["firstname"]." ".$row["lastname"]."</li><br>";
}
echo "</ol>";

/*
	"Go Back to Home Page"
*/
echo "<br>";
echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = 'submit' value = 'Back to Home Page'>";
echo "</form>";
mysqli_free_result($result);
mysqli_close($connection);
?>
</body>
</html>
