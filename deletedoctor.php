<!DOCTYPE html>
<html>
<head>

<!-- extern css --!>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset="utf-8">
<title>Yi's Assignment3 for CS3319 - Delete Doctor Page</title>
</head>
<body>

<!-- connect to database --!>
<?php
include 'connecttodb.php';
?>


<h1>Delete doctor</h1>
<?php

// get doctor's license id
$license = $_POST["deletedoctor"];

/* 
	set 4 query
	query1 is to delete doctor in doctor table
	query2 is to check if doctor is a head of hospital
	query3 is to delete related doctor assign information in assign table
	query4 is to check if doctor has assign relationship
*/
$query1 = 'DELETE FROM doctor WHERE license = "'.$license.'"';
$query2 = 'SELECT * FROM hospital WHERE head = "'.$license.'"';
$query3 = 'DELETE FROM assign WHERE doctorlicense = "'.$license.'"';
$query4 = 'SELECT * FROM assign WHERE doctorlicense = "'.$license.'"';

/*
	check if the query has error to connect
*/
$result2 = mysqli_query($connection,$query2);

$result4 = mysqli_query($connection,$query4);

if(!mysqli_query($connection,$query2))
{
	die("Error: insert failed".mysqli_error($connection));
}

/*
	if query2 is not empty, doctor is the head of hospital, can't delete 
*/
if (mysqli_num_rows($result2) == 1)
{
	die("Sorry, this doctor is a head doctor and can not delete!");
}

/*
	if query4 is not empty, doctos has assign relationship
	double check with the user
	confirm delete
	go to 'confirmdelete.php'
		->if user choose Yes, delete
		->if user choose cancel, go back to home page
*/
if(mysqli_num_rows($result4) != 0)
{
	echo "This Doctor is currently assigned with patients.<br><br>";
	echo "<form action = 'confirmdelete.php' method = 'post'>";
	echo "Do you want to delete this doctor?<br><br>";
	echo "<input type = 'submit' name = 'choose' value = 'Yes'> <input type = 'submit' name = 'choose' value = 'Cancel'>";
	echo "<input type = 'hidden' name = 'doctor' value = '".$license."'>";
	echo "</form>";
}
/*
	if doctor currently has no patient
	check if the query has error to connect
	delete the doctor directly
*/
else{
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
/*
	Go back to Home page button
*/
echo "<br><br>";
echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = 'submit' value = 'Back to Home Page'>";
echo "</form>";
mysqli_free_result($result2);
mysqli_close($connection);

?>
</body>
</html>
