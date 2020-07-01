<!DOCTYPE html>
<html>
<head>

<!-- Try extern css --!>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset="utf-8">
<title>Yi's Assignment3 Website for CS 3319 - Add Doctor Image Page</title>
</head>

<body>
<!-- connect to the database --!>
<?php
include 'upload_file.php';
include 'connecttodb.php';
?>

<?php

// get doctor license that user choose
$license = $_POST["doctor"];
// set query
// Update the choosen doctor's image 
$query = 'UPDATE doctor SET docimage = "'.$docpic.'" WHERE license = "'.$license.'"';

//echo "<br>".$query."<br>";
// if Error, output the reason
if(!mysqli_query($connection,$query))
{
	die("Error: insert failed".mysqli_error($connection));
}

// update successfully notification
echo "Update Successfully!";
// try to show image
echo "<img src='".$row["docimage"]."' height='60' width='60'>";
 

// set 'back to Home Page' button
echo "<br><br>";
echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = submit value = 'Back to Home Page'>";
echo "</form>";

// close 
mysqli_close($connection);

?>
</body>
</html>
