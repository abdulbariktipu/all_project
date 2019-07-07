<?php

function MyName(){
	echo "Tipu";
}
echo "My name is ";
MyName();

echo "<br>----------<br>";

$number1 = 10;
$number2 = 5;
function add($number1, $number2){
	echo "function argument = ";
	echo $number1 + $number2;
	echo '<br>';
}
add($number1, $number2);

echo "<br>----------<br>";

function DisplayDate($day,$date,$year){
	echo $day." ".$date." ".$year;
}
DisplayDate('Monday',4,2017);
echo "<br>----------<br>";


function AddTwo($num1, $num2){
	$result = $num1 + $num2;
	return $result;
}
echo AddTwo(10, 20);
echo "<br>----------<br>";

function addAgain($num3, $num4){
	$result = $num3 + $num4;
	return $result;
}	

function divide($num3, $num4){
	$result = $num3 / $num4;
	return $result;
}

$sum = divide(addAgain(10, 10), addAgain(5, 5));
echo $sum;
echo "<br>----------<br>";

$user_ip = $_SERVER['REMOTE_ADDR'];
function echo_ip(){
	global $user_ip;
    $string = 'Your IP address is global variable: '.$user_ip;
    echo $string;
}
echo_ip();
echo "<br>----------<br><br>";

function echo_ip_inside(){
	$user_ip_inside = $_SERVER['REMOTE_ADDR'];
    $string_inside = 'Your IP address is inside variable: '.$user_ip_inside;
    echo $string_inside;
}
echo_ip_inside();

echo "<br><br>----String Function------<br><br>";
$string = 'This is an example string.';
$string_word_count = str_word_count($string, 1);
print_r($string_word_count); //or
//echo $string_word_count;

echo "<br>----String Function------<br><br>";
$strings = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$strings_shuffled = str_shuffle($strings);

$half = substr($strings_shuffled, 0, 5);
echo 'Capcha Code: '.$half;
echo '<input type="text" name="">';

echo "<br>----str_reverse------<br><br>";
$string_ano = 'skdfhsghsdajh92746182872';
$str_reverse = strrev($string_ano);

echo $str_reverse;


echo "<br>----string_length------<br><br>";
$string_len = 'This is an example string.';
$string_length = strlen($string_len);

echo $string_length.'<br>';

if($string_length>=26){
	echo "Max 26 character";
}else{
	echo "Not in 26 character";
}

echo "<br>----array one------ <br><br>";
$food = array('Pasta'=>33,'Pizza'=>22,'Salad'=>44);
print_r($food);

echo "<br>----array multi------ <br><br>";
$array_multi = array('Healhy'=>
								array('Salad','Vegetables','Pasta'),
					 'Unhealthy'=>
					 			array('Biff','Rost','Sweet'));
//print_r($array_multi);

foreach ($array_multi as $element => $inner_array) {
	echo '<strong>'.$element.'</strong><br>';
	foreach ($inner_array as $item) {
		echo $item.'<br>';
		echo $array_multi['Unhealthy'][1].'<br>';
	}
}

echo "<br>----Expression Matching----<br><br>";
$expression_string = 'My name is Tipu';

if(preg_match('/Tipu/', $expression_string)){
	echo 'Match found';
}else{
	echo 'No match found';
}

echo "<br>-More Expression Matching-<br><br>";
function has_space($has_string){
	if (preg_match('/ /', $has_string)) {
		return true;
	}else{
		return false;
	}
}

$has_string = 'My nameis tipu';

if(has_space($has_string)){
	echo 'Has at least one space';
}else{
	echo 'Has no space';
}

echo "<br>-String length-<br><br>";
$len_string = 'Tipu';
$string_lengths = strlen($len_string);
for ($i=0; $i <$string_lengths; $i++) { 
	echo $i.'<br>';
}


echo "<br>-Upper_Lower Case-<br><br>";
$str_uper_lower = 'I could be any case';
$string_uper = strtoupper($str_uper_lower); 
$string_lower = strtolower($str_uper_lower); 
echo $string_uper.'<br>';
echo $string_lower;


