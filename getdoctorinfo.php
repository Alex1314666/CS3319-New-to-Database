<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<link rel="stylesheet" type="text/css" href="mystyle.css">
<title>Doctor List in alphabetical order</title>
</head>

<body>

<?php
include "connecttodb.php";
?>

<h1>Doctor's information</h1>
<?php

$whichdoctor = $_POST["pickadoctor"]; // get selected doctor
//echo $_POST["pickadoctor"];
$query = "SELECT doctor.docimage AS d_image, doctor.license AS d_license,doctor.licensedate AS d_date, doctor.firstname AS d_fname,doctor.lastname AS d_lname, doctor.specialty AS d_specialty,hospital.name AS h_name,hospital.city AS h_city,hospital.province AS h_province FROM doctor INNER JOIN hospital ON doctor.hospitalcode = hospital.hospitalcode WHERE doctor.license = '".$whichdoctor."'"; // fill in which correct query
//echo "<br>". $query . "<br>";

$result = mysqli_query($connection,$query);

if(!$result)
{
	die("databases query on showing doctor list in alphabetical order failed.");
}
$row = mysqli_fetch_assoc($result);
echo "<h2>Doctor's Personal Profile</h2>";
echo "<hr>";
/*
	output
*/
echo "Doctor Name: ".$row["d_fname"]." ".$row["d_lname"]."<br><br>";
echo "License: ".$row["d_license"]."<br><br>";
echo "License issue date: ".$row["d_date"]."<br><br>";
echo "Hospital: ".$row["h_name"].", ".$row["h_city"].", ".$row["h_province"]."<br><br>";
echo "Specialty: ".$row["d_specialty"]."<br><br>";

/*
	"Go Back To Home Page"
*/
echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = 'submit' value = 'Back to Home Page'>";
echo "</form>";

mysqli_free_result($result);

?>
<?php
mysqli_close($connection);
?>
</body>
</html>
