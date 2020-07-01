<!DOCTYPE html>
<html>
<head>
<!-- extern css --!>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset = "utf-8">
<title>Doctor's infomation</title>
</head>

<body>
<!-- connect to the database --!>
<?php
include "connecttodb.php";
?>

<h1>Doctor's information</h1>
<?php
/*
	get the doctor's license
	set the query
	pick the doctr row
*/
$whichdoctor = $_POST["doctorimage"]; // get selected doctor
$query = 'SELECT * FROM doctor WHERE license = "'.$whichdoctor.'"';

//$query = 'UPDATE doctor SET docimage = "'.$docpic.'" WHERE license = "'.$whichdoctor.'"'; // fill in which correct query
//echo "<br>". $query . "<br>";


$result = mysqli_query($connection,$query);
if(!$result)
{
	die("databases query on showing doctor's image in failed.");
}
$row = mysqli_fetch_assoc($result);
/*
	if doctor has image
	output image
*/
if(!empty($row['docimage']))
{
	echo '<img src="' . $row["docimage"] . '" height="60" width="60">';
}
/*
	otherwise
	allow user to upload a pickture 
*/
else{
	echo "<form action = 'addimage.php' method = 'post' id = '.$whichdoctor.' enctype = 'multipart/form-data'>";
	echo "Doctor image upload: <input type = 'file' name = 'file' id = 'file'><br><br>";
	echo "<input type = 'hidden' name = 'doctor' value = '".$whichdoctor."'>";
	echo "<input type ='submit' value = 'Upload'><br><br>";
	echo "</form>";	
}

/*
	"GO BACK TO HOME PAGE"
*/
echo "<form action = 'index2.php' method = 'post'>";
echo "<input type = 'submit' value = 'Back to Home page'>";
echo "</form>";

mysqli_free_result($result);
mysqli_close($connection);
?>
</body>
</html>
