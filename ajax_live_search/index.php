<?php
	//https://www.youtube.com/watch?v=lWBQvfRh7_M&t=4s
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Live Search</title>
	<script src="jq/jquery-1.11.2.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script>
		$(document).ready(function(e){
			$("#search").keyup(function()
			{
				$("#here").show();
				var x = $(this).val();
				$.ajax(
				{
					type:'GET',
					url:'fetch.php',
					data:'q='+x,
					success:function(data)
					{
						$("#here").html(data);
					}
					,
				});
			});
		});
	</script>
	<style type="text/css">
		input
		{
			width: 400px;
			font-size: 24px;
		}
		#here
		{
			width: 400px;
			height: 300px;
			border: 1px solid grey;
			display: none;
		}
		#here a
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
	<input type="search" name="search" id="search">
	<div id="here"></div>
</body>
</html>