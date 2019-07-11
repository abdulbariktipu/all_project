<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>  
$function(){  
    $("button").keyup(function(){  
        $("#results").fadeIn(3000);  
        // $("#div2").fadeIn("slow");  
        // $("#div3").fadeIn(3000);  
    });    
</script> 
</head>
<body>
	<?php
	//echo "Hello! every one";
	if (isset($_GET['search_text'])) {
		$search_text = $_GET['search_text'];
	}

if (!empty($search_text)) {
	if (mysql_connect('localhost', 'root', '')) {
		if (mysql_select_db('auto_suggest')) {
			$query = "SELECT name FROM names WHERE name LIKE '%".mysql_real_escape_string($search_text)."%'";
			$query_run = mysql_query($query);

			while ($query_row = mysql_fetch_assoc($query_run)) {
				echo $name = '<a href="anotherpage.php?search_text='.$query_row['name'].'">'.$query_row['name'].'</a><br>';
			} 
		} 	
	}
} else {
	echo "Please input";
} 	
?>
</body>
</html>
