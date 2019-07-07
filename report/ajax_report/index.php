<?php
	$username = "root";
	$password = "";
	$hostname = "localhost";	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");	
	$selected = mysql_select_db("classicmodels", $dbhandle);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Newsfeed Example</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="jquery-1.11.2.min.js"></script>
	<script src="post_status.js"></script>
	<style type="text/css">
		body{
			background-color:#DC3545;
			color: black;
		}
		tr td{
			color: black;
		}
		th{
			color: black;
		}
		h4 {
			color: black;
		}
		div,tr,th #hedar {
		    color: black !important;
		    font-size: 15px;
		}
		/*.pb-4, .py-4 {
		    padding-bottom: 0px !important;
		}
		.pt-5, .py-5 {
		    padding-top: 0px !important;
		}*/
		#msg {
			display: none; 
			background: #73AD21; 
			border-radius: 25px;
			text-shadow: 0 0 3px #FF0000;
		}
	</style>
</head>
<body style="background-color: #DC3545">
<!-- First search pannel -->
<section class="search-banner bg-danger text-white py-5" id="search-banner">
    <div class="container py-5 my-5">
    	<div class="row text-center pb-4" style="height: 50px;">
    		<div class="col-md-4">
            	<p></p>
	        </div>
	        <div class="col-md-4">
	            <p id="msg">Customer Name is Requred</p>
	        </div>
	        <div class="col-md-4">
	            <p></p>
	        </div>
    	</div>
    <div class="row text-center pb-4">
        <div class="col-md-12">
            <h2>Shipment Report</h2>
        </div>
    </div>   
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
	                <div class="row">
		                <div class="col-md-2">
		                	<div class="form-group ">
		                		<tr>
		                			<th style="color: black">Customer Name</th>
		                		</tr>
		                	</div>
		                    <div class="form-group ">
			                    <?php
								$query = mysql_query("SELECT customerNumber, customerName FROM customers");
								?>
								<select id="customer_name" class="form-control" id="customer_name" style="height: 35px">
									<option value="" selected>... Select Customer...</option>
								<?php
								while($row = mysql_fetch_array($query)) 
								{		
									?><option value="<?php echo $row['customerNumber']; ?>"><?php echo $row['customerName']; ?></option><?php		
								}
								?>
								</select>
								<?php
								?>                          
		                    </div>
		                </div>
		                <div class="col-md-2">
		                	<div class="form-group ">
		                		<tr>
		                			<th style="color: black">Order No</th>
		                		</tr>
		                	</div>
		                    <div class="form-group ">
		                          <input class="form-control" id="order_no" style="height: 35px" type="text"  placeholder="Order No">
		                    </div>
		                </div>
		                <div class="col-md-2">
		                	<div class="form-group ">
		                		<tr>
		                			<th style="color: black">Others</th>
		                		</tr>
		                	</div>
		                    <div class="form-group ">	
								<input class="form-control" id="status_box" type="text"  style="height: 35px" placeholder="Write">
		                    </div>
		                </div>
		                <div class="col-md-2">
		                	<div class="form-group ">
		                		<tr>
		                			<th style="color: black">Shipment Status</th>
		                		</tr>
		                	</div>
		                    <div class="form-group ">
			                    <?php
								//echo "SELECT `status` FROM orders GROUP BY `status`";
								$query = mysql_query("SELECT `status` FROM orders GROUP BY `status`");
								?>
								<select id="cbo_status" class="form-control" style="height: 35px">
									<option value="" selected>... Select Status...</option>
								<?php
								while($row = mysql_fetch_array($query)) 
								{		
									?><option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option><?php		
								}
								?>
								</select>
								<?php
								?>                          
		                    </div>
		                </div>
		                <div class="col-md-2">
		                	<div class="form-group ">
		                		<tr>
		                			<th style="color: black">Shipment Date</th>
		                		</tr>
		                	</div>
		                    <div class="form-group ">	
								<input class="form-control" type="text" name="txt_shipped_date" id="txt_shipped_date" style="height: 35px" placeholder="Shipped Date" value="<?php echo date("d-m-Y"); ?>">
		                    </div>
		                </div>
		                <div class="col-md-2">
		                	<div class="form-group ">
		                		<button id="reset_btn" type="reset" class="btn btn-dark">Reset</button>
		                	</div>
		                	<button id="status_btn" type="button" class="btn btn-dark">Show</button>
		                </div>
            		</div>
                </div>
            </div>            
        </div>
    </div>
	</div>
	<div id="status_error"></div>
</section>
</body>
</html>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $( function() {
    $( "#txt_shipped_date" ).datepicker({ 
        maxDate: "0D",//minDate: -5, maxDate: "+10D","+1M +10D +1Y"
        "dateFormat":"dd-mm-yy",
        changeMonth: true,
        changeYear: true
    });
  } );
</script>