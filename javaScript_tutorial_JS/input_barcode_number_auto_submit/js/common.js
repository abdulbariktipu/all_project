/*$(document).ready(function()
{
	$("#status_btn").click(function()
	{
		var user = $("#user").val();
		var password = $("#password").val(); 

		data = "user="+user+"&password="+password;
			//alert(data);

		$.ajax({
			method: "post",
			url: "ajax/contact.php",
			data: data,
			beforeSend: function() 
			{
		        $("#status_error").html('Loading..');
		    },
			success: function(data)
			{
				$("#status_error").html(data);
			},
			error: function (error) 
			{
				alert(error);
			}
		});
	});
});*/