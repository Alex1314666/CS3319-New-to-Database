<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset="utf-8">
<title>Doctor Apply</title>
</head>
<body>
<?php
include 'upload_file.php';
include 'connecttodb.php';
?>
<h1>Add a new doctor</h1>
<?php
/*
	get new doctor's info
	set query1
	check if doctor license has already exist
	set query2
	insert in to doctor table
*/
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$specialty = $_POST["specialty"];
$licensedate = $_POST["licensedate"];
$license = $_POST["license"];
$hospital = $_POST["hospitalcode"];
$query1 = 'SELECT * FROM doctor WHERE license = "'.$license.'"';

/*
	check error
*/
if(!mysqli_query($connection,$query1))
{
	die("Error: insert failed".mysqli_error($connection));
}
$result1 = mysqli_query($connection, $query1); 
if ( mysqli_num_rows($result1) == 1)
{
	die("Sorry, this license ID and related doctor has already in the system. Please check your information again!");

}

$query2 = 'INSERT INTO doctor (firstname, lastname,specialty,hospitalcode,licensedate,license,docimage) VALUES("' . $firstname . '","' . $lastname . '","' . $specialty . '","' . $hospital . '","'.$licensedate.'","'.$license.'","'.$docpic.'")';

if(!mysqli_query($connection,$query2)){
	die("Error: insert failed".mysqli_error($connection));

}

echo "Doctor added successfully!";
echo "<br><br>";
/*
	"Go Back to Home Page"
*/
echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = submit value = 'Back to home Page'>";
echo "</form>";
mysqli_free_result($result1);
mysqli_close($connection);

?>
</body>
</html>
