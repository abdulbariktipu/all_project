
    <!--Session start 1-->
    <?php
    //error_reporting(0);
	   session_start();
       if(!isset($_SESSION['username'])){
	   
        echo "Please login again";
        header("location:home.php");
       } else{
		$access = $_SESSION['access']; //Cannot access book_list page user
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
  <body>

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
              <?php
			 	if($access==1)
				{
					echo "<li><a href='add_book.php'>Book Entry</a></li>";
				}
			 ?>
              <li class="active"><a href="book_list.php">Book List</a></li>
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
  

	
	<?php
		
/*	require "dbconnect.php";
	
	
	if(isset($_POST['button'])){
		
		$search=$_POST['search'];		
		$query=mysql_query("SELECT * FROM book_entry WHERE book_name LIKE '%$search%' || writer_name LIKE '%$search%'");
		}*/

	?>

  <!-- hedar show start-->  
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
        
        $id=$_GET['book_id'];
        $delete=mysql_query(" DELETE FROM book_entry where book_id=$id");
        
        
        
        if($delete)
            @header("location:book_list.php");
              
            else
            $msg='Error:'.mysql_error();
                    
    }   
?>
<!-- Delete record and Update record end ---------------->

    <!-------Save update start----------------->    
    <?php   
    
     if($epr=='saveup'){
        
        
        @$book_name=$_POST['book_name'];
        @$iso_no=$_POST['iso_no'];
        @$writer_name=$_POST['writer_name'];
        @$book_code=$_POST['book_code'];
        @$rack_no=$_POST['rack_no'];
		@$book_copy=$_POST['no_of_copy'];
        
        @$return_date=$_POST['return_date'];
        @$book_id=$_POST['book_id'];
        
$a_sql = ("UPDATE 
  `book_entry` 
SET
  `book_id` = '$book_id',
  `book_name` = '$book_name',
  `iso_no` = '$iso_no',
  `writer_name` = '$writer_name',
  `book_code` = '$book_code',
  `rack_no` = '$rack_no',
  `no_of_copy` = '$book_copy',
  `return_date` = '$return_date' 
  
WHERE `book_id` = '$book_id'"); 
  
	$res=mysql_query($a_sql);	

            if($res){
			echo @header("refresh:5; url=book_list.php");
            //@header("refresh:5; url=book_list.php");//header("location:book_list.php");
             } 
            else
            $msg='Error:'.mysql_error();
     }
    ?>



<!-----------update section form--------------------------------->

    <?php 
    
        if($epr=='update'){
            $book_id=$_GET['book_id'];
            
         $row=mysql_query("SELECT * FROM book_entry WHERE book_id='$book_id'");   
         $st_row=mysql_fetch_array($row);
            
    ?>
    
<div class="panel panel-primary" style="margin:20px;">
	<div class="panel-heading">
        	<h3 class="panel-title">Book Entry</h3>
	</div>
<div class="panel-body">
<form role="form"  method="POST" action="book_list.php?epr=saveup"<? $_SESSION['register_success'] = "Update successfull"; ?>>
<div class="col-md-12 col-sm-12">
	<div class="form-group col-md-6 col-sm-6">
            <label for="name">book_id*</label>
            <input type="text" name="book_id" value="<?php echo $st_row['book_id'] ?>" class="form-control input-sm" id="book_id" placeholder="book_id">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="email">book_name*</label>
            <input type="text" name="book_name" value="<?php echo $st_row['book_name'] ?>" class="form-control input-sm" id="book_name" placeholder="book_name">
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="mobile">iso_no*</label>
            <input type="text" name="iso_no" value="<?php echo $st_row['iso_no'] ?>" class="form-control input-sm" id="iso_no" placeholder="iso_no">
        </div>

		<div class="form-group col-md-6 col-sm-6">
            <label for="city">writer_name*</label>
            <input type="text" name="writer_name" value="<?php echo $st_row['writer_name'] ?>" class="form-control input-sm" id="writer_name" placeholder="writer_name">
        </div>
	
		<div class="form-group col-md-6 col-sm-6">
            <label for="state">book_code*</label>
            <input type="text" name="book_code" value="<?php echo $st_row['book_code'] ?>" class="form-control input-sm" id="book_code" placeholder="book_code">
        </div>

		<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">rack_no</label>
            <input type="text" name="rack_no" value="<?php echo $st_row['rack_no'] ?>" class="form-control input-sm" id="rack_no" placeholder="rack_no">
        </div>
		
		<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">rack_no</label>
            <input type="text" name="no_of_copy" value="<?php echo $st_row['no_of_copy'] ?>" class="form-control input-sm" id="rack_no" placeholder="rack_no">
        </div>
        
		<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">return_date</label>
            <input type="text" name="return_date" value="<?php echo $st_row['return_date'] ?>" class="form-control input-sm" id="return_date" placeholder="Required Date">
        
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
			<input type="submit" value="Update" name="btnsave" class="btn btn-primary"/>
	</div>
</div>
</form>
</div>
    </div>

<?php 
    }
?>
<!-- update section end -->

  <!-- //manual search	START
  	<form action="book_list.php" method="post">
  		<input name="search" type="search" autofocus><input type="submit" name="button">
	</form> 
	//manual search END-->
	
<!-- Database list view start--> 
<table id="example" class="display" cellspacing="0" width="100px"  style="height: 500px; overflow:scroll;">
        <thead>
        <!-- multi-column-search in DataTable --> 
            <tr style="font-size: 12px;">
                <th><input type='text' placeholder="ID" value='' class='filter' data-column-index='0'></th>
                <th><input type='text' placeholder="Book Name" value='' class='filter' data-column-index='1'></th>
                <th><input type='text' placeholder="ISO No" value='' class='filter' data-column-index='2'></th>
                <th><input type='text' placeholder="Writer Name" value='' class='filter' data-column-index='3'></th>
                <th><input type='text' placeholder="Book Code" value='' class='filter' data-column-index='4'></th>
                <th><input type='text' placeholder="Rack No" value='' class='filter' data-column-index='5'></th>
				
				<th></th>
            </tr>
            <tr>
        <!-- multi-column-search in DataTable end--> 
                <th>Book ID</th>
                <th>Book Name</th>
                <th>ISO No</th>
                <th>Writer Name</th>
                <th>Book Code</th>
				<th>Rack no</th>
				<th>Book Copys</th>
				<th>return_date</th>
				<th>Due</th>
                <th>Action List</th>
            </tr>
        </thead>
    <tbody> 
        
        <?php 
       // require "dbconnect.php";
		
		
		    $server = "localhost";
			$db_user = "root";
			$db_pass = "";
			$db_name = "library";
		
			$db = mysql_connect($server,$db_user,$db_pass) && mysql_select_db($db_name);
		

            $query0="SELECT * FROM `book_entry`";
			$result1=mysql_query($query0);
			 //}//manual search
            while($row=mysql_fetch_array($result1))
            {

			
                
                echo "<tr>
                        <td>$row[book_id]</td>
                        <td>$row[book_name]</td>
                        <td>$row[iso_no]</td>
                        <td>$row[writer_name]</td>
                        <td>$row[book_code]</td>
						<td>$row[rack_no]</td>
						<td>$row[no_of_copy]</td>
			
			
						<td>"
                            .$row['return_date'].'<br>';
    						$a=$row['return_date'];
    						$b=date('Y-m-d');
    						$diff =strtotime($b)- strtotime($a) ; //abs(strtotime($b)- strtotime($a));
    
                            if($diff>0){
                                $cal_d = floor($diff / (60*60*24));
                            }
                            echo //"</td> below line"
                        "</td>
                        <td>";
            
                            if($diff>0){
                                $cal_d = floor($diff / (60*60*24));
                                echo "Due ".$cal_d."*10 = ".$cal_d*10;
            
                            } else {
                               echo "Due= ".'0';
                            }
                            //echo  "Due ".$cal_d."*10 = ".$cal_d*10;
                        "</td>";
						//$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						//$day = floor($diff - (60*60*24));
						//echo $day;
						//$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
						 
						//printf("%d years, %d months, %d days\n", $years, $months, $days);
						//$total = $years + $months + $days;
						//echo "Total Days ". $total."*10 = ";
						//echo $total*10;
												
						//echo $cal_d;
						
						 // or your date as well
						//$aa = $row[ strtotime("return_date")];
						//$bb = date('Y-m-d');
						//$datediff = abs(strtotime($a) - strtotime($b));						
						//echo floor($datediff / (60 * 60 * 24));




									
                       echo "<td align='center'>";
						if($access==1)
                            {
								echo "<a href='book_list.php?epr=delete&book_id=".$row['book_id']."'>Delete</a> |
                            		  <a href='book_list.php?epr=update&book_id=".$row['book_id']."'>Update</a>";

							};

                                 
                       echo "</td>
			                   
                     </tr>";        
            }
			

        ?>
    </tbody>
        <tfoot>
            <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>ISO No</th>
                <th>Writer Name</th>
                <th>Book Code</th>
				<th>Rack no</th>
				<th>Book Copys</th>
				<th>return_date</th>
				<th>Due</th>
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

<? 



$now = time(); // or your date as well
$your_date = strtotime("2017-03-07");
$datediff = $now - $your_date;

echo floor($datediff / (60 * 60 * 24));

?>
<!--Session end 2-->

