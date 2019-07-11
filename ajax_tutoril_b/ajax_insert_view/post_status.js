$(document).ready(function()
{
	$("#status_btn").click(function()
	{
		var status = $("#status_box").val();

			data = "s=" + status;

		$.ajax({
			method: "post",
			url: "post_status.php?",
			data: data,
			success: function(data)
			{
				$("#status_error").html(data);
			}
		});
	});
});