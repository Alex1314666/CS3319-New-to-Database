<!DOCTYPE html>
<html>
<head>
<!-- try a internal css --!>
<style>
body {background-color: gainsboro;}
h1   {color: darkslategrey;}
h2   {color: peru;}
p    {color: black;}
</style>
<meta charset="utf-8">
<link rel ="stylesheet" type = "text/css" href = "assn3.css">

<!-- title --!>
<title>Yi's Assignment3 Website for CS3319</title>
</head>

<body>

<!-- connect to my database --!>
<?php
include "connecttodb.php"
?>


<h1>Yi's Assignment3 Website for CS3319</h1>

 
<!--  Task 1: Search dorctor's list in order --!> 
<!--	a. ask user's option by radio --!>
<!--	b. to 'getdoctornameinorder.php' --!>
<h2>Search doctor's list by:</h2>
<form action="getdoctornameinorder.php" method="post">
    <p>Sorting by first name or last name</p>
    <input type = "radio" name = "name" value="firstname" checked>First Name<br>
    <input type = "radio" name = "name" value="lastname">Last Name<br><br>
    <p>Sorting by Ascending order or Descending order</p>
    <input type = "radio" name = "order" value = "ASC" checked>Ascending order<br>
    <input type = "radio" name = "order" value = "DESC">Descending order<br><br>   
    <input type="submit">
</form><br>

<hr>
 
<!--  Task 2: List the doctors whose license issue date is before the given date --!>
<!--	a. ask user to input a date --!>
<!--	b. to 'getlicensedate.php' --!>
<h2>List all the doctors who were licensed before a given date</h2>
<form action="getlicensedate.php" method="post">
Doctors' license issue date before: <input type="date" name="date"><br><br>
<input type="submit" value="Search">
</form><br>

<hr>
<!--   Task 3: Add a new doctor  --!>
<!--	a. ask user input doctor's firstname, lastname, doctorimage,specialty,license,license issue date, hospital --!>
<!--	b. to 'addnewdoctor.php' --!>
<h2> Add a new doctor </h2>
<form action = "addnewdoctor.php" method = "post" enctype = "multipart/form-data">
Please fill the form belows: <br><br>
Doctor's first name:<input type = "text" name = "firstname"><br><br>
Doctor's last name:<input type = "text" name = "lastname"><br><br>
Doctor Image: <input type = 'file' name = 'file' id = 'file'><br><br>
Specialty: <input type = "text" name = "specialty"><br><br>
License: <input type = "text" name = "license"><br><br>
License issue date: <input type = "date" name = "licensedate"><br><br>
For which hospital: 
<select name = "hospitalcode">
<?php
include "gethospitalcode.php";
?>
</select><br><br>
<input type = "submit" value = "Add New Doctor">
</form>

<hr>
<!--   Task 4: Delete Doctor --!>
<!--	a. let user select one of doctors --!>
<!--	b. to 'deletedoctor.php' and try to delete --!>
<!--   Note: --!>
<!--	Doctor who is a head of hospital cannot be delete --!>
<h2>Delete Doctor</h2>
<form action = "deletedoctor.php" method = "post">
Please selet doctor to detele:
<select name = "deletedoctor">
<option value = '1'>--SELECT A DOCTOR HERE--</option>
<?php
include "getdoctorlicense.php"
?>
</select><br><br>
<input type = "submit" value = "Delete">
</form>


<hr>
<!--   Task 5: Update Hospital Name --!>
<!--	a. ask user to input new name --!>
<!--	b. let user choose a exist hospital --!>
<!--	c. to 'updatehospital.php' and change the name --!>
<h2>Update Hospital Name</h2>
<form action = "updatehospital.php" method = "post">
Select the hospital:
<select name = "updatecode" >
<?php
include "gethospitalcode.php";
?>
</select><br><br>
New hosptial name:<input type = "text" name = "updatename"><br><br>
<input type = "submit" value = "Update">
</form>

<hr>
<!--   Task 6: Check the head of hospital --!>
<!--	a. List all the head doctor's firstname, lastname, and the date they became head --!>
<h2>Check the head doctor of hospital</h2>
<form action = "hospitalinfo.php" action = "post">
<button onclick  = "sortList()">Check</button>
</form>

<hr>
<!--  Task 7: Search patient information --!>
<!--	a. list patient's lastname, firstname, ohip --!>
<h2>Search patient information</h2>
<form action = "patientinfo.php" method = "post">
Patient OHIP number: <input type = "text" name = "ohip"><br><br>
<input type = "submit" value = "Search">
</form>


<hr>
<!--  Task 8: Assign/Drop doctor and patient --!>
<!--	a. let user select doctor and patient --!>
<!--	b. let user choose 'assign' or 'drop' --!>
<h2>Assign Doctor and Patient Relationship</h2>
<form action = "assign.php" method = "post">
Doctor:<select name = "doctor">
<option value = '1'>--SELECT A DOCTOR HERE--</option>
<?php
include "getdoctorlicense.php"
?>
</select><br><br>
Patient:<select name = "patient">
<option value ='1'>--SELECT A PATIENT HERE--</option>
<?php
include "getpatientname.php"
?>
</select><br><br>
<input type = "submit" name = "assign" value = "Assign">     <input type = "submit" name = "assign" value = "Drop"><br><br>
</form>


<hr>
<!--   Task 9: Search Doctor who has no patient --!>
<!--	a. only one radio button to show the output --!>
<h2>Search Doctor Who is Available</h2>
<form action = "nopatient.php" action = "post">
<input type = "submit" value = "Show doctors who have no patient">
</form>

<hr>
<!--   Task 10(Bonus): Upload Doctor's Picture --!> 
<!--	a. let user select one doctor --!>
<!--	b. if the doctor has no image, let user upload picture --!>
<!--	c. if the doctor has image, output picture --!>
<h2>Upload Doctor's Picture</h2>
Doctor:
<form action = "pickadoctor.php" method = "post">
<select name = "doctorimage">
<option value='1'>--SELECT A DOCTOR HERE--</option>>
<?php
include "getdoctorlicense.php"
?>
</select><br><br>
<input type = "submit" value = "Pick">
</form>

</body>
</html>
