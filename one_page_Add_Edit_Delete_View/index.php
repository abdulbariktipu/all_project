<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<!--add data query-->
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
        
    // checking empty fields
    if(empty($name) || empty($age) || empty($email)) {                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
<!--add data query end-->


<!--Add form-->
<form action="index.php" method="post" name="form1">
	<table width="25%" border="0">
		<tr> 
			<td>Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr> 
			<td>Age</td>
			<td><input type="text" name="age"></td>
		</tr>
		<tr> 
			<td>Email</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr> 
			<td></td>
			<td><input type="submit" name="Submit" value="Add"></td>
		</tr>
	</table>
</form>
<!--add form end-->


<!--view data end--> 
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Name</td>
            <td>Age</td>
            <td>Email</td>
            <td>Update</td>
        </tr>
        <?php          
        //$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
        $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['age']."</td>";
            echo "<td>".$res['email']."</td>";    
            echo "<td><a href='index.php?id=$res[id]'>Edit</a> | <a href=\"index.php?uid=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
<!--view data end-->



<!--Edit query-->
<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];    
    
    // checking empty fields
    if(empty($name) || empty($age) || empty($email)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
include_once("config.php");
//getting id from url
 $id = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users where id='".$id."'");
 
while($res = mysqli_fetch_array($result))
{
	$id = $res['id'];
    $name = $res['name'];
    $age = $res['age'];
    $email = $res['email'];
}
?>

    <form name="form1" method="post" action="index.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="age" value="<?php echo $age;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<!--Edit query end-->

<!--Delete query-->
<?php
 include_once("config.php");
        $uid=$_GET['uid'];
        $delete=mysqli_query($mysqli, "DELETE FROM users where id='".$uid."'");

        
 
?>
<!--Delete query-->

</body>
</html>