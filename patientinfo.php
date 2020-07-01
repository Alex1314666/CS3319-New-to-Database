<!DOCTYPE html>
<html>
<head>
<!-- extern css  --!>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset="utf-8">
<title>The Patient Information</title>
</head>

<body>
<!-- connect to the database --!>
<?php
include "connecttodb.php";
?>

<h1>The patient Information:</h1>

<?php
/*
	get patient information
	set query
	query1 is to get patient
	query2 is to join a table to get both patient name and doctor name
*/
$whichP = $_POST["ohip"];
$query1 = 'SELECT * FROM patient WHERE ohip = "'.$whichP.'"';
$query2 = "SELECT patient.firstname AS p_fname,patient.lastname AS p_lname,doctor.firstname AS d_fname,doctor.lastname AS d_lname FROM( patient INNER JOIN assign ON patient.ohip = assign.patientohip) INNER JOIN doctor ON assign.doctorlicense = doctor.license WHERE patient.ohip = '".$whichP."'";

//echo "<br>".$query1."<br>";
//echo "<br>".$query2."<br>";

$result1 = mysqli_query($connection,$query1);
//$result2 = mysqli_query($connection,$query2);

if(!$result1)
{
	die("databases query on patient database failed.");

}
/*
	if user input worng OHIP
	give the failure notification
*/
if(mysqli_num_rows($result1)==0)
{
	echo "Sorry, the patient with the given OHIP number is not on the current record.<br>";
	echo "Please, re-check with the valid OHIP number.<br><br>";
	
	echo "<form action = 'index2.php' method = 'post'>";
	echo "<input type = 'submit' value = 'Back to Home'>";
	echo "</form>";
	
	die ("");

}
/*
	output the patient full name and all assign doctor
*/
else{
	echo "<h2>Patient information</h2>";
	echo "<hr>";
	$row = mysqli_fetch_assoc($result1);
	echo 'Patient: '.$row["firstname"].' '.$row["lastname"]."<br><br>";
	mysqli_free_result($result1);

	$result2 = mysqli_query($connection,$query2);
	if(!$result2)
	{
		die("databases query on patient database failed.");
	}
	else{
		echo "Assigned doctor: <br><br>";
		while ($row = mysqli_fetch_assoc($result2))
		{

			echo $row["d_fname"]." ".$row["d_lname"]."<br><br>";
		}
	}
}
/*
	"Go Back to Home Page"
*/
echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = 'submit' value = 'Back to Home Page'>";
echo "</form>";



mysqli_free_result($result2);

?>

<?php
mysqli_close($connection);
?>


</body>
</html>