echo "<br>-Upper_Lower Case-<br><br>";
if (isset($_GET['user_name'])) {
	$user_name = $_GET['user_name'];
	$string_uper = strtoupper($user_name);
	$string_lower = strtolower($user_name);
	echo 'string_uper: '.$string_uper.'<br>';
	echo 'string_lower: '.$string_lower;

	echo '<form action="function.php" method="GET">
	Name: <input type="text" name="user_name">
	<input type="submit" value="Submit">
		</form>';
}


echo "<br>-String Position-<br><br>";
$offset = 0;
$find = 'is';
$find_length = strlen($find);
$my_string = 'This is string, and it is test';
//echo 'String Position: '.strpos($my_string, $find,10).'<br>';
//echo 'String Length: '.$find_length;
while ($string_position = strpos($my_string, $find, $offset)) {
	echo '<strong>'.$find.'</strong> found at '.$string_position.'<br>';
	$offset = $string_position + $find_length;
}

echo "<br>-Replacing-<br><br>";
$replacing_string = 'This part dont search. This part search';
$string_new = substr_replace($replacing_string, 'Tipu', 28, 4);
echo $replacing_string.'<br>';
echo $string_new;

echo "<br>-Replacing-<br><br>";
$finds = array('tipu','jannt','sathi');
$replas = array('t**u','j***t','s**i');

if (isset($_POST['user_input'])&&!empty($_POST['user_input'])) {
	$user_input = $_POST['user_input'];
	$user_input_new = str_ireplace($finds, $replas, $user_input);
	echo $user_input_new;
}
echo'<form action="function.php" method="POST">
		Name: <textarea name="user_input" rows="4" cols="20">
		</textarea><br>
		<input type="submit" value="Submit">
	</form>';


echo "<br>-Timestamp-<br><br>";
$time = time();

$time_now = date('d M Y @ H:i:s', $time );

$time_modified = date('d M Y @ H:i:s', $time-(7*24*30*30));

echo 'The time now is '.$time_now.'<br>The time modified is '.$time_modified;


echo "<br>-Timestamp-<br><br>";
$rand = rand(1, 6);//range 1-6 number
echo $rand.'<br>';

if (isset($_POST['roll'])) {
	$rand = rand();
	echo 'Your rolled a '.$rand;
}

echo'<form action="function.php" method="POST">
		<input type="submit" name="roll" value="Roll dice.">
	</form>';
	


echo "<br>-_SERVER-<br><br>";

$script = $_SERVER['SCRIPT_NAME'];
echo $script;

echo "<br>-_SERVER-2-<br><br>";
include 'from.php';

if(isset($_POST['submit'])){
	echo 'process 1';
}
?>


<!-- <?php
// echo "<br>-ob_start()-<br><br>";
// ob_start(); 
?>
<h1>My page</h1>
This is my page

<?php 
//$redirect_page = 'from.php';
//$redirect = false;

// if ($redirect==true) {
// 	header('location: '.$redirect_page);
// }

// ob_end_flush(); //ob_end_clean()
?> -->

<?php
// echo "<br>-Visitor IP-<br><br>";
// $ip_address = $_SERVER['REMOTE_ADDR'];
// $ip_blocked = array('::1','100.100.100.100','192.968.10.10');
// //echo 'Visitor IP is '.$ip_address;

// foreach ($ip_blocked as $ip) {
// 	if ($ip==$ip_address) {
// 		die('Your ip address, '.$ip_address);
// 	}
// }
?>
<h1>Welcome</h1>




<?php
echo "<br>-Better way Visitor IP-<br><br>";
$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
$http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDER_FOR'];
$remote_addr = $_SERVER['REMOTE_ADDR'];

if (!empty($http_client_ip)) {
	$ip_addres = $http_client_ip;
}elseif (!empty($http_x_forwarded_for)) {
	$ip_addres = $http_x_forwarded_for;
}else{
	$ip_addres = $remote_addr;
}
echo $ip_addres;
?>



<?php
echo "<br>-Detecting a visitor browser-<br><br>";
$browser = get_browser(null, true);
//print_r($browser).'<br>';
$browser = strtolower($browser['browser']);
 //echo $browser;
