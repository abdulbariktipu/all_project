<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>

<form role="form"  method="POST" action="index.php">
	<label>Status</label>
	<select name="status">
		<option>Select</option>
		<option>Inactive</option>
		<option>Active</option>
	</select>
	<input type="submit" name="insert" value="Enter"/>
</form>

<?PHP
$user_name = "root";
$password = "";
$database = "mydatabase";
$server = "localhost";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);



if (isset($_POST['insert'])) {
	$status = $_POST['status'];
	if (mysql_query("INSERT INTO active VALUES('', '$status')")) {
		echo "Successful Insertion!";
	}
	else {
		echo "Please try again";
	}
}
?>

<!---update query-->
<!---update query-->
<?php
	
    if(isset($_POST['submit'])){
        $status=$_POST['status'];
        $eid=$_POST['edit_id'];

        $sql1="select *from active where id='".$eid."'";
        $get= mysql_query($sql1);

          while ($row=mysql_fetch_array($get)) {

               $var=$row['status'];
          
          }

          if($status=="Inactive"){
                
                $sql = "update active set status='Active' where id='".$eid."' ";
                 $query = mysql_query($sql);
	            if($query)
		        {
		            echo" Update successfull";
		        }      
		        else{
		            echo"Update error";
		        }
          	
          }

          else{
                 $sql = "update active set status='Inactive' where id='".$eid."' ";
                 $query = mysql_query($sql);
		        if($query)
		        {
		              echo" Update successfull";
		        }      
		        else{
		            echo"Update error";
		        }

      }
    }
?>
	<!---update query end-->

<h1>List of Active and Inactive People</h1>
<table border="1px">
	<thead>
			<tr>
				<th>ID</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>					
	<tbody>

	<?php
	$sql = "SELECT * FROM active";
	$result = mysql_query($sql);

	while ( $row = mysql_fetch_assoc($result) )
	{ 
	                                
	?>
	<form method="post" action="index.php">                         
		<tr>				
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['status']; ?></td>
			<td><a href='edit.php?edit=<?php echo $row['id'];?>'>EDIT</a></td>
			<td>
             <input type="hidden" name="status" value="<?php echo $row['status'] ?>">
             <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >
             <input type="submit" name="submit" value="edit">
            </td>
		</tr>
	</form> 	
	<?php
	}
	?>


	</tbody>
</table>


    </body>
</html>