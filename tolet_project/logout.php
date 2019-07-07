<?php
    session_start();
    session_destroy();
    unset($_SESSION['username']);
    $_SESSION['login_success'] = "You are now logged out";
    header("refresh:5; url=index.php");
    //header("location:login.php");
?>

    <?php
        if(isset($_SESSION['login_success'])){
            echo "<div id='login_success'>".$_SESSION['login_success']."</div>";
            unset($_SESSION['login_success']);
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

  </body>
</html>


