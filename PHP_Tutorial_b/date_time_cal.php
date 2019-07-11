<!DOCTYPE html>
<html>
<head>
	<title>Date Time Calculation</title>
<!-- 
	Created by: Tipu
	Created Date: 08-06-2018
	Time: 2:22 AM
	Updated by:
	Updated Date:
	Country: Bangladesh
-->
</head>
<body>
<h3>Calculate Age from Date of Birth Using PHP</h3>
<?php
	$months = array("1"=>"January", "2"=>"Feb", "3"=>"March");
	$year = array("2017","2018","2019");
?>
<form method="post" action="">
	<!-- <input type="text" name="month" value="" placeholder="Month"> -->
	<input type="number" name="month" max="12" min="1" placeholder="Month" required="" min="1" max="12" autocomplete="off">
	<input type="number" name="year" value="" placeholder="Year" required="" min="2016" max="2020" autocomplete="off">

	<input type="submit" name="submit" value="Calculate" />
</form>

<?php 
	if(isset($_POST['submit'])) 
	{
		$month = $_POST['month'];
		$year = $_POST['year'];	
		$start_date= '01'.'-'.$month.'-'.$year;
		$pre_strt_date=date('d-m-Y', strtotime(date($year.'-'.$month)." -1 month"));
		$pre_end_date=date('m-Y', strtotime(date($year.'-'.$month)." -1 month"));

		// $month = date('m');
		// $year = date('Y');
		$dayinmonth=cal_days_in_month(CAL_GREGORIAN,$month,$year);
		//echo 'Start date: '. $start_date.'<br>';
		echo 'Previous start date from inputed date: '.$pre_strt_date.'<br>';
		echo 'Previous end date from inputed date: '.$dayinmonth."-".$pre_end_date.'<br>';
		// echo "Current Month Start Date: 01-".$month."-".$year."<br>";
		// echo "Current Month End Date: ".$dayinmonth."-".$month."-".$year;
		$cur_str_date="01-$month-$year";
		$cur_end_date = "$dayinmonth-$month-$year";
		echo "Current Month Start Date: $cur_str_date<br>";
		echo "Current Month End Date: $cur_end_date";
	}
	
?>
</body>
</html>