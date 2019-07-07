

<?php

	$db         = mysqli_connect('localhost', 'root', '', 'library');
	
	$company    = $_GET['book_id'];
	
	$sql        = "SELECT * FROM book_entry WHERE book_id like '$company%' ORDER BY book_id ASC LIMIT 0,5";
	
	$res        = $db->query($sql);
	
	if(!$res)
		echo mysqli_error($db);
	else
		while( $row = $res->fetch_object() )
			echo "<option value='$row->book_id'></option>";
		
?>









