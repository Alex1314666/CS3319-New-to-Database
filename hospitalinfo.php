<!DOCTYPE html>
<html>
<head>
<!-- extern css  --!>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset="utf-8">
<title>The head doctor of each hospital</title>
</head>

<body>
<!-- connect to the database --!>
<?php
include "connecttodb.php";
?>
<h1>Welcome to check the head doctor of each hospital!</h1>
<ol>
<?php

/*
	set query
	get all information needed
*/
$query = "SELECT hospital.name, hospital.city,hospital.headstart, doctor.lastname,doctor.firstname FROM hospital INNER JOIN doctor ON hospital.head=doctor.license ORDER BY hospital.name ASC;";

//echo "<br>".$query."<br>";

/*
	check error
*/
$result = mysqli_query($connection,$query);

if(!$result)
{
	die("databases query on hospital information failed.");
}
echo "<ol>";

/*
	output
*/
while ($row = mysqli_fetch_assoc($result))
{
	echo "<li>".$row["name"]." of ". $row["city"]."'s head of doctor: ".$row["firstname"]." ".$row["lastname"]." since ".$row["headstart"]."</li><br><br>";
}
echo "</ol>";

/*
	"Go Back to Home Page"
*/
echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = 'submit' value = 'Back to Home Page'>";
echo "</form>";

mysqli_free_result($result);
mysqli_close($connection);
?>
</body>
</html>
