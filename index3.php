<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset = "utf-8">
<title>PHP cs3319 workshop</title>
</head>
<body>
<h1>Some extra PHP stuff</h1>
Here are some useful variables:
<ul>
<!-- try the code in workshop --!>
<?php
echo '<li>'.$_SERVER['SERVER_NAME'];
echo '<li>'.$_SERVER['REMOTE_ADDR'];
echo '<li>'.$_SERVER['DOCUMENT_ROOT'];
echo '<li>'.$_SERVER['SCRIPT_FILENAME'];
echo '<li>'.$_SERVER['PHP_SELF'];
?>
</ul>
</body>
</html>
