<?php
    $server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "tolet_project";
    
    $con = @mysql_connect($server,$db_user,$db_pass) && @mysql_select_db($db_name);
    
    if(!$con)
    {
        echo"can not be connected";
    }
    else{
        //echo "connected";
    } 

    
    $id = $_GET['ide'];
    if(isset($_GET['ide']))
    {
        $sql = mysql_query("SELECT * FROM tolet_table WHERE id = '$id'");
        $row = mysql_fetch_object($sql);
        //$picture = $row->path;        
    }
    
    if(isset($_POST['upload_bt']))
    {
        $newpicture = $_FILES['file']['name'];
            if($newpicture)
            {
                if(($_FILES['file']['type'] == 'image/gif')
            || ($_FILES['file']['type'] == 'image/jpeg')
            || ($_FILES['file']['type'] == 'image/pjpeg')
            && ($_FILES['file']['size'] < 200000))
            {
                if($_FILES['file']['error'] > 0)
                {
                    echo "return code:" .$_FILES['file']['error'];
                }
                elseif(file_exists('images/'.$_FILES['file']['name']))
                {
                    echo $_FILES['file']['name']."Already Exit";
                }
                elseif(move_uploaded_file($_FILES['file']['tmp_name'],'images/'.$_FILES['file']['name']))
                {
                    unlink('images/'.$picture);
                    $sqledit = "UPDATE tolet_table 
                                SET
                                    username = '{$_POST['username']}',
                                    email      = '{$_POST['email']}',
                                    phone         = '{$_POST['phone']}',
                                    requard_date     = '{$_POST['requard_date']}',
                                    description      = '{$_POST['description']}',
                                    address      = '{$_POST['address']}',
                                    path       = '$newpicture'
                                WHERE id = '{$id}'";
                   $result = mysql_query($sqledit);
                   if($result)
                   {
                    header('location:tolet_post.php');
                   }             
                }
            }
        }
        else
            {
                $sqlnophoto = "UPDATE tolet_table 
                            SET
                                username = '{$_POST['username']}',
                                email      = '{$_POST['email']}',
                                phone         = '{$_POST['phone']}',
                                requard_date     = '{$_POST['requard_date']}',
                                description      = '{$_POST['description']}'
                                address      = '{$_POST['address']}'                                
                            WHERE id = '{$id}'";
                   $result2 = mysql_query($sqlnophoto);
                   if($result2)
                   {
                    header('location:tolet_post.php');
                   }
            }    
    }
?>

<html>
    <head>
        <title>Edit</title>
    </head>
    
    <body>
        <div style="border: 1px #666 solid; width: 900px; overflow: auto; margin: auto; background: #666; margin-top: 20px;">
            <div style="border: 1px #000 dotted; width: 95%; height: 80px; margin: auto; text-align: center; 
                font-size: 36px; color: #F00; background-color: #CCC; ">
                   <a href="index.php">Edit Student Information</a>  
            </div>
            <div style="border: 1px #000 dotted; width: 95%; overflow: auto; margin: auto; background-color: #CCC; ">
                <center>
                <form action="" method="post" enctype="multipart/form-data"> 
                    <table>
                    <input type="hidden" value="<?php echo $row->id; ?>" />
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input type="text" name="username" value="<?php echo $row->username; ?>" /></td>
                        </tr>  
                        <tr>
                            <td>email</td>
                            <td>:</td>
                            <td><input type="email" name="email" value="<?php echo $row->email; ?>" /></td>                            
                        </tr>
                        <tr>
                            <td>phone</td>
                            <td>:</td>
                            <td><input type="text" name="phone" value="<?php echo $row->phone; ?>" /></td>
                        </tr>  
                        <tr>
                            <td>requard_date</td>
                            <td>:</td>
                            <td><input type="text" name="requard_date" value="<?php echo $row->requard_date; ?>" /></td>
                        </tr> 
                        <tr>
                            <td>Description</td>
                            <td>:</td>
                            <td><input type="text" name="description" value="<?php echo $row->description; ?>" /></td>
                        </tr>  
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><input type="text" name="address" value="<?php echo $row->address; ?>" /></td>
                        </tr> 
                        <tr>
                            <td>StudentPic</td>
                            <td>:</td>
                            <td><input type="file" name="file"/></td>
                            <td>
                                <img src="<?php echo 'images/'.$picture ?>" style="width: 250px; height: 250px;" />
                            </td>
                        </tr>                                                                                                      
                    </table>
                        <input style='background: #FFFFFF; border: 1px solid; color: black; padding-left: 5px; padding-right: 5px;' 
                        type="submit" value="Update" name="upload_bt" />                                          
                        <a style="text-decoration: none; background: #FFFFFF; border: 1px solid; color: black; padding-left: 5px; padding-right: 5px;" 
                        href="tolet_post.php">Cancel</a>               
                 </form>     
                </center>
            </div>
         </div>       
     </body>
</html>

               
