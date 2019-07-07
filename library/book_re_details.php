

        <?php
            include "dbconnect.php";

            $result = mysql_query('SELECT SUM(due) AS value_sum FROM book_return'); 
            $row = mysql_fetch_assoc($result); 
            $sum = $row['value_sum'];                            
                              
        ?>
        
        
        
<?php

include "dbconnect.php";
?>
    <!--Session start 1-->
    <?php
    //error_reporting(0);
	   session_start();
       if(!isset($_SESSION['username'])){
        echo "Please login again";
        header("location:login.php");
       } else{
	   		$access = $_SESSION['access'];//access control
 
    ?>
    <!--Session end 1-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>All Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
            	.row{
		    margin-top:40px;
		    padding: 0 10px;
		}
		.clickable{
		    cursor: pointer;   
		}

		.panel-heading div {
			margin-top: -18px;
			font-size: 15px;
		}
		.panel-heading div span{
			margin-left:5px;
		}
		.panel-body{
			display: none;
		}
        .navbar-default .navbar-nav > .active > a{
            color: #555;
            background-color: #0aa2db;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
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
            <?php } ?>
                                    
            <li><a href="all_student.php">User List</a></li>
            
           <?php if($access==1){?>                     
            <li><a href="book_entry.php">Book Add</a></li>
            <?php } ?>
           
            <li><a href="all_book.php">Book List</a></li>
            
            <?php if($access==1){?>
            <li><a href="book_borrow.php">Borrow Book</a></li>
             <?php } ?>
            
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
             <?php } ?>
            
            <?php if($access==1){?>
            <li><a href="#">Seetings</a></li>
             <?php } ?>
            
            <?php if($access==1){?>
            <li class="active"><a href="book_re_details.php">Book Return Details</a></li>
             <?php } ?>            
            
            <li><a href="book_return.php">Book Return</a></li>
             <?php } ?>            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
</div><!-- /.container-fluid -->
<!-- nave end -->
  
  
<div class="container">    
    	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Return Table</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Search" data-container="body">
								<i class="glyphicon glyphicon-search"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
					</div>
					<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="dev-table">
						<thead>
						<tr>
							<th>Return ID</th>
							<th>Student ID</th>
							<th>Student Name</th>
							<th>Book ID</th>
							<th>Book Name</th>
							<th>Borrow Date</th>
                            <th>Return Date</th>
                            <th>Late Days</th>
                            <th>Due</th>
						</tr>
					</thead>					

					<tbody>
                        <?php
                        include "dbconnect.php";
                        
                             
                         //paging1
                         $per_page = 5;
                         $pages_queqry = mysql_query("SELECT COUNT('sid') FROM book_return");
                         $pages = ceil(mysql_result($pages_queqry, 0) / $per_page);
                                    
                         $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                         $start = ($page -1) * $per_page;     
                         //paging1 end
                            
                            $query=mysql_query("SELECT * FROM `book_return` ORDER by return_id DESC limit $start,$per_page");
                            
                            //$result=mysql_query($query);
                      
                            while($row=mysql_fetch_assoc($query))
                            
                            { 
                                
                                //$roww=$row['sid'];
                                
                                
                             ?>   
                                                       
                                 <tr>
                                    <td><?php echo $row['return_id']; ?></td>
                                    <td><?php echo $row['sid']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['book_id']; ?></td>
                                    <td><?php echo $row['book_name']; ?></td>
                                    <td><?php echo $row['borrow_date']; ?></td>
                                    <td><?php echo $row['return_date']; ?></td>   
                                    <td><?php echo $row['late_days']; ?></td>
                                    <td><?php echo $row['due']; ?></td>                                                                   
                                 </tr>                                   
                            <?php      
                            }
                            
                        ?>  
                        
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td style="float: right;"><?php echo "<strong>Total: ". $sum."</strong>"; ?></td>
                          </tr>
                                                 
					</tbody>
					</table>
				</div>
			</div>
			
		</div>
        
        <center>
            <?php
                //pagging2
                $prev = $page - 1;
                $next = $page + 1;
                
                if(!($page <= 1)){
                    echo "<a class='btn btn-primary padd' href='book_re_details.php?page=$prev'> Prev </a>";
                }
                
                
                if($pages >= 1){
                    for($x=1;$x<=$pages;$x++)
                    {
                        echo ($x == $page) ? '<b><a class="btn btn-primary" href="?page=' .$x. '">' .$x. '</a></b> ' : '<a class="btn btn-primary" href="?page=' .$x. '">' .$x. '</a> ';
                    }
                }
                
                
                if(!($page>=$pages)){
                        echo "<a class='btn btn-primary' href='book_re_details.php?page=$next'> Next </a>";
                        
                    }
            ?>
            </center>
<!---------Update Section End------------------>


<script src="js/jquery-1.11.1.min.js"></script>
<script>//remove data jquery
    $(".remove").on("click",function(e){
       e.preventDefault();
       
       var choice = confirm($(this).attr('data-confirm'));
       //alert("Ok");
       
       if(choice){
        window.location.href=$(this).attr('href');
       } 
    });
</script>


    
<script type="text/javascript">
/**
*   I don't recommend using this plugin on large tables, I just wrote it to make the demo useable. It will work fine for smaller tables 
*   but will likely encounter performance issues on larger tables.
*
*		<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
*		$(input-element).filterTable()
*		
*	The important attributes are 'data-action="filter"' and 'data-filters="#table-selector"'
*/
(function(){
    'use strict';
	var $ = jQuery;
	$.fn.extend({
		filterTable: function(){
			return this.each(function(){
				$(this).on('keyup', function(e){
					$('.filterTable_no_results').remove();
					var $this = $(this), 
                        search = $this.val().toLowerCase(), 
                        target = $this.attr('data-filters'), 
                        $target = $(target), 
                        $rows = $target.find('tbody tr');
                        
					if(search == '') {
						$rows.show(); 
					} else {
						$rows.each(function(){
							var $this = $(this);
							$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
						})
						if($target.find('tbody tr:visible').size() === 0) {
							var col_count = $target.find('tr').first().find('td').size();
							var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
							$target.find('tbody').append(no_results);
						}
					}
				});
			});
		}
	});
	$('[data-action="filter"]').filterTable();
})(jQuery);

$(function(){
    // attach table filter plugin to inputs
	$('[data-action="filter"]').filterTable();
	
	$('.container').on('click', '.panel-heading span.filter', function(e){
		var $this = $(this), 
			$panel = $this.parents('.panel');
		
		$panel.find('.panel-body').slideToggle();
		if($this.css('display') != 'none') {
			$panel.find('.panel-body input').focus();
		}
	});
	$('[data-toggle="tooltip"]').tooltip();
})
</script>
</body>
</html>

<!--Session start 2-->
<?php
	
    }
 //}
?>
<!--Session end 2-->

        