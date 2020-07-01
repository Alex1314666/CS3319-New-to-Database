<?php
/*
	set query
	get all the doctor rows from doctor table
*/
$query = "SELECT * FROM doctor";
$result = mysqli_query ($connection, $query);

/*
	check if query has error to connect the database

*/
if(!result)
{
	die("databases query failed.");
}

/*
	keep reading each doctor
	get doctor's license as option value
	output doctor's fullname
*/
while ($row = mysqli_fetch_assoc($result))
{
	echo "<option value = '".$row["license"]."'>".$row["firstname"]."  ".$row["lastname"]."</option>";
}

mysqli_free_result($result);


?>
