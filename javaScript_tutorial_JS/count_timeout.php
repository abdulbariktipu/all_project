<!DOCTYPE html>
<html>
<head>
	<title>time out</title>
	<script src="jquery-1.11.2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

	<script>
		var seconds = 1*60;		
		function secondPassed()
		{
			var minutes = Math.floor(seconds/60);
			var remainingSecond = seconds % 60;

			if (remainingSecond < 10) 
			{
				remainingSecond = "0" + remainingSecond;
			}
			else if (minutes < 10) 
			{
				minutes = "0" + minutes;
			}
			document.getElementById('countdown').innerHTML = minutes + ":" + remainingSecond;

			if (seconds == 0) 
			{
				clearInterval(countdownTimer);
				document.getElementById('countdown').innerHTML="Time Up";
				document.forms["myForm"].submit();
			}
			else
			{
				seconds --;
			}
		}
		var countdownTimer = setInterval('secondPassed()',1000);
	</script>

</head>
<body>	
	<form method="post" name="myForm" id="myForm" action="<?php echo $_SERVER["PHP_SELF"] ?>">
		<p>CountDown: <span id="countdown">Time Start</span></p>
		<h1>NID: 19656414727753187, Birth Date: 29-Jun-1965</h1>
		<input type="submit" name="submit" onclick="submit();" value="submit">
	</form>
</body>
</html>

