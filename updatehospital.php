<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">

<!-- extern css --!>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<title>Yi's Assignment3 Website for Update Hospital Name</title>
</head>

<body>
<!-- connect to the database--!>
<?php
include "connecttodb.php";
?>

<h1>Update Hospital Name</h1>

<?php

/*
	get hospital's new name and the hospital
*/
$newname = $_POST["updatename"];
$updatecode = $_POST["updatecode"];

/*
	set query
	pick the hospital row
*/
$query = "UPDATE hospital SET name = '".$newname."' WHERE hospitalcode = '".$updatecode."'";
//echo "<br>". $query . "<br>";

/*
	change the hospital name
	check if there is error to connect to database
	give the error message 
*/
$result = mysqli_query($connection,$query);

if(!$result)
{
	die("databases query on showing doctors who get lisence before the given failed.");
}
else
{
	/*
		give the name change successful notification
	*/
	echo "Name changed successfully!";
}

/*
	set "Go back to the Home Page" button
*/
echo "<br><br>";
echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = 'submit' value ='Back to Home Page'>";
echo "</form>";

mysqli_close($connection);
?>

</body>
</html>
