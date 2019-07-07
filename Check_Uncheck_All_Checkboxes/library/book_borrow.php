    <!--Session start 1-->
    <?php
	   session_start();
       if(!isset($_SESSION['username'])){
       echo "Please login again";
       header("location:login.php");
       } 
	   else{
		  $access = $_SESSION['access'];//access control
    ?>
    <!--Session end 1-->
<?php
   $_SESSION['username'];
    
     require "dbconnect.php";//connect to database

    if(isset($_POST['borrow_book'])){
        
        //$borrow_id=mysql_real_escape_string($_POST['borrow_id']);
        $sid=mysql_real_escape_string($_POST['sid']);
        $username=mysql_real_escape_string($_POST['username']);
        $email=mysql_real_escape_string($_POST['email']);
        $book_id=mysql_real_escape_string($_POST['book_id']);
        $book_name=mysql_real_escape_string($_POST['book_name']);
        $writer_name=mysql_real_escape_string($_POST['writer_name']);
        $book_edition=mysql_real_escape_string($_POST['book_edition']);
		    $borrow_date=mysql_real_escape_string($_POST['borrow_date']);
		    $return_date=mysql_real_escape_string($_POST['return_date']);

       
$sql = "INSERT INTO book_borrow (sid,username,email,book_id,book_name,writer_name,book_edition,borrow_date,return_date) 
					VALUES ('$sid','$username','$email','$book_id','$book_name','$writer_name','$book_edition','$borrow_date','$return_date')";
					
$inser_t=mysql_query($sql);
			

$sql_up = "UPDATE book_entry SET no_of_copy = no_of_copy - 1 WHERE book_id=$book_id";
$update_d = mysql_query($sql_up);


            $_SESSION['register_success'] = "Insert successfull";
            //$_SESSION['username'] = $username;
            header("refresh:2; url=book_borrow.php");
            //header("location:login.php"); //redirect to home page
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book Borrow</title>

    <!-- Bootstrap -->
    <!--<link href="style.css" rel="stylesheet" type="text/css"/>-->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/error_success-message.css" rel="stylesheet"/>
    <link href="css/app.css" rel="stylesheet"/>
    
    
    <!-- STYLE CSS autocomplete start-->
      <link rel="stylesheet" href="jquery/css/jquery-ui-1.8.2.custom.css" />    
      <!-- JAVASCRIPT autocomplete-->  
      <script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
      <script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script>

        <script type="text/javascript">
              jQuery(document).ready(function(){
            $('#book_id').autocomplete({
              source : 'search.php',
              minLength : 1,  
            });
          });        
        </script>
      <!-- STYLE CSS autocomplete end-->
    
    
    <!-- Date picker start http://www.daterangepicker.com/#ex3-->
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
      <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>  
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  
      <!-- Javascript -->  
      <script>  
         $(function() {  
   $( "#borrow_date" ).datepicker({
         dateFormat:"dd-mm-yy",
           duration:"slow",
         showAnim:"show"
            });  
      $( "#borrow_date" ).datepicker("setDate", "0");
            
            $( "#return_date" ).datepicker({
         dateFormat:"dd-mm-yy",
           duration:"slow",
         showAnim:"show"
            });  
            $( "#return_date" ).datepicker("setDate", "1w+1");  
         });  
      </script> 
      
      

<style>
    label{
        color: black;
    }
    .navbar-default .navbar-nav > .active > a{
            color: #555;
            background-color: #0aa2db;
        }
</style>

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
           <?}?>
                                    
            <li><a href="all_student.php">User List</a></li>
            
           <?php if($access==1){?>                     
            <li><a href="book_entry.php">Book Add</a></li>
           <?}?>
           
            <li><a href="all_book.php">Book List</a></li>
            
            <?php if($access==1){?>
            <li class="active"><a href="book_borrow.php">Borrow Book</a></li>
            <?}?>
            
            <li><a href="book_borrow_view.php">Borrow Book View</a></li>
            <li><a target="_blank" href='user_profile.php?sid="<?php echo $row['sid'];?>"'><span class="glyphicon glyphicon-user"></span>
			     <?php echo $_SESSION['username'];?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
           <?php if($access==1){?>
            <li>
              <a class="btn btn-default btn-outline btn-circle"  data-toggle="collapse" href="#nav-collapse1" aria-expanded="false" aria-controls="nav-collapse1">More</a>
            </li>
          </ul>
          
          <ul class="collapse nav navbar-nav nav-collapse" id="nav-collapse1">
            <?php if($access==1){?>
            <li><a href="#">Demo</a></li>
            <?}?>
            
            <?php if($access==1){?>
            <li><a href="#">Seetings</a></li>
            <?}?>
            
            <?php if($access==1){?>
            <li><a href="book_re_details.php">Book Return Details</a></li>
            <?}?>            
            
            <li><a href="book_return.php">Book Return</a></li>
            <?}?>            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
</div><!-- /.container-fluid -->
<!-- nave end -->
  
  
    <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
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
        	<h3 class="panel-title">Book Borrow</h3>
	</div>
<div class="panel-body">
<form role="form"  method="POST" action="book_borrow.php">
<div class="col-md-12 col-sm-12">
	<div class="form-group col-md-6 col-sm-6">
            <label for="name">Student ID*</label>
            <input type="text" name="sid" class="form-control input-sm" id="sid" placeholder="Student ID" required="">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="email">Book ID*</label>
            <input type="text" name="book_id" class="form-control input-sm" id="book_id" placeholder="Book ID" required="">
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="mobile">Student Name*</label>
            <input type="text" name="username" class="form-control input-sm" id="username" placeholder="Student Name">
        </div>

		<div class="form-group col-md-6 col-sm-6">
            <label for="city">Book Name*</label>
            <input type="text" name="book_name" class="form-control input-sm" id="book_name" placeholder="Book Name">
        </div>
	
		<div class="form-group col-md-6 col-sm-6">
            <label for="state">Dept</label>
            <input type="text" name="dept" class="form-control input-sm" id="dept" placeholder="dept">
        </div>

		<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">Writer Name</label>
            <input type="text" name="writer_name" class="form-control input-sm" id="writer_name" placeholder="Writer Name">
        </div>
		
		<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">Email</label>
            <input type="text" name="email" class="form-control input-sm" id="email" placeholder="Email">
        </div> 
        
		<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">Book Edition</label>
            <input type="text" name="book_edition" class="form-control input-sm" id="book_edition" placeholder="Book Edition">
        </div>
        
		<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">Borrow Book</label>
            <input type="text" name="borrow_date" class="form-control input-sm" id="borrow_date" placeholder="borrow_date" >
        </div>  
		
        <div class="form-group col-md-6 col-sm-6">
            <label for="pincode">Return Date</label>
            <input type="text" name="return_date" class="form-control input-sm" id="return_date" placeholder="return_date">
        </div>        
								
    </div>

	<div class="col-md-12 col-sm-12">
		<div class="form-group col-md-3 col-sm-3 pull-right" >
			<input type="submit" name="borrow_book" class="btn btn-primary" value="Submit"/>
	</div>
</div>
</form>
</div>
	<div class="panel-heading" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">
	   <h3 class="panel-title">Book Borrow</h3>
	</div>
    </div> 
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>   
          
  </body>
</html>
<!--Session start 2-->
<?php
	}
 //}
?>
<!--Session end 2-->