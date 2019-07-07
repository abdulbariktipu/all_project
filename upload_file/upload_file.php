

<?php
error_reporting(0);
echo "<br>-Uploading file-<br><br>";

$fileName = $_FILES['file']['name'];
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
				echo ' Uploaded';
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

<form action="upload_file.php" method="POST"enctype="multipart/form-data">
	<input type="file" name="file"><br>
	<input type="submit" value="Submit"/>
</form>











