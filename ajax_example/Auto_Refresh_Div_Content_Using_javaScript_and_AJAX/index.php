<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Auto Refresh Div Content Using JavaScript and AJAX</title> 
	<script>
		function dis() 
		{
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
					document.getElementById("getData").innerHTML = this.responseText;
		    	}
			};
			xmlhttp.open("GET", "get_data.php", true);
			// if insert: xmlhttp.open("GET","get_data.php?q="+str,true);
			// https://www.w3schools.com/PHP/php_ajax_database.asp
			xmlhttp.send();
		}
		dis();

		setInterval(function(){ // For Refresh Div content 2 second we use setInterval()
			dis();
		},2000)

	</script>
</head>
<body>
	<div id="getData"></div>	
</body>
</html>