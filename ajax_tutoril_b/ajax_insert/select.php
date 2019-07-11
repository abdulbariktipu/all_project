<!DOCTYPE html>
<html>
<head>  
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>  
	
</head>
<body>
	<div id="message"></div>
	<div>  
		<input type="text" name="name" id="name" placeholder="name">
		<input type="text" name="email" id="email" placeholder="email">
		<input type="text" name="contact" id="contact" placeholder="contact">
		<button id="btn_insert">Post Status</button>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() 
	{
		$('#btn_insert').click(function() 
		{
			var name = $('#name').val();
			var email = $('#email').val();
			var contact = $('#contact').val();
			if (name!='' && email!='' && contact!='') 
			{
				$.ajax({
					method: "POST",
					url: "insert.php",
					data: {name:name,email:email,contact:contact},
					success: function(data)
					{
						$("#message").html(data);
					}
				});
			}
			else{
				alert("Please enter both fields");
			}
			
		});
	});
</script>
