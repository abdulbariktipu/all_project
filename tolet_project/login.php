<?php
    session_start();
    
    //connect to database
    //$db=mysqli_connect("localhost","root","","tolet_project");
    
    $server = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "tolet_project";
    
    $db = mysql_connect($server,$db_user,$db_pass) && mysql_select_db($db_name);
    
    if(isset($_POST['login_btn'])){
        $username=mysql_real_escape_string($_POST['username']);       
        $password=mysql_real_escape_string($_POST['password']);  
        
        $password = md5($password); //remember we hashed password before storing last time.
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysql_query($sql);
        
        $row = mysql_fetch_array($result);//Access control line
        if(mysql_num_rows($result) == true){
            $_SESSION['login_success'] = "Login successfull";
            $_SESSION['username'] = $username;
            $_SESSION['access'] = $row['access_control'];//Access control line
            header("refresh:3; url=tolet_post.php");
            //header("location:home.php"); //redirect to home page
        }else{
            $_SESSION['message'] = "Username/Password incorrect";
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
    <title>Login</title>

    <!-- Bootstrap -->
    <link href=".css" rel="stylesheet" type="text/css"/>
     <link href="css/bootstrap.min.css" rel="stylesheet"/> 
    <link href="css/bootstrap.css" rel="stylesheet"/>    
    <link href="css/app.css" rel="stylesheet"/> 
   
  </head>
  <body>
    <div class="header">
        <h1></h1>
    </div>
        
    <?php
        if(isset($_SESSION['login_success'])){
            echo "<div id='login_success'>".$_SESSION['login_success']."</div>";
            unset($_SESSION['login_success']);
        }
    ?>
    
    <?php
        if(isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
    ?>
   
    <div class="container" style="">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Login user</h3>
			 			</div>
			 			<div class="panel-body">
                        
			    		<form role="form"  method="POST" action="login.php">
                            <div class="form-group" style="text-align: center;">
       						   <img src="images/user-login-icon.png" />
        					</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-4">
			    					<div class="form-group">
			                <input type="text" name="username" id="first_name" class="form-control input-sm form-control-log" placeholder="First Name">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-4">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm form-control-log" placeholder="Password">
			    					</div>
			    				</div>
			    			</div>	
                                                                           
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">			    						
                                        <a class="btn btn-info btn-block" href="register.php">Reg</a>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="submit" name="login_btn" value="Login" class="btn btn-info btn-block">
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


