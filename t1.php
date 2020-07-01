
<?php
/*
	set query
	get all hospital from hospital table

*/
$query = "SELECT * FROM hospital";
$result = mysqli_query ($connection, $query);
/*
	check if the query has error to connect
*/
if(!result)
{
	die("databases query failed.");
}

echo '<select name = "piackahospital">';
echo '<option value = "1">--SELECT HOSPITAL HERE--</option>';
while ($row = mysqli_fetch_assoc($result))
{
	echo "<option value = '".$row["hospitalcode"]."'>".$row["name"].",".$row["city"].",".$row["province"]."</option>";
}
echo '</select><br><br>';
mysqli_free_result($result);


?>
