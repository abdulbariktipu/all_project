<style>
#logout_success{
    width: 360px;
    margin: 305px auto;
    height: 40px;
    border: 1px solid #FF0000;
    border-radius: 5px;
    background: green;
    color: white;
    text-align: center;
    padding-top: 10px;
    padding-bottom: 10px;
}
</style>


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
            top: 88%;
            left: 10%;
            float: left !important;
            margin-right: -50%;
            transform: translate(-50%, -50%);
        }
    </style>
  </head>
  <body>
    <div class="preload">
        <img src="images/loading5.gif" width="50px" height="50px" />
    </div>
    <?php
        session_start();
        session_destroy();
        unset($_SESSION['username']);
        $_SESSION['login_success'] = "You are now logged out <img src='images/loading5.gif' width='20px' height='20px' />";
        header("refresh:5; url=login.php");
        //header("location:login.php");
    ?>

    <?php //Logout massage show
        if(isset($_SESSION['login_success'])){
            echo "<div id='logout_success'>".$_SESSION['login_success']."</div>";
            unset($_SESSION['login_success']);
        }
    ?>
  </body>
</html>


