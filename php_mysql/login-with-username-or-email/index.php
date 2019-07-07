<?php
session_start();
$msg = '';
if(isset($_POST['login']) && ($_POST['username'] != '') && ($_POST['password'] != ''))
{
require_once "functions.php";
$name = cleanInput($_POST['username']);
$pass = md5(cleanInput($_POST['password']));

$check_email = Is_email($name);
if($check_email)
{
	// email & password combination
	$query = mysql_query("SELECT * FROM `users` WHERE `email` = '$name' AND `password` = '$pass'");
} else {
	// username & password combination
	$query = mysql_query("SELECT * FROM `users` WHERE `username` = '$name' AND `password` = '$pass'");
}
	$rows = mysql_num_rows($query);
	if($rows > 0)
	{
		//successfull login
	 	$_SESSION['username'] = $name;
	} else {
		$msg = "Invalid Login Credentials";
	}

mysql_close($connection);
} else {
$msg = "Please Provide All Details";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>How to login with username or email in PHP & MYSQL</title>
<style>
body { background:#fafafa; }
.outer { background:#fafafa; width:100%; }
.content { margin:0 auto; width:800px; background:#fff; height:400px; padding:20px;}
.textBox { padding:2px; height:27px; border:2px solid #ccc; width:200px;}
.alert { padding:3px; background:#ccc; font-weight:bold; }
</style>
 </head>
<body>
<center><script type="text/javascript"><!--
google_ad_client = "ca-pub-5104998679826243";
/* mysite_indivi */
google_ad_slot = "0527018651";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</center>
<div class="outer">
	<div class="content">
		<h1>How to login with username or email in PHP & MYSQL</h1>
		<table width="100%" cellpadding="2" cellspacing="3" style="border-collapse:collapse">
		<tr>
		<td valign="top">
		<?php if(empty($_SESSION['username'])) { ?>
		<p class="alert"><?php echo $msg; ?></p>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table cellpadding="2" cellspacing="2" style="border-collapse:collapse;">
		<tr>
		<td>Username / Email :</td><td><input type="text" class="textBox" placeholder="Username / Email" name="username" /></td>
		</tr>
		<tr>
		<td>Password :</td><td><input type="password" class="textBox" placeholder="Password" name="password" /></td>
		</tr>
		<tr>
		<td colspan="2" align="right"><input type="submit" value="Login" name="login" /></td>
		</tr>
		</table>
		</form>
		<?php } else { ?>
		Welcome, <?php echo $_SESSION['username']; ?> <br /> <br /> <a href="logout.php">logout</a>
		
		<center>
		<script type="text/javascript"><!--
google_ad_client = "ca-pub-5104998679826243";
/* mysite_content */
google_ad_slot = "2545318173";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</center>
		<?php } ?>
		</td>
		<td valign="top" width="50%">
		<p class="alert">Sample Login Details</p>
		<p>
		Username : test<br />
		Email : test@w3lessons.info<br />
		Password : test
		</p>
		<p>
		Username : karthik<br />
		Email : karthik@w3lessons.info<br />
		Password : karthik
		</p>
		</td>
		</tr>
		</table>
	</div>
</div>

<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=itzurkarthi"></script>
<script type="text/javascript">
  addthis.layers({
    'theme' : 'dark', 
    'follow' : {
      'services' : [
        {'service': 'facebook', 'id': 'w3lessons.info'},
        {'service': 'twitter', 'id': 'itzurkarthi'},
        {'service': 'linkedin', 'id': 'itzurkarthi'},
        {'service': 'google_follow', 'id': '100211765980263169317'},
        {'service': 'vimeo', 'id': 'itzurkarthi'},
        {'service': 'pinterest', 'id': 'itzurkarthi'},
        {'service': 'tumblr', 'id': 'w3lessons'},
        {'service': 'rss', 'id': 'http://w3lessons.info/feed'}
      ]
    },  
    'whatsnext' : {},  
    'recommended' : {
      'title': 'Recommended for you:'
    } 
  });
</script>
<!-- AddThis Smart Layers END -->


<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_floating_style addthis_counter_style" style="left:10px;top:150px;">
<a class="addthis_button_facebook_like" fb:like:layout="box_count"></a>
<a class="addthis_button_tweet" tw:count="vertical"></a>
<a class="addthis_button_google_plusone" g:plusone:size="tall"></a>
<a class="addthis_counter"></a>
</div>
<!-- AddThis Button END -->

<center>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-5104998679826243";
/* footer */
google_ad_slot = "7568359776";
google_ad_width = 970;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</center>

</body>
</html>
