<?php
if (isset($_POST['submit'])) {
$mark = $_POST['mark'];
}
//$mark = '';
$grade = '';
error_reporting(0);
switch ($mark) {

	case ($mark>=80):
		$grade = 4;
		break;

	case ($mark>=70):
		$grade = 3;
		break;

	default:
		$grade = 'F';
};

	echo $grade;

?>

<form action="" method="post">
	<input type="text" name="mark" id="mark">
	<input type="submit" name="submit" onclick="cal();">
</form>