<?php
/*
	set query
	get all the patient rows in the patient table
*/
$query = "SELECT * FROM patient";
$result = mysqli_query ($connection, $query);

/*
	check if query has error to connect
*/
if(!result)
{
	die("databases query failed.");
}
/*
	keep reading rows
	get each row to be a option
	value is patient ohip, output patient's full name
*/
while ($row = mysqli_fetch_assoc($result))
{
	echo "<option value = '".$row["ohip"]."'>".$row["firstname"]."  ".$row["lastname"]."</option>";
}

mysqli_free_result($result);


?>
