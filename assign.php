<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset="utf-8">
<title>Yi's Assignment3 Website for CS3319 - Assign A Doctor And A Patient Page</title>
</head>
<body>
<?php
include 'connecttodb.php';
?>
<?php

/*
	if user choose assign
	Insert doctor and patient into assihn table
*/
if($_REQUEST['assign'] == 'Assign')
{
	echo "<h1>Doctor assign a new patient</h1>";
	$doctor = $_POST["doctor"];
	$patient = $_POST["patient"];
	$query = 'INSERT INTO assign (doctorlicense, patientohip) VALUES ("'.$doctor.'","'.$patient.'")';
	if(!mysqli_query($connection,$query))
	{
		echo "Insert failed, this doctor has already assigned this patient.<br>";
		die("Error: insert failed".mysqli_error($connection));
	}
	else
	{
		echo "Assigned successfully!";
	}
}
/*
	if user choose drop
	delete doctor whith the choosen patient row from assign table
*/
else{
	echo "<h2>Drop a patient</h2>";
	$doctor = $_POST["doctor"];
	$patient = $_POST["patient"];
	$query = 'DELETE FROM assign WHERE doctorlicense = "'.$doctor.'" AND patientohip = "'.$patient.'"';
	if (!mysqli_query($connection,$query))
	{
		die("Error: delete failed".mysqli_error($connection));
	}
	else
	{
		echo "Drop successfully!";
	}
}

/*
	"Go Back To Home Page"
*/
echo "<br><br>";
echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = 'submit' value = 'Back to Home Page'>";
echo "</form>";

mysqli_close($connection);

?>
</body>
</html>
