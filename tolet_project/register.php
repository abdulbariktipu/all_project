<?php
    session_start();
    
     require "dbconnect.php";//connect to database
    //$db=mysqli_connect("localhost","root","","authentication");
    
    if(isset($_POST['register_btn'])){
        $username=mysql_real_escape_string($_POST['username']);
        $username2=mysql_real_escape_string($_POST['username2']);
        $birthdate=mysql_real_escape_string($_POST['birthdate']);
        $email=mysql_real_escape_string($_POST['email']);
        $password=mysql_real_escape_string($_POST['password']);
        $password2=mysql_real_escape_string($_POST['password2']);
        $access=mysql_real_escape_string($_POST['access_control']);
        
        if($password == $password2){
            //create user
            $password=md5($password); //hash password before storing for security purposes
            $sql = "INSERT INTO users(username,username2,access_control,birthdate,email,password,regDate) VALUES ('$username','$username2','$access','$birthdate','$email','$password',now())";
            mysql_query($sql);
     
            $last_id=mysql_insert_id();
            $uploaddir = 'images/';
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                
                $sql = "UPDATE `users` SET`file` = '$uploadfile' 
                    WHERE `id` = $last_id ";
                 mysql_query($sql);
            
             }
           
            $_SESSION['register_success'] = "Register_successfull";
            //$_SESSION['username'] = $username;
            header("refresh:3; url=login.php");
            //header("location:login.php"); //redirect to home page
        }else{
            //failed
            $_SESSION['message'] = "The two passwords do not match";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Reg</title>

    <!-- Bootstrap -->
    <!--<link href="style.css" rel="stylesheet" type="text/css"/>-->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/bootstrap.css" rel="stylesheet"/>   
    <link href="css/app.css" rel="stylesheet"/>
    
    <!-- Date picker start http://www.daterangepicker.com/#ex3-->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
     
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <!-- Date picker end http://www.daterangepicker.com/#ex3-->   

  </head>
  <body style="background: gray; margin-top: 200px;>
    <div class="header">
        <h1></h1>
    </div>
    
    <?php
        if(isset($_SESSION['register_success'])){
            echo "<div id='login_success'>".$_SESSION['register_success']."</div>";
            unset($_SESSION['register_success']);
        }
    ?>
    <?php
        if(isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
    ?>
    
  
    <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Register user</h3>
			 			</div>
			 			<div class="panel-body">
                
                        <form action="register.php" method="post" enctype="multipart/form-data" >
                                         
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="username" id="first_name" class="form-control input-sm form-control-log" placeholder="First Name">
			    					</div>
			    				</div>
                                
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                        <input type="text" name="username2" id="first_name" class="form-control input-sm form-control-log" placeholder="Last Name">
			    					</div>
			    				</div>
			    			</div>
                            
                                <div class="input-group" style="margin-bottom: 10px;">
                                      <span class="input-group-addon" id="sizing-addon2">Birthdate</span>
                                      <input type="text" name="birthdate" id="first_name" class="form-control input-sm" value="" aria-describedby="sizing-addon2">
                                      <!-- Date picker start http://www.daterangepicker.com/#ex3-->
                                        <script type="text/javascript">
                                        $(function() {
                                            $('input[name="birthdate"]').daterangepicker({
                                                singleDatePicker: true,
                                                showDropdowns: true
                                            }, 
                                            function(start, end, label) {
                                                var years = moment().diff(start, 'years');
                                                //var days = moment().diff(start, 'days');
                                                //var month = moment().diff(start, 'month');
                                                //alert("You are " + days + " days old." + years + " years old." + month + " month old.");
                                                alert("You are " + years + " years old.");
                                            });
                                        });
                                        </script>
                                </div>

                              
			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
			    			</div>


			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password2" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
			    					</div>
			    				</div>
			    			</div>
                            
						
			    			<div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-4">
			    					<div class="form-group">
                                    
			    				<label>Your are:</label>		
                                
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-4">
			    					<div class="form-group">
                                    
			    						
                                <label><input type="radio" name="access_control" value="1" required> Admin</label>
			    					</div>
			    				</div>
                                
			    				<div class="col-xs-6 col-sm-6 col-md-4">
			    					<div class="form-group">
                                        <label><input type="radio" name="access_control" value="0"> User</label>
			    					</div>
			    				</div>
			    			</div>
							
			    			<div class="form-group">
			    				<input type="file" name="file" id="file">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">			    				
                                        <input type="submit" name="register_btn" value="Register" class="btn btn-info btn-block">	                                       
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                        <a class="btn btn-info btn-block" href="login.php">Login</a>			    						
			    					</div>
			    				</div>
			    			</div>
			    			
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>              
  </body>
</html>


