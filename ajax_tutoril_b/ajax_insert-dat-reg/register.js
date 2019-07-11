$(document).ready(function() {
	$("#register").click(function() {
		//alert("Registering...");
		var var_user = $("#username").val();
		var var_pass = $("#password").val();
		var var_email = $("#user_email").val();

		var data = "user=" + var_user + "&pass=" + var_pass + "&mail=" + var_email;

		$.ajax({
			method: "post",
			url: "register.php?",			
			data: data,
			success: function(data)
			{
				var alet = $("#register_output").html(data);
				alert(data);
			}
		});
		
	});
});