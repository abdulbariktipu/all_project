<?php

// For Server ALL NETWORK INFORMATION
function mac()
{
	ob_start();
	system('ipconfig/all');
	$mycom=ob_get_contents();
	ob_clean();

	$findme='Physical';
	$pmac=strpos($mycom, $findme);
	$mac=substr($mycom, ($pmac+36),17);
	return 'MAC Address: '.$mac;
}

echo mac();

echo '<br>';

function ip_address()
{
	ob_start();
	system('ipconfig/all');
	$mycom=ob_get_contents();
	ob_clean();

	$findme='IPv4';
	$pip=strpos($mycom, $findme);
	$myip=substr($mycom, ($pip+36),14);
	return 'IP Address: '.$myip;
}

echo ip_address();
?>

