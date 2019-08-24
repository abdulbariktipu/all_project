<!DOCTYPE html>
<html>
<head>
	<title>Stop Watch</title>
</head>
<body>
	<h1 id="stopWatch">00:00:00</h1>
	<button id="start">Start</button>
	<button id="stop">Stop</button>
	<button id="clear">Clear</button>

	<script type="text/javascript">
		function disableButton() {
			document.getElementById("start").disabled = true;
		}
	</script>
	<script type="text/javascript">
		var h1 	= document.getElementById('stopWatch'),
	    start 	= document.getElementById('start'),
	    stop 	= document.getElementById('stop'),
	    clear 	= document.getElementById('clear'),
	    seconds = 0, minutes = 0, hours = 0, t;

		function add() 
		{
		    seconds++;
		    if (seconds >= 60) 
		    {
		        seconds = 0;
		        minutes++;
		        if (minutes >= 60) 
		        {
		            minutes = 0;
		            hours++;
		        }
		    }
		    
		    h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

		    timer();
		}

		function timer() 
		{
		    t = setTimeout(add, 1000);
		}
		//timer(); // onload

		function disableButton() 
		{
			document.getElementById("start").disabled = true;
			t = setTimeout(add, 1000);
		}

		/* Start button */
		start.onclick = timer;
		start.onclick = disableButton;

		/* Stop button */
		stop.onclick = function() 
		{
		    clearTimeout(t);
		}

		/* Clear button */
		clear.onclick = function() 
		{
		    h1.textContent = "00:00:00";
		    seconds = 0; minutes = 0; hours = 0;
		}
	</script>
</body>
</html>