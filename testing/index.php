<?php
	$test=2;
if ($test>=3) {
  trigger_error("Value must be 1 or below");
}else{
	echo "OK";
}
?>

<?php
$d=cal_days_in_month(CAL_GREGORIAN,2,1965);
echo "There was $d days in February 1965.<br>";

$d=cal_days_in_month(CAL,2,2016);
echo "There was $d days in February 2018.";
?>