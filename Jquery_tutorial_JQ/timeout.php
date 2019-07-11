<!DOCTYPE html>
<html>
<head>
	<title>time out</title>
	<script src="jquery-1.11.2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script>
		function timeout()
		{
			var minute = Math.floor(timeLeft/60);
			var second = timeLeft%60;
			if (timeLeft<0) 
			{
				clearTimeout(countdownTimer);
				//document.getElementById('form1').submitForm(); 
				 document.getElementById('dis_sub').setAttribute('disabled', 'disabled'); 
				// $('#dis_sub').prop('disabled', true);
				document.forms["myForm"].submit();
			}
			else
			{
				var ms = minute+":"+second;
				var out = $('#times').val(ms);				
				document.getElementById('times').innerHTML=minute+":"+second;
			}
			timeLeft--;
			var countdownTimer = setTimeout(function(){timeout()},1000);
		}
	</script>
</head>
<body onload="timeout()">
	<h2>Time
		<script type="text/javascript">
			var timeLeft = 2*60;
		</script>
	<div id="times" style="float: right;">timeout</div> </h2>

	<form name="myForm" id="myForm" target="_myFrame" action="count_timeout.php" method="POST">
		<input type="submit" id="dis_sub" name="submit" onclick="submitForm();" value="submit">
	</form>
</body>
</html>
