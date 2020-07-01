<?php
/*
	set query
	get hospital infomation with head doctor's full name
*/
$query = "SELECT hospital.name, hospital.city, doctor.lastname,doctor.firstname FROM hospital INNER JOIN doctor ON hospital.head=doctor.license;";

//echo "<br>".$query."<br>";
/*
	check if the query has error to connect to the database
*/
$result = mysqli_query($connection,$query);

if(!$result)
{
	die("databases query on hospital information failed.");
}
/*
	output the details
*/
echo "Welcome to check the head of hospital!";
echo "<ul>";
while ($row = mysqli_fetch_assoc($result))
{
	echo $row["name"]." of ". $row["city"]."'s head of doctor: ".$row["firstname"]." ".$row["lastname"]."<br><br>";
}
echo "</ul>";

mysqli_free_result($result);

?>
