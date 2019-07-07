<?php
if(!isset($_REQUEST['term']))
exit();

require('config.php');
 

$resault = $db->query('
	SELECT book_id FROM book_entry 
	WHERE book_id 
	LIKE "'.ucfirst($_REQUEST['term']).'%" 
	ORDER BY book_id ASC 
	LIMIT 0,10' );

$data = array();

while($row = mysqli_fetch_array($resault, MYSQL_ASSOC)){
	$data[] = array(
		'label' => $row['book_id'],
		'value' => $row['book_id'],
	);	
}

echo json_encode($data);
flush(); // Vide les tampons de sortie




?>

