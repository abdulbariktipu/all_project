<?php
	//https://www.youtube.com/watch?v=lWBQvfRh7_M&t=4s
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Live Search</title>
	<script src="jquery-1.11.2.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<style type="text/css">
    	#color_suggest{
    		display: none;
    		position: absolute;
    		width: 112px;
    		max-height: 150px;
    		border: 1px solid #72b42d;
    		background: #B8C7B9 50% 50% repeat;
    		overflow: hidden;
    		overflow-y: scroll;
    	}
    	#color_suggest ul{
    		list-style: none;
    		max-height: 150px;
    	}
    	#color_suggest ul li{
    		padding: 2px 3px;
    		font-weight: normal;
    		font-size: 12px;
    		cursor: pointer;
    	}
    	#color_suggest ul li:hover {
        background-color: green;
        border-radius: 7px;
        border: 1px solid #6666FF;
    	background-image: -moz-linear-gradient(bottom,rgb(136,170,214) 7%,rgb(194,220,255)10%,rgb(136,170,214)96%);
    	color: #ffffff;
    	}
    	ul, menu, dir { 
		    padding-inline-start: 5px;
		}
    </style>
	<script>
	    $(function()
		{
			$('#txt_batch_color').keyup(function() 
			{
				$('#color_suggest').show('fast');
				var color_name = $(this).val();
				// data="action=auto_search_autoComplite&color_name="+color_name;
				$.ajax({
					url: 'requires/fetch.php',
					type: 'POST',
					data: "action=auto_search_autoComplite&color_name="+color_name,
					// data: data,
					beforeSend:function(data)
					{
						// $('#txt_batch_color').html(data);
					},
					success:function(data)
					{
						$('#color_suggest').html(data);
					}
				});
			});
		}); 
    </script>
</head>
<body>
	<td align="center" id="color_td">
        <input type="text" name="txt_batch_color" id="txt_batch_color" class="text_boxes ui-autocomplete-input" style="width:100px" placeholder="Batch Color" autocomplete="off" />
        <input type="hidden" name="hidden_color_id" id="hidden_color_id" style="width:100px" placeholder="Batch Color"/>
        <div id="color_suggest"></div>
    </td>
</body>
</html>