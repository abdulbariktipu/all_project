<?php
//include "dbconnect.php";
// https://itsolutionstuff.com/post/php-dynamically-add-remove-input-fields-using-jquery-ajax-example-with-demoexample.html
	//Placeholder
	$output = NULL;

	if (isset($_POST['submit'])) 
	{
		$mysqli = NEW MySQLi('localhost', 'root', '', 'addmore');

		$make = $_POST['make'];
		$model = $_POST['model'];
		$serial = $_POST['serial'];

		foreach ($make as $key => $value) 
		{
			$query = "SELECT id FROM inventory WHERE serial = '" . $mysqli->real_escape_string($serial[$key]) . "' LIMIT 1";

			$resultSet = $mysqli->query($query);
			if ($resultSet->num_rows == 0) 
			{
				$query = "INSERT INTO inventory (make, model, serial)VALUES('".$mysqli->real_escape_string($value)."','".$mysqli->real_escape_string($model[$key])."','".$mysqli->real_escape_string($serial[$key])."')";
				//echo $query;die;
				$insert = $mysqli->query($query);
				if (!$insert)
				{
					echo $mysqli->error;
				}
				else
				{
					$output .="<p>Successfully added " . $serial[$key] . "</p>";
				}

			}
			else
			{
				$output .="This record already exists, ".$serial[$key] . $mysqli->error; 
			}
		}
		$mysqli->close();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD DYNAMIC FIELDS TO FORMS WITH JQUERY AND PHP</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="jquery-1.11.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(e)
		{
			//Variables
			var html = '<p style="background-color: gray"><div>Make: <input type="text" name="make[]" id="childmake"> Model: <input type="text" name="model[]" id="childmodel"> Serial: <input type="text" name="serial[]" id="childserial"> <a href="#" id="remove">X</a></div></p>';

			var maxRow = 5;

			var x = 1;

			//Add rows to the form
			$("#add").click(function(e){
				//alert();
				//$("#container").append("<p>Hello</p>");
				if (x <= maxRow) {
				$("#container").append(html);
				x++;
				}
			});

			//Remove rows from the form
			$("#container").on('click', '#remove', function(e){
				$(this).parent('div').remove();
				x--;
			}); 

			//Populate values from the first row
			$("#container").on('dblclick','#childmake',function(e){
				$(this).val( $('#make').val() );
			});

			$("#container").on('dblclick','#childmodel',function(e){
				$(this).val( $('#model').val() );
			});	

			$("#container").on('dblclick','#childserial',function(e){
				$(this).val( $('#serial').val() );
			});			
		});

	</script>
</head>
<body>
	<form method="post" action="index.php">
		<div id="container">
			Make: <input type="text" name="make[]" id="make" autocomplete="off">
			Model: <input type="text" name="model[]" id="model" autocomplete="off">
			Serial: <input type="text" name="serial[]" id="serial" autocomplete="off">
			<a href="#" id="add">Add More</a>
		</div>
			<p/>
			<input type="submit" name="submit">
	</form>
	<?php echo $output; ?>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
    <h2 align="center">PHP - Dynamically Add or Remove input fields using JQuery</h2>  
    <div class="form-group">
         <form name="add_name" id="add_name">

            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
                        <td><input type="text" name="name[]" id="myName" placeholder="Enter your Name" class="form-control name_list" required="" /></td>  
                        <td><button type="button" name="added" id="added" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>  
                <input type="button" name="submit_value" id="submit_value" class="btn btn-info" value="Submit" />  
            </div>

         </form>  
    </div> 
</div>


<script type="text/javascript">
    $(document).ready(function(){      
      
      var i=1;  


      $('#added').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" id="myName" placeholder="Enter your Name" class="form-control name_list" required /></td><td><button type="button" name="remove_field" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $('#submit_value').click(function(){
      	//alert($('#myName').val());return;
      	var row_num=$('#dynamic_field tr').length;
      	var multi_data="";
      	//alert(row_num);return;
      	for (var j=1; j<=row_num; j++)
		{
			// alert(j);
			multi_data+="&add_name" + j + "='" + $('#myName'+j).val()+"'";
		}
		
		var data="action=save_update_delete_dtls&row_num="+row_num+multi_data
		// alert(data);return; 
		var postURL = "/index.php";
           $.ajax({
                url:postURL,
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                  	i=1;
                  	$('.dynamic-added').remove();
                  	$('#add_name')[0].reset();
    				alert('Record Inserted Successfully.');
                }  
           });  
      });
    });  
</script>
</body>
</html>

<?php
	if(!empty($_POST["name"]))
	{
		foreach ($_POST["name"] as $key => $value) 
		{
			$sql = "INSERT INTO inventory(make) VALUES ('".$value."')";
			$mysqli->query($sql);
		}
		echo json_encode(['success'=>'Names Inserted successfully.']);
	}


?>