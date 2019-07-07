<?php
include_once 'database.php':
if(isset($_POST['save']))
{
try {
$name = $_POST['name'];
$birth_day = $_POST['birth_day'];
$birth_day_a=substr("$birth_day",5);//send the month and day to database
//database connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//database connection
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO birth_day (name,birth_day,birth_day_a)
VALUES ('$name','$birth_day','$birth_day_a')";
$conn->exec($sql);
$message = "New member data added successfully. Name : ".$name." ";
}
catch(PDOException $e)
{
echo $sql . "
" . $e->getMessage();
}
$conn = null;
}
?>
<!DOCTYPE HTML>
<html>
<body>
<div><?php if(isset($message)) { echo $message; } ?>
</div> 
<form method="post" action="">
Name:<br>
<input type="text" name="name" placeholder="Name">
<br>
Birthday:<br>
<input type="text" name="birth_day" placeholder="Birthday (yy-mm-dd)">
<br><br>
<input type="submit" value="Submit" name="save">
</form> 
</body>
</html>