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
<?php
   $_SESSION['username'];

     require "dbconnect.php";//connect to database
           $usernameError ="";
           $emailError ="";
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
            $sql = "INSERT INTO users(username,username2,birthdate,email,password,access_control) VALUES ('$username','$username2','$birthdate','$email','$password','$access')";
            mysql_query($sql);
            $_SESSION['register_success'] = "Register_successfull";
            //$_SESSION['username'] = $username;
            //header("refresh:5; url=login.php");
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
    <link href="css/error_success-message.css" rel="stylesheet"/>
    <link href="css/app.css" rel="stylesheet"/>

    <!-- Date picker start http://www.daterangepicker.com/#ex3-->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>


    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <!-- Date picker end http://www.daterangepicker.com/#ex3-->




  </head>
  <body>




  <div class="my-container">
    <!-- Nave Start -->
         <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#"><b>Libary</b></a>
            </div>
            <ul class="nav navbar-nav">
              <li><a href="home.php">Home</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Book Info
                <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="add_book.php">Book Entry</a></li>
              <li><a href="book_list.php">Book List</a></li>
              <li><a href="#">Page 1-3</a></li>
            </ul>
          </li>
              <li><a href="#">Upcome</a></li>
              <li><a href="#">Page 3</a></li>
            </ul>


			<?php
				require "dbconnect.php";

				 $user = $_SESSION['username'];

				$query0="SELECT * FROM `users` 
						WHERE users.`username`='$user'";

				$result1=mysql_query($query0);

				$row=mysql_fetch_array($result1);
			?>

            <ul class="nav navbar-nav navbar-right">
              <li><a target="_blank" href='user_profile.php?epr=details&id="<?php echo $row['id'];?>"'><span class="glyphicon glyphicon-user"></span>
			  Welcome <?php echo $_SESSION['username'];?></a></li>


			 <?
			 	if($access==1)
				{
					echo "<li class='active'><a href='register.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
				}
			 ?>

              <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
              <li>
            </ul>
          </div>
        </nav>
  <!-- nave end -->


    <div class="container" style="margin-top: 200px; margin-bottom: 200px;">
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
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Register user <small>It's free!</small></h3>
			 			</div>
			 			<div class="panel-body">

			    		<form role="form"  method="POST" id="myform" action="register.php">

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="username" id="field" class="form-control input-sm form-control-log" placeholder="First Name">
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

							<center>
							<div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Your Are:</label>
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
							</center>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                        <input type="submit" name="register_btn" tabindex=5 onclick="validar();" value="Register" class="btn btn-info btn-block">
			    					</div>
			    				</div>
			    			<!--	<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                        <a class="btn btn-info btn-block" href="login.php">Login</a>
			    					</div>
			    				</div> -->
			    			</div>
			    		</form>

			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
    <?php include'footer.php'?>
  </body>
</html>
<!--Session start 2-->
<?php
	}
 //}
?>
<!--Session end 2-->


