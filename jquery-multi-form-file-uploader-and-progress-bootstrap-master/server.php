<?php
if(isset($_POST['upload'])){
    
	$tmp_file = $_FILES['image']['tmp_name'];
	$filename = $_FILES['image']['name'];

	move_uploaded_file($tmp_file, 'upload_folder/'. $filename);
    
    //connect to the database    
    $db = mysqli_connect("localhost","root","","progbar");
        
    $sql = "INSERT INTO images (image) VALUES ('$filename')";
    mysqli_query($db, $sql); //stores the submitted data into the database table: images
}



?>

