<!DOCTYPE html>
<html>
<head>
<!-- connect to database --!>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset = "utf-8">
<title>Show doctors who had license before the given date</title>
</head>
<body>
<!-- connect to the database --!>
<?php
include "connecttodb.php";
?>
<h1>Doctors who had license before the given data:</h1>
<?php
/*
	get the date
	set the query
	find doctor whose license issue date before the user input
*/
$whichDate = $_POST["date"];//get selected date from the form
$query = "SELECT * FROM doctor WHERE licensedate < '".$whichDate."' "; // fill in which correct query
//echo "<br>". $query . "<br>";

$result = mysqli_query($connection,$query);

if(!$result)
{
	die("databases query on showing doctors who get lisence before the given failed.");
}
/*
	output
*/
echo "<ul>";
echo "<h2>Doctor's information</h2>";
echo "<hr>";
while($row = mysqli_fetch_assoc($result))
{
	echo "Doctor name: ".$row["firstname"]." ".$row["lastname"]."<br><br>";
	echo "Specialty: ".$row["specialty"]." | License issue date: ".$row["licensedate"]."<br><br>";
	echo "<hr>";
}
echo "</ul>";
/*
	"Go Back To Home Page"
*/

echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = 'submit' value = 'Go Back To Home Page'>";
echo "</form>";

mysqli_free_result($result);


?>
<?php
mysqli_close($connection);
?>
</body>
</html>
