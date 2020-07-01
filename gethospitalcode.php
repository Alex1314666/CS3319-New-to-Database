<?php
/*
	set query
	get all doctors from doctor table
*/
$query = "SELECT * FROM hospital";
/*
	check if the query has error to connect the database
*/
$result = mysqli_query ($connection, $query);
if(!result)
{
	die("databases query failed.");
}
/*
	make a select
	value is hospital's code
	output the hospital's name,city,province
*/
echo '<option value = "1">--SELECT HOSPITAL HERE--</option>';
while ($row = mysqli_fetch_assoc($result))
{
	echo "<option value = '".$row["hospitalcode"]."'>".$row["name"].",".$row["city"].",".$row["province"]."</option>";
}

mysqli_free_result($result);


?>
