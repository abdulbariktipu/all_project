<!DOCTYPE html>
<html>
<head>
	<title>Newsfeed Example</title>
	<link rel="stylesheet" type="text/css" href="newsfeed.css">
	<script src="jquery-1.11.2.min.js"></script>
	<script src="post_status.js"></script>
</head>
<body>
	<script>
		$(document).ready(function() 
		{
			$("#loader").hide();
			$("#feed").load("newsfeed.php");
		});
	</script>

	<div id="pre_box">		
		<textarea id="status_box" placeholder="Write a status here..."></textarea>
		<button id="status_btn">Post Status</button>
		<div id="status_error"></div>
	</div>
</body>
</html>