    <!--Session start 1-->
    <?php
    error_reporting(0);
	   session_start();
       if(!isset($_SESSION['username']))
       {
        echo "Please login again";
        header("location:index.php");
       } else{
        
        //For session time out
       //$now=time();//checking time now when home page starts.
       
       //if($now>$_SESSION['expire']){
        //session_destroy();
       // echo "Yor session has expired! <a href='login.php'>Login here</a>";
        //}
       // else{
            //For session time out
    ?>
<!---------------Data Insert Start-------------------------->
<?php
    require "dbconnect.php";
    


        if(isset($_POST['upload_bt'])){
        $username=($_POST['username']);
        $email=($_POST['email']);
        $phone=($_POST['phone']);
        $requard_date=($_POST['requard_date']);
        $description=($_POST['description']);
        $address=($_POST['address']);
    
    $name = $_FILES['file']['name'];
    $extension = strtolower(substr($name,strpos($name,'.')+1));//extension,$type,$size
    
    //$size = $_FILES['file']['size'];//extension,$type,$size
    //$max_size = 2097152;//extension,$type,$ file_size
    
    $type = $_FILES['file']['type'];//extension,$type,$size
    
    $tmp_name = $_FILES['file']['tmp_name'];
    
    if(isset($name)){
        if(!empty($name)){
            
            //if(($extension=='jpg'||$extension=='jpeg')&& $type=='image/jpeg'&&$size<=$max_size){//extension,$type,$size
                
            $location = 'images/';
            if(move_uploaded_file($tmp_name,$location.$name)){
                 echo 'Uploaded';                
                 header("refresh:2; url=tolet_post.php");                         
                    $sql = "INSERT INTO `tolet_project`.`tolet_table` (`id`, `path`, `username`,`email`,`phone`, `created`,`requard_date`,`description`,`address`) 
                    VALUES (NULL, '$location/$name', '$username','$email','$phone', now(),'$requard_date','$description','$address')";    
                    mysql_query($sql);

            }else{
                echo 'There was an error';
            }
        //}
        //else{//extension,$type,$size
            //echo 'File must be png/jpeg and must be 2MB';//extension,$type,$size
        //}
           
        }else{
            echo 'Please choose a file';
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
                <!-- Bootstrap -->
        <link href=".css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/> 
        <link href="css/bootstrap.css" rel="stylesheet"/>    
        <link href="css/index.css" rel="stylesheet"/> 
        <link href="css/tolet_post.css" rel="stylesheet"/>
        <title>File Upload</title>
    
    <style>
    body {
              background: url(images/bg-header.jpg)repeat  center top;
    
                }
        .bimg {
              background: url(images/bg-nav-selected.png)repeat-x  center top;
    
                }
        .bimg-rot
        {
            background: url(images/bg-nav-selected-rot.png)repeat-x  center top;
        }        
</style>
    </head>
    <body>
        <div class="bimg">
            <h4>Welcome <samp style="text-transform: capitalize; font-size: larger;"><?php echo $_SESSION['username'];?></samp> <img src="images/user-login-icon.png" height="80px" width="80px" /></h4>      
            <a class="btn btn-info btn-lg" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a> 
            <a class="btn btn-info btn-lg" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a>
            
<!-- Add data Button trigger modal -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
  <span class="glyphicon glyphicon-log-out">Add</span>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add Form</h4>
      </div>
      <div class="modal-body">
        <form style="text-align: center;" action="tolet_post.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-group row">
          <label for="example-date-input" class="col-xs-4 col-form-label">Select File</label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input type="file" id="file" name="file" class="custom-file-input">
            <span class="custom-file-control"></span>
          </div>
        </div>     
        <div class="form-group row">
          <label for="example-text-input" class="col-xs-4 col-form-label">Name</label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input class="form-control" type="text" name="username" placeholder="Name" id="example-text-input">
          </div>
        </div>
        <div class="form-group row">
          <label for="example-email-input" class="col-xs-4 col-form-label">Email</label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input class="form-control" type="email" name="email" placeholder="Email" id="example-email-input">
          </div>
        </div>
        <div class="form-group row">
          <label for="example-tel-input" class="col-xs-4 col-form-label">Telephone</label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input class="form-control" type="tel" name="phone" placeholder="Telephone" id="example-tel-input">
          </div>
        </div>
        <div class="form-group row">
          <label for="example-date-input" class="col-xs-4 col-form-label">Date <span class="glyphicon glyphicon-calendar"></span></label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input class="form-control" type="date" name="requard_date" value="2011-08-19" id="example-date-input" >
          </div>
        </div>  
        <div class="form-group row">
          <label for="example-date-input" class="col-xs-4 col-form-label">Description</label>
          <div class="col-xs-6 col-sm-6 col-md-6">            
            <textarea class="form-control" name="description" class="form-control input-sm" placeholder="Description" id="example-date-input" ></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-date-input" class="col-xs-4 col-form-label">Address</label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <textarea class="form-control" name="address" class="form-control input-sm" placeholder="Address" id="example-date-input" ></textarea>            
          </div>
        </div>      
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="upload_bt" value="Upload" class="btn btn-primary" />        
      </div>
      </form>
    </div>
  </div>
</div>             
        </div><br />        
<!---------------Data Insert End------------------------------->


<!--------------//Paging Data show end ----------->   
 <div class=" container">
  <div class="row">
    <h1>List view</h1>
   
              <?php
        //require "dbconnect.php";
        include "dbconnect.php";
        
            //pageing
            $page=@$_GET["page"];
            if($page=="" || $page=="1")
            {
                $page1=0;
            }
                else
                {
                    $page1=($page*8)-8; //algorithom
                }
                
            //Paging Data show                 
            $res=mysql_query("select * from tolet_table ORDER by id DESC limit $page1,8");
            while($row=mysql_fetch_array($res))
            {
               echo"<tr>
                        <td>";?><div class="col-lg-3 col-sm-4 col-xs-6">                     
                        <a title="<?php echo $row["username"];?>" href='details.php?epr=details&id="<?php echo $row["id"];?>"'>
                        <img class="img-responsive" style="padding: 4px; background-color: #ffffff; border-radius: 4px; border: 1px solid #dddddd; height: 250px; width: 300px;" src="<?php echo $row["path"];?>"/></a>
                        Name: <?php echo $row["username"];?><br/>
                        Email: <?php echo $row["email"];?><br/>
                        Phone: <?php echo $row["phone"];?><br/>
                        
                        Insert Time: 
                        <?php                      
                            $originalDate = $row["created"];
                            $newDate = date("d M Y H:i:s", strtotime($originalDate));
                            echo $newDate;                        
                        ?><br />
                        
                        Requard Date: 
                        <?php                      
                            $originalDate = $row["requard_date"];
                            $newDate = date("d M Y", strtotime($originalDate));
                            echo $newDate;                        
                        ?><br />
                        <a target="_blank" href='details.php?epr=details&id="<?php echo $row["id"];?>"'>Click to Detail</a><br />                        
                        <a href='delete.php?epr=delete&id="<?php echo $row["id"];?>"'>Delete</a> | 
                        <a href='update.php?ide&id="<?php echo $row["id"];?>"'>Edit</a><br /><br /><br /></div>                       
                       
                     <?php echo "</td>
   
                  </tr>";
            } 
            
         ?>   
            
            
<!-- Data update Form start-->
<!-- Modal -->
<div class="modal fade" id="upModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">tareq</h4>
      </div>
      <div class="modal-body">
      
        <form style="text-align: center;" action="tolet_post.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-group row">
          <label for="example-date-input" class="col-xs-4 col-form-label">Select File</label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input type="file" id="file" name="file" class="custom-file-input">
            <span class="custom-file-control"></span>
          </div>
        </div>     
        <div class="form-group row">
          <label for="example-text-input" class="col-xs-4 col-form-label">Name</label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input class="form-control" type="text" name="username" placeholder="Name" 
            value="<?php echo $row["username"];?>" id="example-text-input">
          </div>
        </div>
        <div class="form-group row">
          <label for="example-email-input" class="col-xs-4 col-form-label">Email</label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input class="form-control" type="email" name="email" placeholder="Email" id="example-email-input">
          </div>
        </div>
        <div class="form-group row">
          <label for="example-tel-input" class="col-xs-4 col-form-label">Telephone</label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input class="form-control" type="tel" name="phone" placeholder="Telephone" id="example-tel-input">
          </div>
        </div>
        <div class="form-group row">
          <label for="example-date-input" class="col-xs-4 col-form-label">Date <span class="glyphicon glyphicon-calendar"></span></label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input class="form-control" type="date" name="requard_date" value="2011-08-19" id="example-date-input" >
          </div>
        </div>  
        <div class="form-group row">
          <label for="example-date-input" class="col-xs-4 col-form-label">Description</label>
          <div class="col-xs-6 col-sm-6 col-md-6">            
            <textarea class="form-control" name="description" class="form-control input-sm" placeholder="Description" id="example-date-input" ></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-date-input" class="col-xs-4 col-form-label">Address</label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <textarea class="form-control" name="address" class="form-control input-sm" placeholder="Address" id="example-date-input" ></textarea>            
          </div>
        </div>      
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="ide" value="Update" class="btn btn-primary" />        
      </div>
      </form>
    </div>
  </div>
</div>           
<!-- Data update Form end-->            
       

      </div>
    </div>
        <div style="margin-left: 180px; margin-bottom: 50px;" class="footer-bg-img">
        <?php
            require "dbconnect.php";
            
              //this is for counting number of page
                $sql=mysql_query("select * from tolet_table");
                $cou=mysql_num_rows($sql);
                
                $a=$cou/8;
                $a=ceil($a);
                echo "<br>"; echo "<br>";
                    for($b=1;$b<=$a;$b++)
                    {
                        ?>
                        <nav aria-label="Page navigation" style="display: inline;">
                          <ul class="pagination">
                        
                            <li><a href="tolet_post.php?page=<?php echo $b; ?>"><?php echo $b." ";?></a></li>
                        
                          </ul>
                        </nav>

<?php
    }
                
        ?>
    
 </div>
 
    <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
    		<button class="close" type="button" data-dismiss="modal">X</button>
    		<h3 class="modal-title">Heading</h3>
    	</div>
    	<div class="modal-body">
    		
    	</div>
    	<div class="modal-footer">
    		<button class="btn btn-default" data-dismiss="modal">Close</button>
    	</div>
       </div>
      </div>
    </div>
   
   <div class="bimg-rot"> 
    <?php include'page/footer.php'?>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="js/bootstrap.min.js"></script>
     <script src="js/index.js"></script>  
     <script src="js/scroll.js"></script>
    <script src="js/app.js"></script>           
    </body>
</html>
<!---------------Data List View End-------------------------->
<!--Session start 2-->
<?php
	}
 //}
?>
<!--Session end 2-->