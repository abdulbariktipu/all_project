<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="jquery-1.11.2.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript">
		function set_color_id(id,color_name)
    	{
    		//alert(color_name);
    		$('#txt_batch_color').val(color_name);
    		$('#hidden_color_id').val(id);
    		$('#color_suggest').hide('fast');
    	}
	</script>
</head>
<body>

<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("pagination") or die(mysql_error()); 

	$action=$_REQUEST['action'];
	
	if ($action=="auto_search_autoComplite")
	{
		if(!empty($_POST['color_name']))
		{
			$search_color = $_POST['color_name'];
			$query = mysql_query("SELECT * FROM `paging_table` WHERE `name`  LIKE '%$search_color%'");
			echo '<ul>';
			while ($row = mysql_fetch_assoc($query)) 
			{
				$color_name = $row['name'];
				$color_name2 = "'$color_name'";
				?>
					<li onclick="set_color_id(<?php echo $row['id'];?>,<?php echo $color_name2; ?>)"><?php echo $row['name'];?></li>
				<?php
			}
			echo '</ul>';
		}
	}
?>


</body>
</html>