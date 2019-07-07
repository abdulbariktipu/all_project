<?php
	//https://www.youtube.com/watch?v=lWBQvfRh7_M&t=4s
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Live Search</title>
	<script src="jq/jquery_1.3.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript">
		function getStates(value){
			$.post("getStates.php", {partialStates:value},function(data){
				$("#result").html(data);
			
			});
		}
	</script>
	<style type="text/css">
		input
		{
			width: 400px;
			font-size: 24px;
		}
		#result
		{
			width: 400px;
			height: 300px;
			border: 1px solid grey;
			display: none;
		}
		#result a
		{
			display: block;
			width: 98%;
			padding: 1%;
			font-size: 20px;
			border-bottom: 1px solid grey;
		}
	</style>
</head>
<body>
	<h1>Live Search</h1>
	<input type="text" onkeyup="getStates(this.value)"><br>
	<div id="result"></div>
</body>
</html>