if ($browser!='default browser') {
	echo 'You are not using chrome';
}
?>

<?php
echo "<br>-Detecting a visitor browser-<br><br>";

if(isset($_POST['register_btn'])){
	$day = htmlentities($_POST['day']);
	$date = htmlentities($_POST['date']);
	$year = $_POST['year'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];

	if (!empty($day)&&!empty($date)&&!empty($year)&&!empty($password)&&!empty($repassword)) {

    //if ($password == $repassword) {
    		echo 'OK';
    	}else{
    		echo 'required field';
    	}
		
		if ($password == $repassword) {
    		echo 'Password match';
    	}else{
    		echo 'Password do not match';
    	}
    //}	
}

echo'
<form action="function.php" method="POST">
	Day:<input type="text" name="day"><br>
	Date:<input type="text" name="date"><br>
	Year:<input type="text" name="year"><br>
	Password:<input type="password" name="password"><br>
	Re-Password:<input type="password" name="repassword"><br>
	<input type="submit" name="register_btn" value="Submit"/>
</form>';
?>



<?php
session_start();
$_SESSION['username']='Tipu';
if (isset($_SESSION['username'])) {
	echo 'Welcome, '.$_SESSION['username'];
}else{
	echo 'Please log in';
}
?>


<?php
 //setcookie('user','Jannat',time()+10);
 //echo $_COOKIE['user']; 
?>

<?php
echo "<br>-File write-<br><br>";
$handle = fopen('names.txt', 'w');
fwrite($handle, 'Jannat');
fclose($handle);
echo 'Written';
?>


<?php
echo "<br>-Detecting a visitor browser-<br><br>";

if (isset($_POST['reading'])) {
	$name = $_POST['reading'];
	if (!empty($name)) {
		$handles = fopen('reading.txt', 'a');
		fwrite($handles, $name."\n");
		fclose($handles);

		$readin = file('reading.txt');
		
	}else{
		echo 'Please type a name.';
	}
}

echo'
<form action="function.php" method="POST">
	<input type="text" name="reading"><br>
	<input type="submit" name="reading" value="Input"/>
</form>';
?>

<?php
$fopen = fopen('open.txt', 'w');
fwrite($fopen, 'Puti + '."\n");
fwrite($fopen, 'Janu');

fclose($fopen);

echo 'Written';
?>


<?php
echo "<br>-Append-<br><br>";

if (isset($_POST['append'])) {
	$append = $_POST['append'];
	if (!empty($append)) {
		$hand = fopen('append.txt', 'a');
		fwrite($hand , $append ."\n");
		fclose($hand);
	}else{
		echo 'Please type a name';
	}
}



echo'
<form action="function.php" method="POST">
	<input type="text" name="append"><br>
	<input type="submit" value="Append"/>
</form>';
?>

<?php
$filename_or = 'image.jpg';
$filename = rand(1000,9999).md5($filename_or).rand(1000,9999);

echo $filename;
?>

<?php
$filename_or = 'image.jpg';
$filename = rand(1000,9999).md5($filename_or).rand(1000,9999);

echo $filename;
?>

<?php
error_reporting(0);
echo "<br>-Uploading file-<br><br>";

$name = $_FILES['file']['name'];
//$size = $_FILES['file']['size'];
//$type = $_FILES['file']['type'];

$tmp_name = $_FILES['file']['tmp_name'];
//$error = $_FILES['file']['error'];

if (isset($name)) {
	if (!empty($name)) {

		$location = 'upload/';
		if(move_uploaded_file($tmp_name, $location.$name)){

			echo 'Uploaded';
		}

	}else{
		echo 'Please select file';
	}
}

echo'
<form action="function.php" method="POST"enctype="multipart/form-data">
	<input type="file" name="file"><br>
	<input type="submit" value="Submit"/>
</form>';
?>


<?php
echo "<br>-Non-unique hit counter-<br><br>";

/*part 1
include 'hit-count.php';
hit_count();
*/

//part 2
include 'hit-count.php';
hit_counter();

?>








