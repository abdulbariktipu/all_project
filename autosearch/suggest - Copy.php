

<?php

	$db         = mysqli_connect('localhost', 'root', '', 'library');
	
	$company    = $_GET['company'];
	
	$sql        = "SELECT * FROM book_entry WHERE book_id || book_name like '$company%' ORDER BY book_id";
	
	$res        = $db->query($sql);
	
	if(!$res)
		echo mysqli_error($db);
	else
		while( $row = $res->fetch_object() )
			echo "<option value='".$row->book_id. " | ". $row->book_name."'></option>";
		
?>









