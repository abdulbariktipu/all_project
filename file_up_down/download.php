<?php 
mysql_connect("localhost","root","");
mysql_select_db("file_up_down");

$query = mysql_query("select * from upload_table");
$rowcount = mysql_num_rows($query);
?>

<!--update query start-->
<?php
     //require "dbconnect.php";//connect to database
    if(isset($_POST['update_btn'])){
        $editid=mysql_real_escape_string($_POST['id']);
        $username=mysql_real_escape_string($_POST['file']);
        $sql = "update upload_table set id='$editid' where id='$editid'";
        $query = mysql_query($sql);
        if($query)
        {      
            echo "Update successfull";  
            header("refresh:1; url=download.php");            
        }      
           
        else{
            echo "Update Error";
            header("refresh:1; url=download.php");          
        }
    }
?>
<!--update query end-->

<!--delete query-->
<?php
	$epr='';
	if(isset($_GET['epr']))
	$epr=$_GET['epr'];     
	if($epr == 'delete')
	{  
		$deleteid=$_GET['deleteid'];
		$delete=mysql_query("DELETE FROM upload_table where id=$deleteid");
		
		if($delete)
			header("location:download.php");          
	}
?>
<!--delete query end-->

<table border="1">
	<thead>
		<tr>
			<th>File ID</th>
			<th>File Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>

<?php
//for ($i=1; $i<=$rowcount; $i++) { 
//	$row = mysql_fetch_array($query); //or
while($row=mysql_fetch_assoc($query ))
{
  ?>
	<tr>
		<td><?php echo $row["id"] ?></td>
		<td><a href="upload/<?php echo $row["file"] ?>"><?php echo $row["file"] ?></a></td>
		<td><a href='upload.php?epr=edit&editid="<?php echo $row["id"];?>"'>Edit</a></td>
		<td><a href='download.php?epr=delete&deleteid="<?php echo $row["id"];?>"'>Delete</a></td>
	</tr>
  <?php
}
?>
</table>