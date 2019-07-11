<!DOCTYPE html>
<html>
<head>
	<title>Date Time Calculation</title>
</head>
<body>
<h3>Calculate Age from Date of Birth Using PHP</h3>

<form method="post" action="">
	<input type="text" name="month" value="" placeholder="Month">
	<input type="text" name="year" value="" placeholder="Year">

	<input type="submit" name="submit" value="Calculate" />
</form>

<?php 
	if(isset($_POST['submit'])) {
	$month = $_POST['month'];
	$year = $_POST['year'];	
	$start_date= '01'.'-'.$month.'-'.$year;
	$end_date=date('d-m-Y', strtotime(date($year.'-'.$month)." -1 month"));

	echo 'Start date: '. $start_date.'<br>';
	echo 'End date: '.$end_date;

	}
	
?>

</body>
</html>