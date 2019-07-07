<?php
    session_start();

  $server = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "rasoft";
    
	$db = mysql_connect($server,$db_user,$db_pass) && mysql_select_db($db_name);

  function cleanInput($text)
  {
    //strip tags
    $text = strip_tags($text);
    $text = trim($text);
    return $text;
  }

function Is_email($user)
{
  //If the username input string is an e-mail, return true 
  if(filter_var($user, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
}
    if(isset($_POST['login_btn'])){
        $username=mysql_real_escape_string($_POST['username']);       
        $password=mysql_real_escape_string($_POST['password']);  
        //$password=md5(mysql_real_escape_string($_POST['password']));//or 

        $password = md5($password); //remember we hashed password before storing last time.//or

        $check_email = Is_email($username);
        if($check_email)
        {
          // email & password combination
          $sql = mysql_query("SELECT * FROM `users` WHERE `email` = '$username' AND `password` = '$password'");
        } else {
          // username & password combination
          $sql = mysql_query("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
        }
        
		    $row = mysql_fetch_array($sql);
        if(mysql_num_rows($sql) == true){
            $_SESSION['login_success'] = "Login successfull";
            $_SESSION['username'] = $username;//Seession User line
			
			      $_SESSION['access'] = $row['access_control']; //Access control line, SESSION CREATE FOR USER ACCESS CONTROL
             if($_SESSION['access']==1){//access control admin
                header("refresh:1; url=adminpanel.php");
             }if($_SESSION['access']==0){//access control user
                header("refresh:1; url=user_panel.php");
             }
            //header("refresh:1; url=adminpanel.php");            
        }
		else{
            $_SESSION['message'] = "User name or Password incorrect";
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
    <!--<link href="style.css" rel="stylesheet" type="text/css"/>-->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/bootstrap.css" rel="stylesheet"/> 
    <link href="css/error_success-message.css" rel="stylesheet"/>  
    <link href="css/app.css" rel="stylesheet"/>
    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <style>
        @charset "utf-8";
        
        
        @import url//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css);
        
        
        
        div.main{
            background: #0264d6; /* Old browsers */
        background: -moz-radial-gradient(center, ellipse cover,  #0264d6 1%, #1c2b5a 100%); /* FF3.6+ */
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(1%,#0264d6), color-stop(100%,#1c2b5a)); /* Chrome,Safari4+ */
        background: -webkit-radial-gradient(center, ellipse cover,  #0264d6 1%,#1c2b5a 100%); /* Chrome10+,Safari5.1+ */
        background: -o-radial-gradient(center, ellipse cover,  #0264d6 1%,#1c2b5a 100%); /* Opera 12+ */
        background: -ms-radial-gradient(center, ellipse cover,  #0264d6 1%,#1c2b5a 100%); /* IE10+ */
        background: radial-gradient(ellipse at center,  #0264d6 1%,#1c2b5a 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0264d6', endColorstr='#1c2b5a',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        height:calc(100vh);
        width:100%;
        }
        
        [class*="fontawesome-"]:before {
          font-family: 'FontAwesome', sans-serif;
        }
        
        /* ---------- GENERAL ---------- */
        
        * {
          box-sizing: border-box;
            margin:0px auto;
        
          &:before,
          &:after {
            box-sizing: border-box;
          }
        
        }
        
        body {
           
            color: #606468;
          font: 87.5%/1.5em 'Open Sans', sans-serif;
          margin: 0;
        }
        
        a {
        	color: #eee;
        	text-decoration: none;
        }
        
        a:hover {
        	text-decoration: underline;
        }
        
        input {
        	border: none;
        	font-family: 'Open Sans', Arial, sans-serif;
        	font-size: 14px;
        	line-height: 1.5em;
        	padding: 0;
        	-webkit-appearance: none;
        }
        
        p {
        	line-height: 1.5em;
        }
        
        .clearfix {
          *zoom: 1;
        
          &:before,
          &:after {
            content: ' ';
            display: table;
          }
        
          &:after {
            clear: both;
          }
        
        }
        
        .container {
          left: 50%;
          position: fixed;
          top: 50%;
          transform: translate(-50%, -50%);
        }
        
        /* ---------- LOGIN ---------- */
        
        #login form{
        	width: 250px;
        }
        #login, .logo{
            display:inline-block;
            width:40%;
        }
        #login{
        border-right:1px solid #fff;
          padding: 0px 22px;
          width: 59%;
        }
        .logo{
        color:#fff;
        font-size:50px;
          line-height: 125px;
        }
        
        #login form span.fa {
        	background-color: #fff;
        	border-radius: 3px 0px 0px 3px;
        	color: #000;
        	display: block;
        	float: left;
        	height: 50px;
            font-size:24px;
        	line-height: 50px;
        	text-align: center;
        	width: 50px;
        }
        
        #login form input {
        	height: 50px;
        }
        fieldset{
            padding:0;
            border:0;
            margin: 0;
        
        }
        #login form input[type="text"], input[type="password"] {
        	background-color: #fff;
        	border-radius: 0px 3px 3px 0px;
        	color: #000;
        	margin-bottom: 1em;
        	padding: 0 16px;
        	width: 200px;
        }
        
        #login form input[type="submit"] {
          border-radius: 3px;
          -moz-border-radius: 3px;
          -webkit-border-radius: 3px;
          background-color: #000000;
          color: #eee;
          font-weight: bold;
          /* margin-bottom: 2em; */
          text-transform: uppercase;
          padding: 5px 10px;
          height: 30px;
        }
        
        #login form input[type="submit"]:hover {
        	background-color: #d44179;
        }
        
        #login > p {
        	text-align: center;
        }
        
        #login > p span {
        	padding-left: 5px;
        }
        .middle {
          display: flex;
          width: 600px;
        }
    </style>
  </head>
  <body>                     
			    		

<div class="main" style="font-size: 14px !important;">
    <div class="container">
            <?php //massage
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
        ?><br />
        <center>
        <div class="middle">
              <div id="login">
        
                <form method="POST" action="login.php">
        
                  <fieldset class="clearfix">
        
                    <p ><span class="fa fa-user"></span>
                    <input type="text" name="username" id="first_name" Placeholder="Username" required>
                    </p> <!-- JS because of IE support; better: placeholder="Username" -->
                    
                    <p><span class="fa fa-lock"></span>
                    <input type="password" name="password" id="password"  Placeholder="Password" required>
                    </p> <!-- JS because of IE support; better: placeholder="Password" -->
                    
                     <div>
                     <span style="width:48%; text-align:left;  display: inline-block;"><a class="" href="#">Forgot
                     password?</a></span>
                     <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" name="login_btn" value="Sign In"></span>
                     </div>
        
                  </fieldset>
                <div class="clearfix"></div>
                </form>
        
                <div class="clearfix"></div>
        
              </div> <!-- end login -->
              <div class="logo"><img style="width: 70%; height: 70%;" src="images/tree-library.jpg" />
                  <p style="font-size: 14px; padding-left: 35px; padding-right: 35px;">Demo Project</p>
                  <div class="clearfix"></div>
              </div>
              
              </div>
        </center>
    </div>
</div>		    			                  
			    		                       
  
  </body>
</html>


