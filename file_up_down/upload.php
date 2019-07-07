<?php 
mysql_connect("localhost","root","");
mysql_select_db("file_up_down");

	if (isset($_REQUEST["submit"])) {
		$file = $_FILES["file"]["name"];
		$caption = $_POST['caption'];
		$tmp_name = $_FILES["file"]["tmp_name"];
		$path = "upload/".$file;
		$file1 = explode(".", $file);
		$ext = $file1[1];
		$allowed = array("jpg","png","gif","pdf","wmv","pdf","zip","MP4");
		if(in_array($ext, $allowed)){
            
            //condition check data already exists!
            $query = mysql_query("SELECT * FROM upload_table WHERE file='$file'");
			if(mysql_num_rows($query) > 0 ) { //check if there is already an entry for that username
				echo "Username already exists!";
			}else{           
            	//if data dont already exist then data insert in database
	            move_uploaded_file($tmp_name, $path);
	            $sql = "insert into upload_table(file,caption) value('$file','$caption')";
	            mysql_query($sql);
	            echo "Upload successfull";
               }    
        }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>File Upload and Download</title>
</head>
<body>
	<form enctype="multipart/form-data" method="post">
		File Upload: <input type="file" name="file">
		File Name: <input type="text" name="caption">
		<input type="submit" name="submit" value="upload">
	</form>
</body>
</html>