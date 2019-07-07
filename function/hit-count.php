<?php 
/* part 1
function hit_count(){
	$filename = 'count.txt';
	$handle = fopen($filename, 'r');
	$current = fread($handle, filesize($filename));
	fclose($handle);

	$current_inc = $current + 1;

	$handle = fopen($filename, 'w');
	fwrite($handle, $current_inc);
	fclose($handle);
	//echo $current;
}

//hit_count();
*/

//part 2

$ip_address = $_SERVER['REMOTE_ADDR'];

function hit_counter(){
	$ip_file = file('ip.txt');
	foreach ($ip_file as $ip) {
		$ip_sigle = trim($ip).',';//space remove for using "trim()" function. 
		if ($ip_address==$ip_sigle) {
			
		}else{
			
		}
	}
}

?>










