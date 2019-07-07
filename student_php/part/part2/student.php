<?php
    include('dbconnect.php');
    $error="";
    if(isset($_POST['btnsave']))
    {
        $stu_name = $_POST['txtstu_name'];
        $address = $_POST['txtaddress'];
        $status = $_POST['status'];
        
        if(strlen($stu_name,$address)<4)
        {
            $error = "Student Name at last 4 character1";
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
                echo "update";
            }  
        }

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
                <input type="text" name="txtstu_name" id=""/> 
                <input type="hidden" name="txtid" value="0" /> 
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td><textarea name="txtaddress" id=""></textarea></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <select name="status">
                    <option value="1">Active</option>
                    <option value="0">Suspend</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Save" name="btnsave" id="btnsave"/></td>
        </tr>
    </table>
</form>