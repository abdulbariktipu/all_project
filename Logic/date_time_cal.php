<!DOCTYPE html>
<html>
<head>
	<title>Date Time Calculation</title>
</head>
<body>
<h3>Calculate Age from Date of Birth Using PHP</h3>
<?php
	$months = array("1"=>"January", "2"=>"Feb", "3"=>"March");
	$year = array("2017","2018","2019");
?>
<form method="post" action="">
	<!-- <input type="text" name="month" value="" placeholder="Month"> -->
	<input type="number" name="month" max="12" min="1" placeholder="Month" required="">
	<input type="text" name="year" value="" placeholder="Year" required="">

	<input type="submit" name="submit" value="Calculate" />
</form>

<?php 
	if(isset($_POST['submit'])) {
	$month = $_POST['month'];
	$year = $_POST['year'];	
	$start_date= '01'.'-'.$month.'-'.$year;
	$end_date=date('d-m-Y', strtotime(date($year.'-'.$month)." -1 month"));

	echo 'Start date: '. $start_date.'<br>';
	echo 'End date: '.$end_date.'<br>';

	$month = date('m');
	$year = date('Y');
	$dayinmonth=cal_days_in_month(CAL_GREGORIAN,$month,$year);
	$cur_str_date="01-$month-$year";
	$cur_end_date = "$dayinmonth-$month-$year";
	echo "Current Month Start Date: $cur_str_date<br>";
	echo "Current Month End Date: $cur_end_date";
	}
	
?>

</body>
</html>