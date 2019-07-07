<!DOCTYPE html>
<html>
<head>
	<title>Checkbox Insert</title>
</head>
<body>
	<form method="post" action="#">
		First Name: <input type="text" name="fname"><br>
		Last Name: <input type="text" name="lname"><br>

		Gender: <input type="radio" name="gender" value="0">Male
				<input type="radio" name="gender" value="1">Female<br>
		Languages
		<input type="checkbox" name="english" value="English">English
		<input type="checkbox" name="hindi" value="Hindi">Hindi
		<input type="checkbox" name="gujarati" value="Gujarati">Gujarati
		<input type="checkbox" name="tamil" value="Tamil">Tamil<br>

		<input type="submit" name="submit" value="Save">
	</form>
</body>
</html>

<?php
//https://www.youtube.com/watch?v=cFZVG0tqyxY
error_reporting(0);
require "dbconnect.php";//connect to database 

if(isset($_POST['submit'])){
	$fname=mysql_real_escape_string($_POST['fname']);
	$lname=mysql_real_escape_string($_POST['lname']);
	$gender=mysql_real_escape_string($_POST['gender']);
	$eng=mysql_real_escape_string($_POST['english']);
	$hin=mysql_real_escape_string($_POST['hindi']);
	$guj=mysql_real_escape_string($_POST['gujarati']);
	$tam=mysql_real_escape_string($_POST['tamil']);
        
        $sql = "INSERT INTO contact (fname,lname,gender,english,hindi,gujarati,tamil) 
					VALUES ('$fname','$lname','$gender','$eng','$hin','$guj','$tam')";
			

            if(mysql_query($sql))
            	echo "Record Saved";
			else
				echo mysql_error();

    }

?>