<?php
error_reporting(0);
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $edit_id = $_POST['customerNumber'];
    $customerName=$_POST['customerName'];
    $addressLine2=$_POST['addressLine2'];   
    
    // checking empty fields
    if(empty($customerName) || empty($addressLine2)) {            
        if(empty($customerName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($addressLine2)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
$result = mysqli_query($mysqli, "UPDATE customers SET customerName='$customerName',addressLine2='$addressLine2' WHERE customerNumber=$edit_id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: ../query_test.php");
    }
}
?>

<?php
    //getting id from url
    $edit_id = $_GET['edit'];
     
    //selecting data associated with this particular id
    $result = mysqli_query($mysqli, "SELECT * FROM customers WHERE customerNumber=$edit_id");
     
    while($res = mysqli_fetch_array($result))
    {
        $customerName = $res['customerName'];
        $addressLine2 = $res['addressLine2'];
    }
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="../query_test.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="customerEdit.php">
        <table border="0">
            <tr> 
                <td>customerName</td>
                <td><input type="text" name="customerName" value="<?php echo $customerName;?>"></td>
            </tr>
            <tr> 
                <td>addressLine2</td>
                <td><input type="text" name="addressLine2" value="<?php echo $addressLine2;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="customerNumber" value=<?php echo $_GET['edit'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>