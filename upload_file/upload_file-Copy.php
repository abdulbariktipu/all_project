

<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "photos";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

error_reporting(0);
echo "<br>-Uploading file-<br><br>";

$fileName = $_FILES['file']['name'];
$discription = $_POST['discription'];
$extension = strtolower(substr($fileName,strpos($fileName, '.') +1));
$size = $_FILES['file']['size'];
$max_size = '283081';

echo $type = $_FILES['file']['type'];

$tmp_name = $_FILES['file']['tmp_name'];
//$error = $_FILES['file']['error'];

if (isset($fileName)) 
{
	if (!empty($fileName)) 
	{
		if (($extension=='jpg' || $extension=='jpeg') && $type=='image/jpeg' && $size<=$max_size) 
		{
			$location = 'upload/';
			if(move_uploaded_file($tmp_name, $location.$fileName))
			{
				//echo ' Uploaded';
				$insert = $db->query("INSERT into images (image, text) VALUES ('".$fileName."','".$discription."')"); 
				if($insert)
				{
                	echo "The file ".$fileName. " has been uploaded successfully.";
            	}
            	else
            	{
                	echo "File upload failed, please try again.";
            	}
			}
			else
			{
				echo 'There was an error';
			}	
		}
		else
		{
			echo 'File must be jpg/jpeg and must be 2mb or less';
		}
	}
	else
	{
		echo 'Please select file';		
	}
}
?>

<form action="upload_file-Copy.php" method="POST"enctype="multipart/form-data">
	<input type="file" name="file"><br>
	<input type="text" name="discription"><br>
	<input type="submit" value="Submit"/>
</form>

<?php
$query = $db->query("SELECT * FROM images ORDER BY id DESC");

if($query->num_rows > 0)
{
	while($row = $query->fetch_assoc())
	{
	    $imageURL = 'upload/'.$row["image"];
		?>
			<img src="<?php echo $imageURL; ?>" width="100" height="100" alt="" />
		<?php
	}
}
else
{ 
	?>
    <p>No image(s) found...</p>
	<?php 
}
?>