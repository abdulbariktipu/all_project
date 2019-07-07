<?php

	$username = "root";
	$password = "";
	$hostname = "localhost";	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");	
	$selected = mysql_select_db("classicmodels", $dbhandle);

	$customer_name = $_POST['customer_name'];
	//echo "SELECT customerNumber, customerName from customers where customerNumber=$customer_name";
	$company_sql = mysql_query("SELECT customerName, addressLine1, city, country from customers where customerNumber=$customer_name");
	$result = mysql_fetch_array($company_sql);
	$company_name = $result['customerName'];
	$company_address = $result['addressLine1'];
	$company_city = $result['city'];
	$company_country = $result['country'];

	if(isset($_POST['customer_name']))
	{
		$customer_name = $_POST['customer_name'];
		$order_no = $_POST['order_no'];
		$cbo_status = $_POST['cbo_status'];
		$shipped_date = $_POST['txt_shipped_date'];

		if ($customer_name=="")  $customer_name_cond="";  else  $customer_name_cond="customerNumber=$customer_name "; 
		if ($order_no=="")  $order_no_cond="";  else  $order_no_cond=" and orderNumber='$order_no' "; 
		if ($cbo_status=="")  $status_cond="";  else  $status_cond=" and status='$cbo_status'"; 
	
		$date_format = date('Y-m-d', strtotime($shipped_date));
		if ($date_format=='1970-01-01') {
			$date_format='';
			//return;
		}
		if ($date_format=="")  $shipped_date_cond="";  else $shipped_date_cond=" and shippedDate='$date_format'";  

		// Date Between Condition 
		/*$from_date_format = date('Y-m-d', strtotime($shipped_date));
		if ($from_date_format=='1970-01-01') {
			$from_date_format='';
		}
		$to_date_format = date('Y-m-d', strtotime($shipped_date));
		if ($to_date_format=='1970-01-01') {
			$to_date_format='';
		}
		if ($from_date_format=="" && $to_date_format=="")  $date_between_cond="";  else echo $date_between_cond=" and shippedDate BETWEEN '$from_date_format' and '$from_date_format'";*/

		$query = mysql_query("SELECT customerNumber,orderNumber,orderDate,shippedDate,status 
			FROM orders 
			WHERE $customer_name_cond $order_no_cond $status_cond $shipped_date_cond");
		if($row = mysql_num_rows($query) > 0 ) 
		{ 
			?>
			<!DOCTYPE html>
		 	<html>
		 	<head>
		 		<title></title>
		 		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
				<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
				<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
				<style type="text/css">
					h2, h3, h4{
						color: black;
					}
				</style>
		 	</head>
		 	<body>
		 	<div class="container">
			    <div class="row">
			        <div class="col-xs-10">
			            <div class="panel panel-primary">
			                <!-- Default panel contents -->
			                <div class="panel-heading">
			                    <h2 class="panel-title">
			                        Accounts and transactions report
			                    </h2>
			                </div>
			                <div class="panel-body">
			                    <h3 style="text-align: center;">
			                        Customer Name: <?php echo $company_name.'<br>'; ?>
            						Address: <?php echo $company_address.', '.$company_city.', '.$company_country.'.'; ?>
			                    </h3>
			                </div>
			                    <ul class="list-group">
			                    
			                    <li class="list-group-item">
			                    <table class="table table-hover">
			                        <thead>
			                            <tr style="background-color: #428bca">
			                            	<th>SL</th>
			                                <th>Customer Name</th>
			                                <th>Order No</th>
			                                <th>Order Date</th>
			                                <th>Shipment Date</th>
			                                <th>Shipment Status</th>
			                            </tr>
			                        </thead>
							<?php
							$i=1;
							while($row = mysql_fetch_array($query)) 
							{
								?>	
				                    <tbody>
				                        <tr>
				                            <td><?php echo $i; ?></td>
				                            <td><?php echo $company_name; ?></td>
				                            <td><?php echo $row['orderNumber']; ?></td>
						 					<td>
						 						<?php 
						 							$orderDate = $row['orderDate']; 
						 							echo $orderDate_format = date('d-m-Y', strtotime($orderDate));
						 						?>
						 					</td>
						 					<td>
						 						<?php 
						 							$shippedDate = $row['shippedDate']; 
						 							echo $shippedDate_format = date('d-m-Y', strtotime($shippedDate));
						 						?>
						 					</td>
						 					<td><?php echo $row['status']; ?></td>
				                        </tr>
				                    </tbody>
							 	<?php
							 	$i++;
							}
							?>

		                </table>
		                </li>
		            </ul>
		        </div>
		    </div>
			</div>
			</div>
			</body>
			</html>
		 <?php
		}
		else
		{
			?>
			


		    <!DOCTYPE html>
		 	<html>
		 	<head>
		 		<title></title>
		 		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
				<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
				<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
				<style type="text/css">
					h2, h3, h4{
						color: black;
					}
				</style>
		 	</head>
		 	<body>
			 	<div class="container">
				    <div class="row">
				        <div class="col-xs-10">
				            <div class="panel panel-primary">
				                <!-- Default panel contents -->
				                <div class="panel-heading">
				                    <h2 class="panel-title">
				                        Accounts and transactions report
				                    </h2>
				                </div>
				                <div class="panel-body">
				                    <h3 style="text-align: center;">
				                        Customer Name: <?php echo $company_name.'<br>'; ?>
	            						Address: <?php echo $company_address.', '.$company_city.', '.$company_country.'.'; ?>
				                    </h3>
				                    <hr>
				                </div>
				                <div class="row text-center pb-4">	                	
							        <div class="col-md-12">
							            <h2><?php echo 'Data Not found'; ?></h2>
							        </div>
							    </div>				                    
			        		</div>
			    		</div>
					</div>
				</div>
			</body>
			</html>
			<?php
		}
	}

?>
