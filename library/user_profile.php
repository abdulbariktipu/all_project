<?php

include "dbconnect.php";
?>
    <!--Session start 1-->
    <?php
    //error_reporting(0);
	   session_start();
       if(!isset($_SESSION['username'])){
        echo "Please login again";
        header("location:login.php");
       } else{
	   		$access = $_SESSION['access'];//access control
 
    ?>
    <!--Session end 1-->
<!DOCTYPE html>
<html>
    <head>
                <!-- Bootstrap -->
        <link href=".css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/> 
        <link href="css/bootstrap.css" rel="stylesheet"/>    
        <link href="css/index.css" rel="stylesheet"/> 
        
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        
        <title>Profile</title>
        
<style>
  .user-row {
      margin-bottom: 14px;
  }

  .user-row:last-child {
      margin-bottom: 0;
  }

  .dropdown-user {
      margin: 13px 0;
      padding: 5px;
      height: 100%;
  }

  .dropdown-user:hover {
      cursor: pointer;
  }

  .table-user-information > tbody > tr {
      border-top: 1px solid rgb(221, 221, 221);
  }

  .table-user-information > tbody > tr:first-child {
      border-top: 0;
  }


  .table-user-information > tbody > tr > td {
      border-top: 0;
  }
  .toppad
  {margin-top:10%;
      margin-bottom:10%;
      height: 100%;
  }
  .navbar-default .navbar-nav > .active > a{
              color: #555;
              background-color: #0aa2db;
          }
</style>

<!-- navbar css -->
<style>
  /*
  Code snippet by maridlcrmn for Bootsnipp.com
  Follow me on Twitter @maridlcrmn
  */

  .navbar-brand { position: relative; z-index: 2; }

  .navbar-nav.navbar-right .btn { position: relative; z-index: 2; padding: 4px 20px; margin: 10px auto; }

  .navbar .navbar-collapse { position: relative; }
  .navbar .navbar-collapse .navbar-right > li:last-child { padding-left: 22px; }

  .navbar .nav-collapse { position: absolute; z-index: 1; top: 0; left: 0; right: 0; bottom: 0; margin: 0; padding-right: 120px; padding-left: 80px; width: 100%; }
  .navbar.navbar-default .nav-collapse { background-color: #f8f8f8; }
  .navbar.navbar-inverse .nav-collapse { background-color: #222; }
  .navbar .nav-collapse .navbar-form { border-width: 0; box-shadow: none; }
  .nav-collapse>li { float: right; }

  .btn.btn-circle { border-radius: 50px; }
  .btn.btn-outline { background-color: transparent; }

  @media screen and (max-width: 767px) {
      .navbar .navbar-collapse .navbar-right > li:last-child { padding-left: 15px; padding-right: 15px; } 
      
      .navbar .nav-collapse { margin: 7.5px auto; padding: 0; }
      .navbar .nav-collapse .navbar-form { margin: 0; }
      .nav-collapse>li { float: none; }
  }
  .navbar-default
  {
      border-radius: 0px;
      background-color: #065b78;
      border-bottom: 5px solid #0aa2db;
      border-top: #065b78;
      border-left: #065b78;
      border-right: #065b78;
  }
  .navbar-default .navbar-nav>li>a:hover{
      background-color: #0aa2db;
  }
  .navbar-default .navbar-nav>li>a{
      color: white;
      font-weight: bolder;
  }
  .navbar.navbar-default .nav-collapse{
      background-color: #065b78;
      
  }
  .nav>li>a {
      position: relative;
      display: block;
      padding: 15px 10px;
  }
  .navbar{
      margin-bottom: 10px;
  }
</style>
<!-- navbar css -->
    </head>
    <body style="background-color: #5bc0de;">
			<?php   
				require "dbconnect.php";	
				
				 $user = $_SESSION['username'];
	   
				$query0="SELECT * FROM `users` 
						WHERE users.`username`='$user'";
	
				$result1=mysql_query($query0);
			
				$row=mysql_fetch_array($result1); 
			?> 
            
<!-- Nave Start -->
<div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
    <!-- Second navbar for categories -->
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="adminpanel.php"><img style="width: 50px; height: 50px;" src="images/library-icon.png" /></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
           
           <?php if($access==1){?>          
            <li><a href="user_register.php">Registration</a></li>
            <?php } ?>
                                    
            <li><a href="all_student.php">User List</a></li>
            
           <?php if($access==1){?>                     
            <li><a href="book_entry.php">Book Add</a></li>
            <?php } ?>
           
            <li><a href="all_book.php">Book List</a></li>
            
            <?php if($access==1){?>
            <li><a href="book_borrow.php">Borrow Book</a></li>
             <?php } ?>
            
            <li><a href="book_borrow_view.php">Borrow Book View</a></li>
            <li class="active"><a href='user_profile.php?sid="<?php echo $row['sid'];?>"'><span class="glyphicon glyphicon-user"></span>
			     <?php echo $_SESSION['username']; ?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
           <?php if($access==1){?>
            <li>
              <a class="btn btn-default btn-outline btn-circle"  data-toggle="collapse" href="#nav-collapse1" aria-expanded="false" aria-controls="nav-collapse1">More</a>
            </li>
          </ul>
          
          <ul class="collapse nav navbar-nav nav-collapse" id="nav-collapse1">
            <?php if($access==1){?>
            <li><a href="#">Demo</a></li>
             <?php } ?>
            
            <?php if($access==1){?>
            <li><a href="#">Seetings</a></li>
             <?php } ?>
            
            <?php if($access==1){?>
            <li><a href="book_re_details.php">Book Return Details</a></li>
             <?php } ?>            
            
            <li><a href="book_return.php">Book Return</a></li>
             <?php } ?>            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
</div><!-- /.container-fluid -->
<!-- nave end -->
 
    <?php
        error_reporting(0);
        //error_reporting(0);
        require "dbconnect.php";//Database connect
        
        $sid=$_GET['sid'];
        $res=mysql_query("select * from users where sid=$sid"); 
                
                //echo $res;
        $row=mysql_fetch_assoc($res);
        $imageURL = 'upload/'.$row["user_image"];
        $userId = $row['sid'];
        // Image upload
        
        $fileName = $_FILES['file']['name'];
        $user_id = $_POST['user_id'];//die;
        $extension = strtolower(substr($fileName,strpos($fileName, '.') +1));
        $size = $_FILES['file']['size'];
        $max_size = '683081';

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
                //echo ' Uploaded'; 
                $sql = "UPDATE users SET user_image='".$fileName."' WHERE sid='$user_id'";//die;
                $update = mysql_query($sql);
                if($update)
                {
                  echo "The file ".$fileName. " has been uploaded successfully.";
                  echo "<script>window.open('user_profile.php?sid=".$user_id."','_self') </script>"; 
                }
                else
                {
                    echo "<script>alert('File upload failed, please try again.')</script>";
                    echo "<script>window.open('user_profile.php?sid=".$user_id."','_self') </script>"; 
                }
              }
              else
              {
                echo "<script>alert('There was an error')</script>";
                echo "<script>window.open('user_profile.php?sid=".$user_id."','_self') </script>"; 
              } 
            }
            else
            {
              echo "<script>alert('File must be jpg/jpeg and must be 2mb or less')</script>";
              echo "<script>window.open('user_profile.php?sid=".$user_id."','_self') </script>"; 
            }
          }
          else
          {
            echo "<script>alert('Please select file')</script>";
            echo "<script>window.open('user_profile.php?sid=".$user_id."','_self') </script>"; 
          }
        }
    ?>                         




<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row['username']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 
                  <img src="<?php echo $imageURL; ?>" width="100" height="100" alt="" />
                  <br>
                  <br>
                  <form action="user_profile.php" method="POST"enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input type="hidden" name="user_id" value="<?php echo $row['sid'];?>">
                    <input type="submit" value="Submit"/>
                  </form>
                </div>

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>User ID:</td>
                        <td><?php echo $row['sid']; ?></td> 
                      </tr>  
                      <tr>
                        <td>Name:</td>
                        <td><?php echo $row['username']; ?></td>
                      </tr>
                      <tr>
                        <td>Department:</td>
                        <td><?php echo $row['dept']; ?></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $row['email']; ?></td>
                      </tr>
                      <tr>
                        <td>Phone:</td>
                        <td><?php echo $row['phone']; ?></td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td><?php echo $row['gender']; ?></td>
                      </tr>
                      <tr>
                        <td>Home Address:</td>
                        <td><?php echo $row['adress']; ?></td>
                      </tr>
                     
                    </tbody>
                  </table>

                </div>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>
    </body>
</html> 

<!--Session start 2-->
<?php
	
    }
 //}
?>
<!--Session end 2-->