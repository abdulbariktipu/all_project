<!DOCTYPE html>
<html>
	<head>
		<title>Page Title</title>
		<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#feedback').load('check.php').show();

				$('#username_input').keyup(function() {
					//$('#feedback').append('a');
					$.post('check.php', {username: form.username.value}, 
						function(result) {
						$('#feedback').html(result).show();
					});
				});
			});
		</script>
		<style type="text/css">
			#feedback{
				line-height: 10px;
				margin-bottom: 10px;
				display: inline;
			}
		</style>
	</head>
	<body>
		<form name="form">
			Username<input type="text" id="username_input" name="username">
		</form>
		<div id="feedback"></div>
	</body>
</html>