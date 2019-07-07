$(document).ready(function()
{
	/*$(function(){
			$("#status_btn").click(function(){
				confirm("Press a button!");
			    //alert("The paragraph was clicked.");
			});
		});*/
	$("#status_btn").click(function()
	{
		var customer_name = $("#customer_name").val();
		if (customer_name=="") 
		{
			//alert('Customer Name is Requred');
			$("#msg").show(1000);
			return;
		}
		else {
			$("#msg").hide(1000);
		}
		var order_no = $("#order_no").val();
		var cbo_status = $("#cbo_status").val();

		var shipped_date = $("#txt_shipped_date").val();
		if (shipped_date=="") 
		{
			var date = $("#txt_shipped_date").val();
			//alert(date);
		}
		
		//alert(shipped_date);

		data = "customer_name="+customer_name+"&order_no="+order_no+"&s="+status+"&cbo_status="+cbo_status+"&txt_shipped_date="+shipped_date;
			//alert(data);

		$.ajax({
			method: "post",
			url: "post_status.php",
			data: data,
			beforeSend: function() 
			{
		        //$("#status_error").html('Loading..');
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
});