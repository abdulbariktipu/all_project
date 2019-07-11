<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <a href="https://github.com/marufhasan1/user_info/blob/master/UserInfo.php" target="_blank">login form how to give access only to one device</a>
</body>
</html>
<?php

$agent = $_SERVER['HTTP_USER_AGENT']; 

$mainIp = '';
if (getenv('HTTP_CLIENT_IP'))
    $mainIp = getenv('HTTP_CLIENT_IP');
else if(getenv('HTTP_X_FORWARDED_FOR'))
    $mainIp = getenv('HTTP_X_FORWARDED_FOR');
else if(getenv('HTTP_X_FORWARDED'))
    $mainIp = getenv('HTTP_X_FORWARDED');
else if(getenv('HTTP_FORWARDED_FOR'))
    $mainIp = getenv('HTTP_FORWARDED_FOR');
else if(getenv('HTTP_FORWARDED'))
    $mainIp = getenv('HTTP_FORWARDED');
else if(getenv('REMOTE_ADDR'))
    $mainIp = getenv('REMOTE_ADDR');
else
    $mainIp = 'UNKNOWN';
echo $mainIp;


$browserArray = array(
    'Mozila' => 'Mozila',
    'Chrome' => 'Chrome'
    );

foreach ($browserArray as $key => $value) 
{
    if (preg_match("/$value/", $agent)) 
    {
        break;
    }
    else
    {
        $key = 'Browser do not match';
    }
}    

if ($mainIp=='192.168.0.115') 
{
   $broser = $key;
    echo $broser;
}

    

?>
