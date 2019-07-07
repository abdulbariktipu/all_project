
<?php 
	//$current_date = strtotime("2017-06-30");
	echo "Birth History for UserName"."<br>";
	echo "Date of Birth: 04-04-1995"."<br>";
	$date = date("Y-m-d");
	echo "Current Date: ".$date."<br>";

	$old_date = strtotime("1995-04-04");
	
	// echo $date.'Tipu';
	$current_date = strtotime($date);

	echo "Sechond: ".$current_date."<br>";

	$difference =  $current_date - $old_date;
	echo "Only Sechond: ".$current_date."<br>";
	echo "Difference Sechond: ".$difference."<br>";
	echo "Difference Minutes: ".floor($difference/(60))."<br>";
	echo "Difference Hours: ".floor($difference/(60*60))."<br>";
	echo "Difference Day: ".floor($difference/(60*60*24))."<br>";
	echo "Difference Month: ".floor($difference/(60*60*24*30))."<br>";
	echo "Difference Year: ".floor($difference/(60*60*24*30*12))."<br>";
?>

<!doctype html>
<html>
<head>
<title>Calculate Age</title>
</head>
<body>
<h3>Calculate Age from Date of Birth Using PHP</h3>

<form name="frm" method="post" action="">
	<input type="text" name="day" value="" placeholder="Day">
	<input type="text" name="month" value="" placeholder="Month">
	<input type="text" name="year" value="" placeholder="Year">

	<input type="submit" name="submit" value="Calculate" />
</form>

<?php 
	if(isset($_POST['submit'])) {
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$birthDate = $year.'-'.$month.'-'.$day;

	$dob = new DateTime($birthDate);  //DateTime Object

	$interval = $dob->diff(new DateTime); //calculates the difference between two DateTime objects 

	echo "<br />";
	echo "Date of Birth (yyyy-mm-dd): ".$birthDate;
	echo "<br />";
	echo "Your Age: ".$interval->y;
	//echo "Difference Day: ".floor($interval/(60*60*24))."<br>";
	}
?>

</body>
</html>
