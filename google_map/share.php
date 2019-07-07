<?php
	echo "Test share";
?>

<br>
<iframe src="https://www.facebook.com/plugins/share_button.php?href=http://localhost/google_map/index.php%2Fdocs%2Fplugins%2F&layout=button_count&size=small&mobile_iframe=true&width=88&height=20&appId" width="88" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
<br>
<iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.youtube.com/watch?v=ZGJ5oQPFa5I&t=14s%2Fdocs%2Fplugins%2F&layout=button_count&size=small&mobile_iframe=true&width=88&height=20&appId" width="88" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

<br>

<iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.google.com/maps/place/Nadda+Bus+Stand/@23.809308,90.421457,15z/data=!4m5!3m4!1s0x0:0x37b7cec2ba66e4da!8m2!3d23.8093078!4d90.4214568?hl=en-US%2Fdocs%2Fplugins%2F&layout=button_count&size=small&mobile_iframe=true&width=88&height=20&appId" width="88" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
<br>

<iframe src="https://www.facebook.com/plugins/share_button.php?href='.$actual_link.'&layout=button_count&size=small&mobile_iframe=true&width=88&height=20&appId" width="88" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

<br>

<?php

	$actual_link = (isset($_SERVER['https']) ? "https" : "http" )."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	echo $actual_link;

	$youtube = 'https://www.youtube.com/watch?v=Z4gMdPtAcZ0';
?>

<br>

<?php
	echo '<iframe src="https://www.facebook.com/plugins/share_button.php?href='.$youtube.'&layout=button_count&size=small&mobile_iframe=true&width=88&height=20&appId" width="88" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';	
?>