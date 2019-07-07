<?php
    include('dbconnect.php');
    
    $error="";
    $stu_id="0";
    $stu_name="";
    $address="";
    $status="";
    
    if(isset($_POST['btnsave']))
    {
        $stu_name = $_POST['txtstu_name'];
        $address = $_POST['txtaddress'];
        $status = $_POST['status'];
        
        if(strlen($stu_name)<4)
        {
            $error = "Student Name at last 4 character!";
            //exit();
        }else
        {
            if($_POST['txtid']=="0")
            {
                //Add new student
                //echo "add";
                $sql = "INSERT into tb_student (stu_name,address,status) VALUES ('$stu_name','$address','$status')";
                $query = mysql_query($sql);
                echo $query;
                if($query)
                {
                    //redeirect to index when success
                    header('refresh:0; index.php');
                }
            }else{
                //update exit student
                //echo "update";
                $id = $_GET['id'];
                $sql = "update tb_student set stu_name='$stu_name',address='$address',status='$status' where stu_id='$id'";
                $query = mysql_query($sql);
                if($query)
                {
                    header('refresh:0; index.php');
                }
            }  
        }
    }
    
    //check id for edit
    $id = $_GET['id'];
    if(isset($_GET['edited']))
    {
        //echo 'edit';
        $sql = "select * from tb_student where stu_id='$id'";
        $query = mysql_query($sql);
        $row = mysql_fetch_object($query);
        $stu_id = $row->stu_id;
        $stu_name = $row->stu_name;
        $address = $row->address;
        $status = $row->status;  
        //echo $stu_name;     
    }
?>

<form action="" method="post">
    <table>
    <tr>
        <td colspan="2"><span style="color: red;"><?php echo $error; ?></span></td>
    </tr>
        <tr>
            <td>Student Name</td>
            <td>
                <input type="text" name="txtstu_name" id="" value="<?php echo $stu_name ?>"/> 
                <input type="hidden" name="txtid" value="<?php echo $stu_id ?>" /> 
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td><textarea name="txtaddress" id=""><?php echo $address ?></textarea></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <select name="status">
                    <option <?php if($status=='1') echo 'selected'; ?> value="1">Active</option>
                    <option <?php if($status=='0') echo 'selected'; ?> value="0">Suspend</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Save" name="btnsave" id="btnsave"/></td>
        </tr>
    </table>
</form>