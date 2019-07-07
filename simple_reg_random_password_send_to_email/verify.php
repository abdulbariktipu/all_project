<?php
//session_start();
include('conn.php');
$fname=$_POST['fname'];
$lname=$_POST['surname'];
$mname=$_POST['mname'];
$email=$_POST['email'];
$username=$_POST['uname'];

function randomString($length = 8) {
 $str = "";
 $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
 $max = count($characters) - 1;
 for ($i = 0; $i < $length; $i++) {
  $rand = mt_rand(0, $max);
  $str .= $characters[$rand];
 }
 return $str;
}

//$pword = randomString();

$password = randomString();

$vari = mysql_query("INSERT INTO users(fname, lname, mname, email, uname, pword)VALUES('$fname', '$lname', '$mname', '$email','$username', '$password')");

$subject = 'Forget password';
$message = 'Your username: '.$username.'  | Your password is: '.$password.'';
$headers = "From: noreplaymail69@gmail.com\r\n";

if (!$vari) {
	echo "<font color='red'>Registration failed! &#9785;</font><br>";
}
else{
    
    if (mail($email, $subject, $message, $headers)) {
         echo "<font color='green'>Message Sent! &#9786;</font><br> <a href='reg.php'>Click here to send another email</a>";
}
}




?>