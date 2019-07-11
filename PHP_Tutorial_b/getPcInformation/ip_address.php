<?php

// For CLIENT IP Address
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
{
	$IP = $_SERVER["HTTP_CLIENT_IP"];
}
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
{
	$IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else
{
	$IP = $_SERVER["REMOTE_ADDR"];
}
$file = fopen('ips.txt', 'w');
fwrite($file, $IP);
echo $IP;

// For CLIENT MAC Address
ob_start();
system('arp -a '.$_SERVER['REMOTE_ADDR']);
$arp=ob_get_contents();
ob_clean();
$lines=explode("\n", $arp);

#look for the output line describing our IP address
foreach($lines as $line)
{
   $cols=preg_split('/\s+/', trim($line));
   if ($cols[0]==$_SERVER['REMOTE_ADDR'])
   {
   		echo $macAddr=$cols[1];
   }
}

// For Server MAC Address
/*$string=exec('getmac');
$mac=substr($string, 0, 17); 
echo $mac;*/

?>