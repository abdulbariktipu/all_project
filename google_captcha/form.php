<!DOCTYPE html>
<html>
<head>
<title>Google Captcha Protection in form- Demo Preview</title>
<meta content="noindex, nofollow" name="robots">
<link href="style.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="scripts.js"></script>
</head>
<body>
<div id="mainform">
<div class="innerdiv">
<!-- Required Div Starts Here -->
<h2>Captcha creation using Google Library</h2>
<form id="myForm" method="post" name="myForm">
<h3>Fill Your Information!</h3>
<table>
<tr>
<!-- Including Google Captcha image from captcha.php -->
<td>
<img id="captcha_img" src="captcha.php">
<span id="reload">Can't read? try another one</span>
</td>
</tr>
<tr>
<td>Enter Text:</td>
<td><input id="captcha1" name="captcha" type="text"></td>
</tr>
<tr>
<td>
<input id="button" type='submit' value='Submit'>
</td>
</tr>
</table>
<?php include 'verify.php';?>
</form>
</div>
</div>
</body>
</html>