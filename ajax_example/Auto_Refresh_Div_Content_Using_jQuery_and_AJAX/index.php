<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Auto Refresh Div Content Using jQuery and AJAX</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	<style>
	  body
	  {
	   margin:0;
	   padding:0;
	   background-color:#f1f1f1;
	  }
	  .box
	  {
	   width:500px;
	   border:1px solid #ccc;
	   background-color:#fff;
	   border-radius:5px;
	   margin-top:100px;
	  }
	  #load_tweets
	  {
	   padding:16px;
	   background-color:#f1f1f1;
	   margin-bottom:30px;
	  }
	  #load_tweets p
	  {
	   padding:12px;
	   border-bottom:1px dotted #ccc;
	  }
	</style> 
</head>
<body>
	<div class="container box">
		<form name="add_tweet" method="post">
			<h3 align="center">Tweet Page</h3>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="txt_user_name" id="txt_user_name"><br />
				</div>
				<div>
				<label>Message</label>
				<textarea name="tweet" id="tweet" class="form-control" rows="3"></textarea>
			</div>
			<div class="form-group" align="right">
				<input type="button" name="tweet_button" id="tweet_button"  value="Tweet" class="btn btn-info" />
			</div>
		</form>

		<br />
		<br />
		<div id="load_tweets"></div>
		<!-- Refresh this Div content every second!-->
		<!-- For Refresh Div content every second we use setInterval() !-->
	</div>
	<script>
		$(document).ready(function(){
			$('#tweet_button').click(function(){
				var tweet_txt = $('#tweet').val();				
				var user_name = $('#txt_user_name').val();
				//trim() is used to remover spaces
				if($.trim(tweet_txt)!='' ||  $.trim(user_name)!= '')
				{
					$.ajax({
						url:"insert.php",
						method:"POST",
						data:{tweet:tweet_txt,user:user_name},
						dataType:"text",
						success:function(data)
						{
							$('#tweet').val("");
							$('#txt_user_name').val("");
						}
					});
				}
			});
		 
			setInterval(function()
			{   //setInterval() method execute on every interval until called clearInterval()
				$('#load_tweets').load("fetch.php").fadeIn("slow");
				//load() method fetch data from fetch.php page
			}, 1000);		 
		});
	</script>
</body>
</html>