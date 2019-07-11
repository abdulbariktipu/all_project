

$(document).ready(function() 
{
	$("#login_btn").click(function() 
	{
		//alert("Login...");
		var var_user = $("#username").val();
		var var_pass = $("#password").val();

		var data = "username="+var_user+"&pass="+var_pass;
		//alert(data);
		$.ajax({
			method: "post",
			url: "login.php?",			
			data: data,
			success: function(data)
			{
				$("#login_output").html(data);
			},

			error: function(error) 
			{
				alert(error);
			}

		});
		
	});
});