    <!--Session start 1-->
    <?php
	   session_start();
       if(!isset($_SESSION['username'])){
        echo "Please login again";
        header("location:login.php");
       } else{
	         $access = $_SESSION['access']; //Cannot access register page user

    ?>
    <!--Session end 1-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>User Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>  
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    
    <style>
        body { padding-top:12%; }
        .panel-body .btn:not(.btn-block) {
            width: 250px;
            margin-bottom: 10px;
            height: 100px;
        }

        .panel-body {
            padding: 30px;
        }
    </style>
    
    <script>//preload loding.gif
        $(function(){
            $(".preload").fadeOut(2000, function(){
                $(".content").fadeIn(1000);
            });
        });
    </script>
    
    <style>
        .content{
            display: none;
        }
        .preload{
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%);
        }
    </style>
    
  </head>
  
  <body>
  <div class="preload">
    <img src="images/loading5.gif" />
  </div>

<div class="container content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    
 			<?php   
				require "dbconnect.php";	
				
				 $user = $_SESSION['username'];
	   
				$query0="SELECT * FROM `users` 
						WHERE users.`username`='$user'";
	
				$result1=mysql_query($query0);
			
				$row=mysql_fetch_array($result1); 
			?>
                        <span class="glyphicon glyphicon-bookmark"></span> User Panel <? include "date_time.php"; ?> 
                                    
                          <a target="_blank" href='user_profile.php?sid="<?php echo $row['sid'];?>"'><span class="glyphicon glyphicon-user"></span>
			                 <?php echo $_SESSION['username'];?></a>
                          <a style="float: right;" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a>
         
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                          <a onmouseover="bleep.play()" href="all_student.php" class="btn btn-success btn-lg" class="bwidth" role="button"><span class="glyphicon glyphicon-user"></span> <br/>All User</a>
                         </div> 
                        <div class="col-md-4">
                          <a onmouseover="bleep.play()" href='user_profile.php?sid="<?php echo $row['sid'];?>"' class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Profile</a>
                          
                        </div>
                        
                        <div class="col-md-4">
                           <a onmouseover="bleep.play()" href="#" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Demo</a>
                        </div>                   
                    </div>
                </div>
            	<div class="panel-heading" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">
            	   <h3 class="panel-title">Demo</h3>
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
