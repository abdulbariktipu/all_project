<!DOCTYPE html>
<html>
	<head>
		<title>input barcode number auto submit My code 2019/02/13 21:45</title>
		<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
		<script src="js/common.js"></script> 
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
		<script>
		/*$(document).ready(function(){
		     $('#user').keyup(function(){
		       // or // $('#id_form').on('change', function(){
    		    var user = $('#user').val();
    		  //  var password = $('#password').val();
    		    if (user!="") //  && password!=""
    		    {
    		        document.getElementById("id_form").submit();
    		    }
		    });
		});*/

		/*$(document).ready(function()
		{
			$("#user").click(function()
			{
				var user = $("#user").val();
				var password = $("#password").val(); 

				data = "user="+user+"&password="+password;
					//alert(data);
				//$("#show_data").show();
				$.ajax({
					method: "GET",
					url: "ajax/contact.php",
					data: data,
					beforeSend: function() 
					{
				        $("#show_data").html('Loading..');
				    },
					success: function(data)
					{
						$("#show_data").html(data);
					},
					error: function (error) 
					{
						alert(error);
					}
				});
			});
		});*/
		$(document).ready(function(e){
			$("#q").keyup(function()
			{
				$("#here").show();
				var q = $("#q").val();
				var password = $("#password").val(); 

				data = "q="+q;
				$.ajax(
				{
					type:'GET',
					url:'ajax/contact.php',
					success:function(data)
					{
						$("#here").html(data);
					}
					,
				});
			});
		});
        </script>
	</head>
	<body>
        <form id="id_form" action="ajax/contact"  method="post">
            Username: <input type="text" name="q" id="q" value="" /><br />
            Password: <input type="password" name="password" id="password" value="" /><br />
            Save password: <input type="checkbox" name="session"/><br />
            <input type="submit" id="status_btn" value="Submit" value="Send" />
        </form>
        <div id="here"></div>
	</body>
</html>