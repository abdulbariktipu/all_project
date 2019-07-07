
    <!--Session start 1-->
    <?php
	   session_start();
       if(!isset($_SESSION['username']))
       {
        echo "Please login again";
        header("location:home.php");
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
    <!--Session end 1-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Reg</title>

    
    <link href="style.css" rel="stylesheet" type="text/css"/>
     <link href="css/bootstrap.min.css" rel="stylesheet"/>
     <link href="css/datatable.css" rel="stylesheet"><!--DataTable CSS-->
     <link href="css/index.css" rel="stylesheet"/>
     <!-- <link href="css/app.css" rel="stylesheet"/> -->
     
     <!-- Date picker start http://www.daterangepicker.com/#ex3-->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" /><!--Date picker CSS-->
     
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" /><!--Date picker CSS-->
    <!-- Date picker end http://www.daterangepicker.com/#ex3-->   

   
  </head>
  <body>
  
   
          <?php //error_msg show
        if(isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
        ?>

        <div>
            <h4>Welcome <samp style="text-transform: capitalize; font-size: larger;"><?php echo $_SESSION['username'];?></samp> <img src="images/user-login-icon.png" height="80px" width="80px" /></h4>      
            <a class="btn btn-info btn-lg" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a>    
        </div><br /> 
        
        
    <!-- hedar insert start-->
<?php
      
     //require "dbconnect.php";//connect to database
    $db=mysqli_connect("localhost","root","","tolet_project");
    
    if(isset($_POST['hedar_bt'])){
        $hedar=mysql_real_escape_string($_POST['hedar']);
        
       
            //create user
            
            //$sql = "INSERT INTO hedar (hedar) VALUES ('$hedar')";
            $sql = "INSERT INTO  `tolet_project`.`hedar` (`id` ,`hedar`)VALUES ('',  '$hedar')";
            mysqli_query($db,$sql);
            //$_SESSION['register_success'] = "Register_successfull";
            //$_SESSION['username'] = $username;
            header("refresh:2; url=home.php");
            //header("location:login.php"); //redirect to home page
        //}else{
            //failed
            //$_SESSION['message'] = "The two passwords do not match";
        //}
    }
?>


    <div class="container">
        <div class="row ">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	   <div class="panel panel-default">
                        <div class="panel-heading">
			    		   <h3 class="panel-title">Hedar user php mysql <small>It's free!</small></h3>
			 			</div>
                        <div class="panel-body">
                        
			    		<form style="width: 100%;" class="" role="form"  method="POST" action="home.php">
                                                                       
			    			<div class="form-group">
                                <textarea name="hedar" style="width: 100%;" class="form-control input-sm" placeholder="Textarea" style="width: 185px;"></textarea>			    				
			    			</div>      
			    				<div class="form-group">			    				
                                    <input type="submit" name="hedar_bt" value="Hedar" class="btn btn-info btn-block">	                                       
		    					</div>		    			
			    			</form>
			    	    </div>
	    		</div>
    		</div>
    	</div>
    </div>  
<!-- hedar insert end---------------->         
   <!-- hedar show start--> 
    <div class="header">
    <marquee>
        <h1>          
        <?php
        	require "dbconnect.php";            
            
            //$query="SELECT * FROM `hedar` WHERE id=(SELECT MAX(id) FROM `hedar`)";//the show last one data in database
            $query="SELECT * FROM (SELECT * FROM hedar ORDER BY id DESC LIMIT 3) sub ORDER BY id ASC"; //the show last 3 data in database
            
            $result=mysql_query($query);
            
            
            while($row=mysql_fetch_array($result))
            {
                
                echo "<tr>
                        
                       <a style='color: white;' href='#'><td>$row[1]</td></a> 
            
                     </tr>";        
            }

        ?>
</h1></marquee>    
    </div>
    <!-- hedar show end-->   
    

<!---------------Data Insert Start-------------------------->
<?php
    require "dbconnect.php";
    


        if(isset($_POST['upload_bt'])){
        $username=($_POST['username']);
    
    $name = $_FILES['file']['name'];
    $extension = strtolower(substr($name,strpos($name,'.')+1));//extension,$type,$size
    
    $size = $_FILES['file']['size'];//extension,$type,$size
    $max_size = 2097152;//extension,$type,$ file_size
    
    $type = $_FILES['file']['type'];//extension,$type,$size
    
    $tmp_name = $_FILES['file']['tmp_name'];
    
    if(isset($name)){
        if(!empty($name)){
            
            if(($extension=='jpg'||$extension=='jpeg')&& $type=='image/jpeg'&&$size<=$max_size){//extension,$type,$size
                
            $location = 'images/';
            if(move_uploaded_file($tmp_name,$location.$name)){
                 echo 'Uploaded';                
                                          
                    $sql = "INSERT INTO `tolet_project`.`tolet_table` (`id`, `path`, `username`, `created`) VALUES (NULL, '$location/$name', '$username', now())";    
                    mysql_query($sql);

            }else{
                echo 'There was an error';
            }
        }else{//extension,$type,$size
            echo 'File must be png/jpeg and must be 2MB';//extension,$type,$size
        }
           
        }else{
            echo 'Please choose a file';
        }
    }
}
?>
        <form style="text-align: center;" action="home.php" method="POST" enctype="multipart/form-data">
           <table width="50%"> 
                <tr>
                    <td>Select Image:<input type="file" name="file" /></td><br /><br />
                    <td>Type Image Name:<input type="text" name="username" /></td>
                    <td><input type="submit" name="upload_bt" value="Upload" /></td>
                </tr>
            </table><br /><br />
        </form>
<!---------------Data Insert End------------------------------->

<!-- //********* Delete record and Update record start ---------------->
<?php

include('dbconnect.php');//Database connect

$epr='';
$msg='';
  
  if(isset($_GET['epr']))
     $epr=$_GET['epr'];   
     
    
?>

    <!-------save update----------------->    
    <?php   
    
     if($epr=='saveup'){
        
        
        $username=$_POST['username'];
        $username2=$_POST['username2'];
        $birthday=$_POST['birthday'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $id=$_POST['id'];
        
        $a_sql=mysql_query("UPDATE  `tolet_project`.`users` SET  
        `username` =  '$username',`username2` =  '$username2',`birthdate` =  '$birthday',`email` =  '$email',`password` =  '$password' WHERE  `users`.`id` =$id");

            if($a_sql)
            header("location:home.php");
              
            else
            $msg='Error:'.mysql_error();
     
     }
    ?>



<!-----------update section form execute in update.php --------------------------------->


    <!--------------//Paging Data show end ----------->
    
 <div class=" container">
  <div class="row">
    <h1>Bootstrap 3 Lightbox image gallery using Modal</h1>
   
   <?php
        require "dbconnect.php";
        
            //pageing
            $page=$_GET["page"];
            if($page=="" || $page=="1")
            {
                $page1=0;
            }
                else
                {
                    $page1=($page*12)-12; //algorithom
                }
                
            //Paging Data show                 
            $res=mysql_query("select * from tolet_table ORDER by id DESC limit $page1,12");
            while($row=mysql_fetch_array($res))
            {
               echo"<tr>
                    <td>";?>
                        <div class="col-lg-3 col-sm-4 col-xs-6">
                            <a title="<?php echo $row["username"];?>" href="#">
                                <img class="thumbnail img-responsive" style=" height: 200px; width: 200px;" src="<?php echo $row["path"];?>"/>
                                Name: <?php echo $row["username"];?><br/>
                                Insert Time: <?php echo $row["created"];?><br />                          
                            </a>
                            <a href='delete.php?epr=delete&id="<?php echo $row["id"];?>"'>Delete</a> |
                            <a href='update.php?epr=update&id="<?php echo $row["id"];?>"'>Update</a>  
                        </div><?php echo 
                    "</td>
                  </tr>";
            } 
                   
        ?>

      </div>
    </div>
        <div style="margin-left: 180px; margin-bottom: 50px;" class="footer-bg-img">
        <?php
            require "dbconnect.php";
            
              //this is for counting number of page
                $sql=mysql_query("select * from tolet_table");
                $cou=mysql_num_rows($sql);
                
                $a=$cou/12;
                $a=ceil($a);
                echo "<br>"; echo "<br>";
                    for($b=1;$b<=$a;$b++)
                    {
                        ?><a href="home.php?page=<?php echo $b; ?>" style="text-decoration: none;"><?php echo $b." ";?></a><?php
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

    
   
<!-- Database list view end-->

    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
    
    <script src="js/index.js"></script>
  </body>
</html>
<!--Session start 2-->
<?php
	}
 //}
?>
<!--Session end 2-->

