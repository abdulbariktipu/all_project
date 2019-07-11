<!DOCTYPE html>
<html>
<head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
    	function dataSubmit(operation)
	    {
	        if (operation==1)
	        {
	        	/*var value_is=$('#txt_item_account_').val();
	        	alert(value_is);*/
	            var row_num=$('#dynamic_field tr').length;
		      	var multi_data="";
		      	// alert(row_num);return;
		      	for (var j=1; j<=row_num; j++)
    				{
    					multi_data+="&txt_item_account_" + j + "='" + $('#txt_item_account_'+j).val()+"'&txt_item_dtls_" + j + "='" + $('#txt_item_dtls_'+j).val()+"'";
    				}
    				
    				var data="action=save_update_delete_dtls&row_num="+row_num+multi_data;
    				// alert(data);return;
	        }

	        var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function()
	        {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("showReport").innerHTML = this.responseText;
	            }
	            else {
	                document.getElementById('showReport').innerHTML = '<div class="loader"></div>';
	            }
	        }
	        xmlhttp.open("POST", "index_controller.php", true);
	        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	        xmlhttp.send(data);     
	    }
    </script>
</head>
<body>


<div class="container">
    <h2 align="center">PHP - Dynamically Add or Remove input fields using JQuery</h2>  
    <div class="form-group">
         <form name="add_name" id="add_name">

            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>
                        <td><input type="text" name="txt_item_account_1" id="txt_item_account_1" placeholder="Enter your Name" class="form-control name_list" ></td>

                        <td><input type="text" name="txt_item_dtls_1" id="txt_item_dtls_1" placeholder="Iteme Dtls" class="form-control name_list" ></td>

                        <td><button type="button" name="added" id="added" class="btn btn-success">Add More</button></td>  
                    </tr>
                </table>
                <button type="button" onclick="dataSubmit(1)">Save</button>
            </div>

         </form>  
    </div> 
</div>
<p><span id="showReport"></span></p>

<script type="text/javascript">
    $(document).ready(function()
    {
      var i=1;

      	$('#added').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="txt_item_account_'+i+'" id="txt_item_account_'+i+'" placeholder="Enter your Name" class="form-control name_list" required /></td><td><input type="text" name="txt_item_dtls_'+i+'" id="txt_item_dtls_'+i+'" placeholder="Iteme Dtls" class="form-control name_list" required /></td><td><button type="button" name="remove_field" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      	});

      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 
    });  
</script>
</body>
</html>