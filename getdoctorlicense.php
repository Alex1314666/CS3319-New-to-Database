<?php
/*
	set query
	get all the doctor from doctor table
*/
$query = "SELECT * FROM doctor";
$result = mysqli_query ($connection, $query);

if(!result)
{
	die("databases query failed.");
}
/*
	make bunch options
	value is doctor's license
	out put the doctor's fullname
*/
while ($row = mysqli_fetch_assoc($result))
{
	echo "<option value = '".$row["license"]."'>".$row["firstname"]."  ".$row["lastname"]."</option>";
}

mysqli_free_result($result);


?>
