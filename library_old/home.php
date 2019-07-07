
    <!--Session start 1-->
    <?php
    //error_reporting(0);
	   session_start();
       if(!isset($_SESSION['username'])){
        echo "Please login again";
        header("location:home.php");
       } else{
	   		$access = $_SESSION['access'];

    ?>
    <!--Session end 1-->

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
    <link href="css/datatable.css" rel="stylesheet"><!--DataTable CSS-->
    <link href="css/app.css" rel="stylesheet"/>
    
    <!-- Date picker start http://www.daterangepicker.com/#ex3-->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

     
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <script type="text/javascript" src="js/multi-column-search.js"></script><!-- multi-column-search in DataTable --> 
    <!-- Date picker end http://www.daterangepicker.com/#ex3-->   


  </head>
  <body style="height:400px">

    <!-- Nave Start -->
         <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#"><b>Libary</b></a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="home.php">Home</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Book Info
                <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?php
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

  <?php @require "date_time.php"; ?> <!-- Live Clock show -->

  <!-- hedar show start-->  
          <?php //error_msg show
        if(isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
        ?>
        <div>
            <h4>Welcome <?php echo $_SESSION['username'];?></h4>            
        </div>


<!-- //********* Delete record and Update record start ---------------->
<?php

include('dbconnect.php');//Database connect

$epr='';
$msg='';
  
  if(isset($_GET['epr']))
     $epr=$_GET['epr'];   
     
     
    //****************Delete record    
    if($epr=='delete')
    {
        
        $id=$_GET['id'];
        $delete=mysql_query(" DELETE FROM users where id=$id");
        
        
        
        if($delete)
            @header("location:home.php");
              
            else
            $msg='Error:'.mysql_error();
                    
    }   
?>
<!-- //********* Delete record and Update record end ---------------->

    <!-------Save update start----------------->    
    <?php   
    
     if($epr=='saveup'){
        
        
        $username=$_POST['username'];
        $username2=$_POST['username2'];
        $birthday=$_POST['birthdate'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $password = md5($password); //remember we hashed password before storing last time.
        $id=$_POST['id'];
        
        $a_sql=mysql_query("UPDATE  `library`.`users` SET  
        `username` =  '$username',`username2` =  '$username2',`birthdate` =  '$birthday',`email` =  '$email',`password` =  '$password' WHERE  `users`.`id` =$id");

            if($a_sql){
            @header("location:home.php");
             } 
            else
            $msg='Error:'.mysql_error();
     
     }
    ?>



<!-----------update section form--------------------------------->

    <?php 
    
        if($epr=='update'){
            $id=$_GET['id'];
            
         $row=mysql_query("SELECT *FROM users WHERE id='$id'");   
         $st_row=mysql_fetch_array($row);
            
    ?>
    
<form  method="POST" action="home.php?epr=saveup">    
    <table  align="center">    
         <tr style="padding-bottom: 50px; margin-bottom: 20px !important;">
             <td style="width: 100px;">ID</td>
             <td style="width: 0px;">:</td>
             <td><input type="text" name="id" value="<?php echo $st_row['id'] ?>" /></td>
         </tr>

         <tr>
             <td style="width: 100px;">username</td>
             <td style="width: 0px;">:</td>
             <td><input type="text" name="username" value="<?php echo $st_row['username'] ?>" /></td>
         </tr>
         
         <tr>
             <td style="width: 100px;">username2</td>
             <td style="width: 0px;">:</td>
             <td><input type="text" name="username2" value="<?php echo $st_row['username2'] ?>" /></td>
         </tr>
         
         <tr>
             <td style="width: 100px;">birthday</td>
             <td style="width: 0px;">:</td>
             <td><input type="text" name="birthdate" id="first_name"  value="<?php echo $st_row['birthdate'] ?>" aria-describedby="sizing-addon2"/>
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
            </td>
         </tr>
        
         <tr>
             <td style="width: 100px;">email</td>
             <td style="width: 0px;">:</td>
             <td><input type="email" name="email" value="<?php echo $st_row['email'] ?>" /></td>
         </tr>
    
         <tr>
             <td style="width: 100px;">Password</td>
             <td style="width: 0px;">:</td>
             <td><input type="password" name="password" value="<?php echo $st_row['password'] ?>" /></td>
         </tr>
         
        <tr>
             <td></td>
             <td><input type="submit" value="Update" name="btnsave" class="update"/>
             
        </tr>
        
        
    </table>
</form>

<?php 
    }
?>
<!-- update section end -->

<!-- Database list view start--> 

<table id="example" class="display">
        <thead>
        <!-- multi-column-search in DataTable --> 
            <tr style="font-size: 12px;">
                <th><input type='text' placeholder="ID" value='' class='filter' data-column-index='0'></th>
                <th><input type='text' placeholder="Name" value='' class='filter' data-column-index='1'></th>
                <th><input type='text' placeholder="Last Name" value='' class='filter' data-column-index='2'></th>
                <th><input type='text' placeholder="Barthday" value='' class='filter' data-column-index='3'></th>
                <th><input type='text' placeholder="Joining date" value='' class='filter' data-column-index='4'></th>
                <th></th>
            </tr>
            <tr>
        <!-- multi-column-search in DataTable end--> 
                <th style="width: 5px;">ID</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Barthday</th>
                <th>Email</th>
                <th>Action List</th>
            </tr>
        </thead>
    <tbody> 
        
        <?php
        	require "dbconnect.php";
            
            $query0="SELECT * FROM `users` ORDER by id DESC";
            
            $result1=mysql_query($query0);
      
            while($row=mysql_fetch_array($result1))
			
            {
                
                echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td align='center'>";
						if($access==1)
                            {
								echo "<a href='home.php?epr=delete&id=".$row['id']."'>Delete</a> |";
								echo "<a href='home.php?epr=update&id=".$row['id']."'>Update</a> |";
							};
							
                           
                          echo  "<a href='user_profile.php?epr=details&id=".$row['id']."'>Profile</a>
                                 
                        </td>                        
                     </tr>";        
            }

        ?>
    </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Barthday</th>
                <th>Email</th>
                <th>Action List</th>
            </tr>
        </tfoot>
    </table> 
<!-- Database list view end--> 
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/datatable.js"></script><!--DataTable js-->
    <script src="js/datatable.min.js"></script><!--DataTable js-->
    <script src="js/custom.js"></script><!--DataTable js-->
          
<?php include'footer.php'?>

<!--Session start 2-->
<?php
	}
 //}
?>
<!--Session end 2-->

