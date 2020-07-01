<!DOCTYPE html>
<html>
<head>
<!-- extern css --!>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset = "utf-8">
<title>Doctor List in alphabetical order</title>
</head>
<body>

<!-- connect to the database --!>
<?php
include "connecttodb.php";
?>

<h1>Doctor List</h1>

<?php
/*
	get user's option
	sorting by firstname or lastname
	sorting in ascending order or deceding order
	set the query
*/
$whichname = $_POST["name"];
$whichorder = $_POST["order"];
$query = "SELECT * FROM doctor ORDER BY ".$whichname." ".$whichorder; // fill in which correct query
//echo "<br>". $query . "<br>";

$result = mysqli_query($connection,$query);

if(!$result)
{
	die("databases query on showing doctor list in alphabetical order failed.");
}


echo "<h2>Doctor's List</h2>";
echo "<hr>";

/*
	make doctor's name to radio button
	output the doctor's information
*/
echo "<form action = 'getdoctorinfo.php' method ='post'>";
while($row = mysqli_fetch_assoc($result))
{	
	//echo $row["license"];
	echo "<input type = 'radio' name = 'pickadoctor' value = '".$row["license"]."'>".$row["firstname"]." ".$row["lastname"]."<br>";
}

/*
	"Go Back to Home Page"
*/
echo "<br>";
echo "<input type = 'submit' value = 'Search'>";
echo "</form>";
echo "<br>";
echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = 'submit' value = 'Back to Home'>";
echo "</form>";

mysqli_free_result($result);

?>

<?php
mysqli_close($connection);
?>

</body>
</html>
