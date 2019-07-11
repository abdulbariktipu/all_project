<?php
	//https://www.youtube.com/watch?v=lWBQvfRh7_M&t=4s
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Live Search</title>
	<script src="jquery-1.11.2.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script>
		function getStatus(value)
		{ 
			$.post('requires/fetch.php', {partialStatus: value}, function(data) {
				$("#results").html(data);
			});
		}
	</script> 
	<style type="text/css">
    	#results{
    		/*display: none;*/
    		position: absolute;
    		width: 170px;
    		max-height: 150px;
    		border: 1px solid #72b42d;
    		background: #B8C7B9 50% 50% repeat;
    		overflow: hidden;
    		overflow-y: scroll;
    	}
    	#results ul{
    		list-style: none;
    		max-height: 150px;
    	}
    	#results ul li{
    		padding: 2px 3px;
    		font-weight: normal;
    		font-size: 12px;
    		cursor: pointer;
    	}
    	#results ul li{
    
    	}
    	#results ul li:hover {
        background-color: yellow;
        border-radius: 7px;
        border: 1px solid #6666FF;
    	background-image: -moz-linear-gradient(bottom,rgb(136,170,214) 7%,rgb(194,220,255)10%,rgb(136,170,214)96%);
    	color: #ffffff;
    	}
    </style>
</head>
<body>
	<h1>Live Search</h1>
	<input type="text" name="search" id="search" onkeyup="getStatus(this.value);">
	<div id="results"></div>
</body>
</html>