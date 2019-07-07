<?php
include_once 'database.php';
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$city_name = $_POST['city_name'];
$email = $_POST['email'];
// sql query for inserting data into database
$query = mysql_query("insert into users (first_name,last_name,city_name,email) values ('$first_name','$last_name','$city_name','$email')") or die(mysql_error());

$query = mysql_query("SELECT * FROM users where email='$email'");
	$row = mysql_fetch_array($query);
	$fetch_email=$row['email'];
	$email=$row['email'];
	
	if($email==$fetch_email) {
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$city_name = $row['city_name'];
		$to = $email;
		$subject = "New Registration";
		$txt = 'test image';
		$txt = "Welcome! Your are a new user. "."<img src='img1.png'>"."\n"."Your first_name is : $first_name, "."Your last_name is : $last_name, "."Your city_name is : $city_name, "."Your email is : $email";
		$headers = "From: noreplaymail69@gmail.com" . "\r\n" .
		"CC: somebodyelse@example.com";
		mail($to,$subject,$txt,$headers);
		 echo "Message Sent!";
	}
	else{
		echo "Invalid User ID! Message Not Sent!";
	}
?>

<img src="img1.png">