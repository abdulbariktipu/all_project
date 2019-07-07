    <!--Session start 1-->
    <?php
       session_start();
       if(!isset($_SESSION['username'])){
        echo "Please login again";
        header("location:login.php");
       } else{
           $access = $_SESSION['access'];//access control
           

    ?>
    <!--Session end 1-->
<?php
   $_SESSION['username'];

     require "dbconnect.php";//connect to database
     require "dbcontroller.php";// cuntry state list
     $usernameError ="";
     $emailError ="";
    if(isset($_POST['register_btn'])){

        $sid=mysql_real_escape_string($_POST['sid']);
        $username=mysql_real_escape_string($_POST['username']);
        $country=mysql_real_escape_string($_POST['country']);
        $state=mysql_real_escape_string($_POST['state']);        
        $password=mysql_real_escape_string($_POST['password']);
        $password2=mysql_real_escape_string($_POST['password2']);
        $gender=mysql_real_escape_string($_POST['gender']);
//condtion change 3rd step
        if($password == $password2){
            //create user
            $password=md5($password); //hash password before storing for security purposes
            
            $query = mysql_query("SELECT * FROM users WHERE sid='$sid'");
            if(mysql_num_rows($query) > 0 ) { //check if there is already an entry for that username
                $_SESSION['message'] = "Username already exists!";
                header("refresh:2; url=user_register.php");
                //echo "Username already exists!";
            }else{
            
            
            $sql = "INSERT INTO users(sid,username,country,state,password,gender)
             VALUES ('$sid','$username','$country','$state','$password','$gender')";
            mysql_query($sql);
            $_SESSION['register_success'] = "Register_successfull";
            header("refresh:2; url=user_register.php");
               }    //echo"Register_successfull";
        }else{
            //failed
            //$_SESSION['message'] = "The two passwords do not match";
            $_SESSION['message'] = "<p class='bg-primary'>Password not match!</p>";
            //echo "<p class='bg-primary'>Password not match!</p>";
        }
    }


?>

<!-- Country State start -->
<?php
    require_once("dbcontroller.php");
    $db_handle = new DBController();
    $query ="SELECT * FROM country";
    $results = $db_handle->runQuery($query);
?>
<!-- Country State End -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Registration</title>

    <!-- Bootstrap -->
    <!--<link href="style.css" rel="stylesheet" type="text/css"/>-->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/error_success-message.css" rel="stylesheet"/>
    <link href="css/app.css" rel="stylesheet"/>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Date picker start http://www.daterangepicker.com/#ex3-->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> 
    
    <link rel="stylesheet" href="validCss/bootstrap.css"/><!--<link bootstrapValidator.css -->
    <link rel="stylesheet" href="validCss/bootstrapValidator.css"/> <!--link bootstrapValidator.css-->
    <script type="text/javascript" src="validJs/jquery.min.js"></script><!--bootstrapValidator.js-->
    <script type="text/javascript" src="validJs/js/bootstrap.min.js"></script><!--bootstrapValidator.js-->
    <script type="text/javascript" src="validJs/bootstrapValidator.js"></script><!--bootstrapValidator.js-->

    <!-- Country State start -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
    function getState(val) {
        $.ajax({
        type: "POST",
        url: "get_state.php",
        data:'country_id='+val,
        success: function(data){
            $("#state-list").html(data);
        }
        });
    }
    </script>
    <!-- Country State End -->

<style>
    label{
        color: black;
    }
    .navbar-default .navbar-nav > .active > a{
            color: #555;
            background-color: #0aa2db;
        }
</style>
    <script>//
        var bleep = new Audio();
        bleep.src = 'salamisound.mp3';
    </script>
  </head>
<body style="background-color: #5bc0de;">

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
           
             
            <li class="active"><a href="user_register.php">Registration</a></li>
           
                                    
            <li><a href="all_student.php">User List</a></li>
            
                              
            <li><a href="book_entry.php">Book Add</a></li>
           
           
            <li><a href="all_book.php">Book List</a></li>
            
            
            <li><a href="book_borrow.php">Borrow Book</a></li>
           
            
            <li><a href="book_borrow_view.php">Borrow Book View</a></li>

            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
           
            <li>
              <a class="btn btn-default btn-outline btn-circle"  data-toggle="collapse" href="#nav-collapse1" aria-expanded="false" aria-controls="nav-collapse1">More</a>
            </li>
          </ul>
          
          <ul class="collapse nav navbar-nav nav-collapse" id="nav-collapse1">
            
            <li><a href="#">Demo</a></li>

            
            <li><a href="#">Seetings</a></li>
            
            
            <li><a href="book_re_details.php">Book Return Details</a></li>
                     
            
            <li><a href="book_return.php">Book Return</a></li>
                     
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
</div><!-- /.container-fluid -->
<!-- nave end -->
  
  
    <div class="container">
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
    
    <div class="panel panel-primary" style="margin:20px;">
    <div class="panel-heading">
            <h3 class="panel-title">User Registration Form</h3>
    </div>
<div class="panel-body">
<form id="paymentForm" role="form"  method="POST" action="user_register.php">
<div class="col-md-12 col-sm-12">
        <div class="form-group col-md-6 col-sm-6">
            <label for="sid">Student ID*</label>
            <input type="text" name="sid" class="form-control input-sm" minlength="4" id="sid" placeholder="Student ID" >
        </div>
        
        <div class="form-group col-md-6 col-sm-6">
            <label for="username">Student Name*</label>
            <input type="text" name="username" minlength="3" class="form-control input-sm" id="username" placeholder="Student Name">
        </div>
        
        <div class="form-group col-md-6 col-sm-6">
            <label for="country">Select Country</label>
            <select name="country" id="country-list"  class="form-control input-sm" class="demoInputBox" onChange="getState(this.value);">
            <option value="">Select Country</option>
            <?php
            foreach($results as $country) {
            ?>
            <option value="<?php echo $country["country_name"]; ?>"><?php echo $country["country_name"]; ?></option>
            <?php
            }
            ?>
            </select>
        </div>  
        
        <div class="form-group col-md-6 col-sm-6">
            <label for="states">Select States</label>
            <select name="state" id="state-list" class="form-control input-sm" class="demoInputBox">
            <option value="">Select State</option>
            </select>
        </div>  
        
        <div class="form-group col-md-6 col-sm-6">
            <label  id="lpassword" for="password">Password</label>
            <input type="password" name="password" class="form-control input-sm" id="password" placeholder="password">
        </div>
                
        <div class="form-group col-md-6 col-sm-6">
            <label for="password2">Confirm Password</label>
            <input type="password" name="password2" class="form-control input-sm" id="password2" placeholder="Confirm Password">
        </div>        
        
        <div class="form-group col-md-6 col-sm-6">
            <label for="gender">You Are:</label>
            <label><input type="radio" name="gender" value="Male" required data-bv-notempty-message="The gender is required" > Male</label>
            <label><input type="radio" name="gender" value="Female"> Female</label>
        </div>
        
        <div class="form-group col-md-6 col-sm-6">
            <label for="access_control">Access Control:</label>
            <label><input type="radio" name="access_control" value="1" required data-bv-notempty-message="This field is required"> Admin</label>
            <label><input type="radio" name="access_control" value="0" > User</label>
        </div>                                  
    </div>

    <div class="col-md-12 col-sm-12">
        <div class="form-group col-md-3 col-sm-3 pull-right" >
                <input onclick="bleep.play()" type="submit" name="register_btn" class="btn btn-primary" value="Submit"/>
        </div>
    </div>
</form>
</div>
    <div class="panel-heading" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">
       <h3 class="panel-title">User Entry</h3>
    </div>
    </div> 
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>   

<!-- BootstrapValidator script start -->   
<script type="text/javascript">
$(document).ready(function() {
    $('#paymentForm').bootstrapValidator({ 
        /**
         * feedbackIcons: {
         *             valid: 'glyphicon glyphicon-ok',
         *             invalid: 'glyphicon glyphicon-remove',
         *             validating: 'glyphicon glyphicon-refresh'
         *         },
         */
        fields: {
            sid: {
                validators: {
                    notEmpty: {
                        message: 'The student ID is required and cannot be empty'
                    },
                    stringLength: {
                        min: 4,
                        message: 'The title must be less than 4 characters long'
                    },  
                    digits: {
                        message: 'The value can contain only digits'
                    }                    
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        message: 'The title must be less than 2 characters long'
                    }
                }
            },/*
            country: {
                validators: {
                    notEmpty: {
                        message: 'The Student country is required and cannot be empty'
                    }
                }
            },
            states: {
                validators: {
                    notEmpty: {
                        message: 'The Student states is required and cannot be empty'
                    }
                }
            },*/
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        message: 'The title must be less than 2 characters long'
                    },
                    identical: {
                        field: 'password2',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },            
            password2: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        message: 'The title must be less than 2 characters long'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }

                }
            }
        }
    });
});
</script>
<!-- BootstrapValidator script end -->       
      
  </body>
</html>
<!--Session start 2-->
<?php
    }
 //}
?>
<!--Session end 2-->


