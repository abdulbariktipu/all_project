    <!--Session start 1-->
    <?php
	   session_start();
       if(!isset($_SESSION['username'])){
       echo "Please login again";
       header("location:login.php");
       } 
	   else{
		$access = $_SESSION['access'];//Cannot access add_book page user
    ?>
    <!--Session end 1-->
<?php
   $_SESSION['username'];
    
     require "dbconnect.php";//connect to database

    if(isset($_POST['insert_book'])){
        $book_id=mysql_real_escape_string($_POST['book_id']);
        $book_name=mysql_real_escape_string($_POST['book_name']);
        $iso_no=mysql_real_escape_string($_POST['iso_no']);
        $writer_name=mysql_real_escape_string($_POST['writer_name']);
        $book_code=mysql_real_escape_string($_POST['book_code']);
		$rack_no=mysql_real_escape_string($_POST['rack_no']);
		$book_copy=mysql_real_escape_string($_POST['no_of_copy']);
		$return_date=mysql_real_escape_string($_POST['return_date']);
        
   
       
        $sql = "INSERT INTO book_entry (book_id,book_name,iso_no,writer_name,book_code,rack_no,no_of_copy,return_date,today_date) 
					VALUES ('$book_id','$book_name','$iso_no','$writer_name','$book_code','$rack_no','$book_copy','$return_date',now())";
					
            mysql_query($sql);
			
            $_SESSION['register_success'] = "Insert successfull";
            //$_SESSION['username'] = $username;
            header("refresh:5; url=add_book.php");
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
    <title>Home</title>

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

    


  <div class="">
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
			
			  <?php //if $access == 1 then only admin can access add_book.php
			 	if($access==1)
				{
					echo "<li><a href='add_book.php'>Book Entry</a></li>";
				}
			 ?>
			 
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
					echo "<li><a href='register.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
				}
			 ?>
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
              <li>
            </ul>
          </div>
        </nav>    
  <!-- nave end -->
  
  
    <div class="container" style="margin-top: 80px; margin-bottom: 80px;">
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
        	<h3 class="panel-title">Book Entry</h3>
	</div>
<div class="panel-body">
<form role="form"  method="POST" action="add_book.php">
<div class="col-md-12 col-sm-12">
	<div class="form-group col-md-6 col-sm-6">
            <label for="name">book_id*</label>
            <input type="text" name="book_id" class="form-control input-sm" id="book_id" placeholder="book_id">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="email">book_name*</label>
            <input type="text" name="book_name" class="form-control input-sm" id="book_name" placeholder="book_name">
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="mobile">iso_no*</label>
            <input type="text" name="iso_no" class="form-control input-sm" id="iso_no" placeholder="iso_no">
        </div>

		<div class="form-group col-md-6 col-sm-6">
            <label for="city">writer_name*</label>
            <input type="text" name="writer_name" class="form-control input-sm" id="writer_name" placeholder="writer_name">
        </div>
	
		<div class="form-group col-md-6 col-sm-6">
            <label for="state">book_code*</label>
            <input type="text" name="book_code" class="form-control input-sm" id="book_code" placeholder="book_code">
        </div>

		<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">rack_no</label>
            <input type="text" name="rack_no" class="form-control input-sm" id="rack_no" placeholder="rack_no">
        </div>
		
		<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">No of Copy</label>
            <input type="text" name="no_of_copy" class="form-control input-sm" id="no_of_copy" placeholder="No of Book Copy">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">Required Date</label>
            <input type="text" name="return_date" class="form-control input-sm" id="return_date" placeholder="Required Date">
        
			<!-- Date picker start http://www.daterangepicker.com/#ex3-->
               <script type="text/javascript">
                    $(function() {
                       $('input[name="return_date"]').daterangepicker({
                              singleDatePicker: true,
                              showDropdowns: true
                             },
                          function(start, end, label) {
                        var years = moment().diff(start, 'years');
                      });
                   });
              </script>
       </div>              
								
</div>

	<div class="col-md-12 col-sm-12">
		<div class="form-group col-md-3 col-sm-3 pull-right" >
			<input type="submit" name="insert_book" class="btn btn-primary" value="Submit"/>
	</div>
</div>
</form>
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