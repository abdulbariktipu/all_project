<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	error_reporting (0);
	require_once('../includes/db_mysql_function.php');
	$action=$_REQUEST['action'];
	$data=$_REQUEST['search'];
	// print_r($_REQUEST);die;

	if ($action=='customer_wise_report') // customer_wise_report
	{
		extract($_REQUEST);

		$sql="SELECT a.customerName, b.orderNumber, sum(c.quantityOrdered) as qty, sum(c.priceEach) as value, c.productCode
		FROM customers a, orders b, orderdetails c 
		WHERE a.customerNumber=b.customerNumber and b.orderNumber=c.orderNumber AND b.shippedDate BETWEEN '$from_date' AND '$to_date'
		GROUP by a.customerName, b.orderNumber, c.productCode";
		// and b.customerNumber='$data' 
		$sql_result=sql_select($sql);
		$customer_rowspan=$qty_arr=$value_arr=array();
		foreach ($sql_result as $customerName_key => $row) 
		{
			$customer_rowspan[$row['customerName']]++; 
			$qty_arr[$row['customerName']]+=$row['qty'];
			$value_arr[$row['customerName']]+=$row['value'];
		}
		?>
		<div id="report_container" align="center" style="width:1040px">
			<fieldset style="width:1040px;">
				<h2>Customer Wise Report</h2>
			    <table class="rpt_table" border="1" rules="all" width="1040" cellpadding="0" cellspacing="0">
			        <thead>
			            <th width="40">SL</th> 
			            <th width="200"> Customer Name</th>
			            <th width="100">Product Code</th>
			            <th width="130">Order No</th>
			            <th width="130">Order Qty.</th>
			            <th width="140">Order Value ($)</th>
			            <th width="130">Customer Wise Total Order Qty</th>
			            <th>Customer Wise Total Order Value</th>
			        </thead>
			    </table>
			    <table class="rpt_table" border="1" rules="all" width="1040" cellpadding="0" cellspacing="0" id="table_body">
		            <tbody>
		            	<?php
		            	$i=1;
		            	$grand_total_order_qty=$grand_total_order_value=$grand_customer_total_order_qty=$grand_customer_total_order_value=0;
	                	foreach ($sql_result as $customerName_key => $row) 
	                	{	                		
							if ($i%2==0) $bgcolor="#E9F3FF"; else $bgcolor="#FFFFFF"; 
							?>
		                    <tr bgcolor="<?php echo $bgcolor; ?>">
		                        <td width="40"><?php echo $i; ?></td>
		                        <td width="200"><?php echo $row['customerName']; ?></td>
		                        <td width="100"><?php echo $row['productCode']; ?></td>
		                        <td width="130"><?php echo $row['orderNumber']; ?></td>
		                        <td width="130"><?php echo $row['qty']; ?></td>
		                        <td width="140"><?php echo $row['value']; ?></td>
		                        <?php
		                        	if (!in_array($row['customerName'], $chk)) 
		                        	{
		                        		$rowspan=$customer_rowspan[$row['customerName']];
		                        		$order_qty=$qty_arr[$row['customerName']];
		                        		$order_value=$value_arr[$row['customerName']];
		                        	?>
		                        	<td width="130" rowspan="<?php echo $rowspan; ?>"><?php echo $order_qty; $grand_customer_total_order_qty+=$order_qty;?></td>
		                        	<td  rowspan="<?php echo $rowspan; ?>"><?php echo $order_value; $grand_customer_total_order_value+=$order_value; ?></td>
		                        	<?php
		                        	}
		                        	$chk[]=$row['customerName'];
		                        ?>
		                    </tr>
		                    <?php
		                    $i++; 
		                    $grand_total_order_qty+=$row['qty'];
		                    $grand_total_order_value+=$row['value'];
	                	}

		                    ?>
		            </tbody>
	        	</table>

	        	<table class="rpt_table" border="1" rules="all" width="1040" cellpadding="0" cellspacing="0" id="report_table_footer">
		        	<tfoot>
		                <tr>
		                    <td width="40"></td>
		                    <td width="200"></td>
		                    <td width="100"></td>
		                    <td width="130" align="right"><strong>Grand Total:</strong></td>
		                    <td width="130"><strong><?php echo $grand_total_order_qty;?></strong></td>
		                    <td width="140"><strong><?php echo $grand_total_order_value; ?></strong></td>
		                    <td width="130"><strong><?php echo $grand_customer_total_order_qty; ?></strong></td>
		                    <td><strong><?php echo $grand_customer_total_order_value; ?></strong></td>
		                </tr>
		            </tfoot>
	        	</table>
			</fieldset>
		</div>
		<?php
	}

	if ($action=='customer_order_wise_report') // customer_order_productCode_wise_report
	{
		extract($_REQUEST);

		$sql="SELECT a.customerName, b.orderNumber, b.shippedDate, b.status, sum(c.quantityOrdered) as qty, sum(c.priceEach) as value, c.productCode
		FROM customers a, orders b, orderdetails c 
		WHERE a.customerNumber=b.customerNumber and b.orderNumber=c.orderNumber AND b.shippedDate BETWEEN '$from_date' AND '$to_date'
		GROUP by a.customerName, b.orderNumber, c.productCode";
		$sql_result=sql_select($sql);

		$data_arr=$rowspan=array();
		foreach ($sql_result as $key => $row) 
		{
		  $data_arr[$row['customerName']][$row['orderNumber']][$row['productCode']]['qty']=$row['qty'];
		  $data_arr[$row['customerName']][$row['orderNumber']][$row['productCode']]['value']=$row['value'];
		  $data_arr[$row['customerName']][$row['orderNumber']][$row['productCode']]['shippedDate']=$row['shippedDate'];
		  $data_arr[$row['customerName']][$row['orderNumber']][$row['productCode']]['status']=$row['status'];
		  $data_arr[$row['customerName']][$row['orderNumber']][$row['productCode']]['productCode']=$row['productCode'];

		  $rowspan[$row['orderNumber']]++;
		}
		/*echo "<pre>";
		print_r($rowspan);die;*/

		$customer_rowspan=$qty_arr=$value_arr=array();
		?>
		<div id="report_container" align="center" style="width:1040px">
			<fieldset style="width:1040px;">
				<h2>Customer Order Wise Report</h2>
			    <table class="rpt_table" border="1" rules="all" width="1040" cellpadding="0" cellspacing="0">
			        <thead>
			            <th width="40">SL</th> 
			            <th width="200"> Customer Name</th>
			            <th width="100">Product Code</th>
			            <th width="130">Order No</th>
			            <th width="130">Order Qty.</th>
			            <th width="140">Order Value ($)</th>
			            <th width="130">Shipment Date</th>
			            <th>Status</th>
			        </thead>
			    </table>
			    <table class="rpt_table" border="1" rules="all" width="1040" cellpadding="0" cellspacing="0" id="table_body">
		            <tbody>
		            	<?php
		            	$i=1;
		            	//$chk=array();
		            	$grand_total_order_qty=$grand_total_order_value=0;
	                	foreach ($data_arr as $customerName_key => $customerName_val) 
						{
							$customer_wise_total_order_qty=$customer_wise_total_order_value=0;
							foreach ($customerName_val as $orderNumber_key => $orderNumber_val) 
							{
								$order_wise_total_order_qty=$order_wise_total_order_value=0;
								foreach ($orderNumber_val as $productCode_key => $row) 
								{
									if ($i%2==0) $bgcolor="#E9F3FF"; else $bgcolor="#FFFFFF"; 
									?>
				                    <tr bgcolor="<?php echo $bgcolor; ?>">
				                        <td width="40"><?php echo $i; ?></td>
				                        <td width="200"><?php echo $customerName_key; ?></td>
				                        <td width="100"><?php echo $row['productCode']; ?></td>
				                        <td width="130"><?php echo $orderNumber_key; ?></td>
				                        <td width="130"><?php echo $row['qty']; ?></td>
				                        <td width="140"><?php echo $row['value']; ?></td>
				                        <?php 
				                        if (!in_array($orderNumber_key, $chk)) 
				                        {
					                        ?>				                        
					                        <td width="130" title="<?php echo $rowspan[$orderNumber_key]; ?>" rowspan="<?php echo $rowspan[$orderNumber_key]; ?>">
					                        	<?php echo $row['shippedDate']; ?></td>
					                        <td rowspan="<?php echo $rowspan[$orderNumber_key]; ?>">
					                        	<?php echo $row['status']; ?></td>
					                        <?php
				                        }
				                        $chk[]=$orderNumber_key;
				                        ?> 
				                    </tr>
				                    <?php
				                    $i++; 
				                    $order_wise_total_order_qty+=$row['qty'];
				                    $order_wise_total_order_value+=$row['value'];

				                    $grand_total_order_qty+=$row['qty'];
				                    $grand_total_order_value+=$row['value'];	                
								}
								?>
								<tr>
									<td colspan="4" align="right"><strong>Order Wise Total:</strong></td>
									<td><strong><?php echo $order_wise_total_order_qty;?></strong></td>
									<td><strong><?php echo $order_wise_total_order_value;?></strong></td>
									<td></td>
									<td></td> 
								</tr>
							<?php
							$customer_wise_total_order_qty+=$order_wise_total_order_qty;
							$customer_wise_total_order_value+=$order_wise_total_order_value;
							}
							?>
							<tr>
								<td colspan="4" align="right"><strong>Customer Wise Total:</strong></td>
								<td><strong><?php echo $customer_wise_total_order_qty;?></strong></td>
								<td><strong><?php echo $customer_wise_total_order_value;?></strong></td>
								<td></td>
								<td></td> 
							</tr>
							<?php
	                	}
		                ?>
		            </tbody>
	        	</table>

	        	<table class="rpt_table" border="1" rules="all" width="1040" cellpadding="0" cellspacing="0" id="report_table_footer">
		        	<tfoot>
		                <tr>
		                    <td width="40"></td>
		                    <td width="200"></td>
		                    <td width="100"></td>
		                    <td width="130" align="right"><strong>Grand Total:</strong></td>
		                    <td width="130"><strong><?php echo $grand_total_order_qty;?></strong></td>
		                    <td width="140"><strong><?php echo $grand_total_order_value; ?></strong></td>
		                    <td width="130"></td>
		                    <td></td>
		                </tr>
		            </tfoot>
	        	</table>
			</fieldset>
		</div>
		<?php
	}

	if ($action=='month_wise_report') // month_wise_report
	{
		extract($_REQUEST);

		$sql="SELECT a.customerName, b.orderNumber,  DATE_FORMAT(b.shippedDate, '%M-%y') as yearMonth, b.status, sum(c.quantityOrdered) as qty, sum(c.priceEach) as value, c.productCode
		FROM customers a, orders b, orderdetails c 
		WHERE a.customerNumber=b.customerNumber and b.orderNumber=c.orderNumber AND b.shippedDate BETWEEN '$from_date' AND '$to_date'
		GROUP by a.customerName, b.orderNumber, c.productCode 
		order by b.shippedDate, a.customerName"; //   and b.customerNumber in(103)
		$sql_result=sql_select($sql);

		$data_arr=$yearMonth_arr=$monthYarQty=array();
		foreach ($sql_result as $key => $row) 
		{
		  $data_arr[$row['customerName']][$row['orderNumber']][$row['productCode']]['status']=$row['status'];

		  $monthYarQty[$row['customerName']][$row['orderNumber']][$row['productCode']][$row['yearMonth']]['qty']=$row['qty'];
		  $monthYarQty[$row['customerName']][$row['orderNumber']][$row['productCode']][$row['yearMonth']]['value']=$row['value']; 

		  $yearMonth_arr[$row['yearMonth']]=$row['yearMonth'];
		}
		$total_yearMonth=count($yearMonth_arr);
		$table_width=1040+($total_yearMonth*230); 
		//$div_width=($total_yearMonth*100); 
		/*echo "<pre>";
		print_r($monthYarQty);die;*/
 
		$customer_rowspan=$qty_arr=$value_arr=array();
		?>
		<div id="report_container" align="center" style="width:1040px">
			<fieldset style="width:1040px;">
				<h2>Month Wise Report</h2>
			    <table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0">
			        <tr>
			            <th width="40" rowspan="2">SL</th> 
			            <th width="200" rowspan="2"> Customer Name</th>
			            <th width="100" rowspan="2">Product Code</th>
			            <th width="130" rowspan="2">Order No</th>
			            <?php 
			            foreach ($yearMonth_arr as $key => $value) 
			            {
			            ?>
			            <th width="200" colspan="2"><?php echo $value; ?></th>
			            <?php 
			            }
			            ?>
			            <th width="100" rowspan="2">Total Order Qty</th>
			            <th width="100" rowspan="2">Total Order Value</th>
			        </tr>
			        <tr>
			        	<?php 
			            foreach ($yearMonth_arr as $key => $value) 
			            {
			            ?>
			            <th width="100">Order Qty.</th>
			            <th width="100">Order Value</th>
			            <?php 
			            }
			            ?>
			        </tr>
			    </table>
			    <table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0" id="table_body">
		            <tbody>
		            	<?php
		            	$i=1;
		            	$grand_total_order_qty=$grand_total_order_value=0;
	                	foreach ($data_arr as $customerName_key => $customerName_val) 
						{
							foreach ($customerName_val as $orderNumber_key => $orderNumber_val) 
							{
								foreach ($orderNumber_val as $productCode_key => $row) 
								{
									if ($i%2==0) $bgcolor="#E9F3FF"; else $bgcolor="#FFFFFF"; 
									?>
				                    <tr bgcolor="<?php echo $bgcolor; ?>">
				                        <td width="40"><?php echo $i; ?></td>
				                        <td width="200"><?php echo $customerName_key; ?></td>
				                        <td width="100"><?php echo $productCode_key; ?></td>
				                        <td width="130"><?php echo $orderNumber_key; ?></td>
				                        <?php 
				                        $total_qty=$total_value=0;
							            foreach ($yearMonth_arr as $yearMonth_key => $value) 
							            {
							            	$montylyQty=$monthYarQty[$customerName_key][$orderNumber_key][$productCode_key][$yearMonth_key]['qty'];
							            	$montylyvalue=$monthYarQty[$customerName_key][$orderNumber_key][$productCode_key][$yearMonth_key]['value'];

							            	$grand_total_monthly_qty[$yearMonth_key]+=$montylyQty;             	
			                    			$grand_total_monthly_value[$yearMonth_key]+=$montylyvalue;
								            ?>
					                        <td width="100"><?php echo $montylyQty; $total_qty+=$montylyQty; ?></td>
					                        <td width="100"><?php echo $montylyvalue; $total_value+=$montylyvalue; ?></td>
					                        <?php 
							            }
							            ?>
				                        <td width="100"><?php echo $total_qty; ?></td>
				                        <td width="100"><?php echo $total_value; ?></td>
				                    </tr>
				                    <?php
				                    $i++;
				                    $grand_total_order_qty+=$total_qty;
				                    $grand_total_order_value+=$total_value; 						                
								}
							}
	                	}
		                ?>
		            </tbody>
	        	</table>

	        	<table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0" id="report_table_footer">
		        	<tfoot>
		                <tr>
		                    <td width="40"></td>
		                    <td width="200"></td>
		                    <td width="100"></td>
		                    <td width="130" align="right"><strong>Grand Total:</strong></td>
		                    <?php 
				            foreach ($yearMonth_arr as $yearMonth_key => $value) 
				            {
				            ?>
		                    <td width="100"><strong><?php echo $grand_total_monthly_qty[$yearMonth_key]; ?></strong></td>
		                    <td width="100"><strong><?php echo $grand_total_monthly_value[$yearMonth_key]; ?></strong></td>
		                    <?php 
				            }
				            ?>
		                    <td width="100"><strong><?php echo $grand_total_order_qty; ?></strong></td>
		                    <td width="100"><strong><?php echo $grand_total_order_value; ?></strong></td>
		                </tr>
		            </tfoot>
	        	</table>
			</fieldset>
		</div>
		<?php
	}

	if ($action=='month_wise_report2') // month_wise_report2
	{
		extract($_REQUEST);

		$sql="SELECT a.customerNumber, a.customerName, b.orderNumber,  DATE_FORMAT(b.shippedDate, '%M-%y') as yearMonth, b.status, sum(c.quantityOrdered) as qty, sum(c.priceEach) as value, c.productCode, b.shippedDate, b.status
		FROM customers a, orders b, orderdetails c 
		WHERE a.customerNumber=b.customerNumber and b.orderNumber=c.orderNumber AND b.shippedDate BETWEEN '$from_date' AND '$to_date'
		GROUP by a.customerNumber, a.customerName, b.orderNumber, c.productCode, b.status
		order by a.customerName, b.orderNumber, c.productCode"; //   and b.customerNumber in(103)
		$sql_result=sql_select($sql);
		
		$data_arr=$rowspan=array();
		foreach ($sql_result as $key => $row) 
		{
		  $data_arr[$row['customerNumber']][$row['orderNumber']][$row['productCode']]['qty']=$row['qty'];
		  $data_arr[$row['customerNumber']][$row['orderNumber']][$row['productCode']]['value']=$row['value'];
		  $data_arr[$row['customerNumber']][$row['orderNumber']][$row['productCode']]['shippedDate']=$row['shippedDate'];
		  $data_arr[$row['customerNumber']][$row['orderNumber']][$row['productCode']]['status']=$row['status'];
		  $data_arr[$row['customerNumber']][$row['orderNumber']][$row['productCode']]['customerName']=$row['customerName'];
		  $data_arr[$row['customerNumber']][$row['orderNumber']][$row['productCode']]['customerNumber']=$row['customerNumber'];
		  $rowspan[$row['customerNumber']]++;
		}
		/*echo "<pre>";
		print_r($data_arr);die;*/
		$table_width=1040;

		$data = array('1,2,3,4,5,6,7,8','45','','56,31,32,33','','','21,22','11,12,12,13,16');
		//echo "<pre>";
		//print_r($data );
		$max_arr = array();
		$max = 0;
		foreach($data as $value)
		{
		  $value = trim($value);
		  if (!empty($value))
		  {
		      $arr = explode(",",$value);
		      $max_count = count($arr);
		      if($max_count>$max)
		      {
		        $max=$max_count;
		      }
		  }
		}

		//$max;
		$NewArr = explode(",",$max);
		?>
		<style>
			#customers {
			  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			#customers td, #customers th {
			  border: 1px solid red;
			  padding: 8px;
			}

			#customers tr:nth-child(even){background-color: #f2f2f2;}

			#customers tr:hover {background-color: #ddd;}

			#customers th {
			  padding-top: 12px;
			  padding-bottom: 12px;
			  text-align: left;
			  background-color: #4CAF50;
			  color: white;
			}
		</style>
		<table id="customers">
			<tr>
				<th>Color</th>
				<th>Fabric</th>
			<?php
			for($i=0;$i<$max;$i++)
			{
				?>
				<th style="text-align: center;"><?php echo $i; ?></th>
				<?php
			}
			?>
			</tr>

			<?php
			$arrayName = array(1 => "Red", 2 => "Blue");
			foreach ($arrayName as $key => $value) 
			{
				?>
				<tr>
					<td><?php echo $value; ?></td>
					<td>100% Cotton</td>
					<?php
					for($i=0;$i<$max;$i++)
					{
						?>
						<td><?php echo "Process ".$i; ?></td>
						<?php
					}
					?>
				</tr>
				<?php
			}
			?>
		</table>

		<br>

		<div id="report_container" align="center" style="width:1040px">
			<fieldset style="width:1040px;">
				<h2>CustomerName, OrderNumber and ProductCode Wise Report</h2>
			    <table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0">
			        <tr>
			            <th width="40" rowspan="2">SL</th> 
			            <th width="200" rowspan="2"> Customer Name</th>
			            <th width="100" rowspan="2">Order No</th>
			            <th width="100" rowspan="2">Product Code</th>
			            <th width="100" rowspan="2">Total Order Qty</th>
			            <th width="100" rowspan="2">Total Order Value</th>
			            <th width="100">Order Qty.</th>
			            <th width="100">Order Value</th>
			        </tr>
			    </table>
			    <table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0" id="table_body">
		            <tbody>
		            	<?php
		            	$i=1;
		            	$grand_total_order_qty=$grand_total_order_value=0;
	                	foreach ($data_arr as $customerName_key => $customerName_val) 
						{
							foreach ($customerName_val as $orderNumber_key => $orderNumber_val) 
							{
								foreach ($orderNumber_val as $productCode_key => $row) 
								{
									if ($i%2==0) $bgcolor="#E9F3FF"; else $bgcolor="#FFFFFF"; 
									?>
				                    <tr bgcolor="<?php echo $bgcolor; ?>">
				                        <td width="40" align="center"><?php echo $i; ?></td>
				                        <?php
			                        	if (!in_array($row['customerNumber'], $chk)) 
			                        	{
			                        		$rowspan = $rowspan[$row['customerNumber']];
			                        	?>
			                        		<td width="200" title="<?php echo $rowspan; ?>" rowspan="<?php echo $rowspan; ?>"><?php echo $row['customerName']; ?></td>
										<?php
			                        	}
			                        	$chk[]=$row['customerNumber'];
			                        	?>
				                        <td width="100" align="center"><?php echo $orderNumber_key; ?></td>
				                        <td width="100" align="center"><?php echo $productCode_key; ?></td>
				                        <td width="100" align="center"><?php echo $row['qty']; $total_qty+=$row['qty']; ?></td>
				                        <td width="100" align="right"><?php echo $row['value']; $total_value+=$row['value']; ?></td>
				                        <td width="100" align="center"><?php echo $row['shippedDate']; ?></td>
				                        <td width="100" align="center"><?php echo $row['status']; ?></td>
				                    </tr>
				                    <?php
				                    $i++;
				                    $grand_total_order_qty+=$total_qty;
				                    $grand_total_order_value+=$total_value;
								}
							}
	                	}
		                ?>
		            </tbody>
	        	</table>

	        	<table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0" id="report_table_footer">
		        	<tfoot>
		                <tr>
		                    <td width="40"></td>
		                    <td width="200"></td>
		                    <td width="100"></td>
		                    <td width="100" align="right"><strong>Grand Total:</strong></td>
		                    <td width="100" align="center"><strong><?php echo $grand_total_order_qty; ?></strong></td>
		                    <td width="100" align="right"><strong><?php echo $grand_total_order_value; ?></strong></td>
		                    <td width="100"><strong></strong></td>
		                    <td width="100"><strong></strong></td>
		                </tr>
		            </tfoot>
	        	</table>
			</fieldset>
		</div>
		<?php
	}

	if ($action=='month_date_wise_report') // month_date_wise_report
	{
		extract($_REQUEST);

		// Declare two dates 
		/*$start_date = strtotime($from_date); 
		$end_date = strtotime($to_date);
		echo "Difference between two dates: ". floor(($end_date - $start_date)/60/60/24); */


		/*$datetime1 = date_create($from_date);
		$datetime2 = date_create($to_date);
		$interval = date_diff($datetime1, $datetime2);
		$interval->format('%m months').'<br \>';*/


		$startDate = new DateTime($from_date);
		$endDate = new DateTime($to_date);
		$dateInterval = new DateInterval('P1M');
		$datePeriod   = new DatePeriod($startDate, $dateInterval, $endDate);

		$monthCount = 0;
		$dayCount =$day=0;
		foreach ($datePeriod as $date) 
		{		
		    $monthCount++;
		    $dayCount++;
		}
		//print_r($dayArr);
		//echo $day;
		//echo "<br \>{$monthCount} months in total";
		$total_yearMonth=count($yearMonth_arr);
		$table_width=1500+($monthCount*500);


		?>
		<div id="report_container" align="center" style="<?php echo $table_width+50; ?>px;">
			<fieldset style="<?php echo $table_width+50; ?>px;">
				<h2>Month Wise Report</h2>
			    <table class="rpt_table" border="1" rules="all" width="<?php echo $table_width+50; ?>" cellpadding="0" cellspacing="0">
			        <tr>
			            <th width="100" rowspan="2">SL</th> 
			            <?php 
			            foreach ($datePeriod as $key => $date) 
			            {		            	
			            	$day_colspan=cal_days_in_month(CAL_GREGORIAN,$date->format('m'),$date->format('Y'));
				            ?>
				            <th width="200" colspan="<?php echo $day_colspan; ?>"><?php echo $date->format('F-y'); ?></th>
				            <?php 
			            }
			            ?>
			        </tr>
			        <tr>
			        	<?php 
			            foreach ($datePeriod as $date) 
			            {
						    $day=cal_days_in_month(CAL_GREGORIAN,$date->format('m'),$date->format('Y'));
						    $dayArr = explode(",",$day);
			            	foreach ($dayArr as $value) 
			            	{
			            		$j=1;
			            		for ($i=0; $i <$value; $i++) 
			            		{ 
			            			?>
						            <th width="300"><?php echo $j; ?></th>
						            <?php 
						            $j++;
			            		} 
			            	} 
			            }
			            ?>
			        </tr>
			    </table>

			    <table class="rpt_table" border="1" rules="all" width="<?php echo $table_width+50; ?>" cellpadding="0" cellspacing="0" id="table_body">
		            <tbody>
		            	<?php
		            	$k=1;
		            	$data_arr = array(1=> 'A' , 2=> 'B');
		            	$grand_total_order_qty=$grand_total_order_value=0;
	                	foreach ($data_arr as $customerName_key => $customerName_val) 
						{
							if ($k%2==0) $bgcolor="#E9F3FF"; else $bgcolor="#FFFFFF"; 
							?>
		                    <tr bgcolor="<?php echo $bgcolor; ?>">
		                        <td width="100"><?php echo '0'.$k; ?></td>
		                        <?php 
		                        foreach ($datePeriod as $date) 
					            {
								    $days=cal_days_in_month(CAL_GREGORIAN,$date->format('m'),$date->format('Y'));
								    $dayArr = explode(",",$days);
					            	foreach ($dayArr as $value) 
					            	{
					            		$j=1;
					            		for ($i=0; $i <$value; $i++) 
					            		{ 
					            			?>
								            <td width="300" align="center"><?php echo $j; ?></td>
								            <?php 
								            $j++;
					            		} 
					            	} 
					            }
					            
					            ?>
		                    </tr>
		                    <?php
		                    $k++;
		                    //$grand_total_order_qty+=$total_qty;
		                    //$grand_total_order_value+=$total_value; 	
	                	}
		                ?>
		            </tbody>
	        	</table>

	        	<table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0" id="report_table_footer">
		        	<tfoot>
		                <tr>
		                    <td width="40"></td>
		                    <td width="200"></td>
		                    <td width="100"></td>
		                    <td width="130" align="right"><strong>Grand Total:</strong></td>
		                    <?php 
				            foreach ($datePeriod as $yearMonth_key => $value) 
				            {
				            ?>
		                    <td width="100"><strong>454</strong></td>
		                    <td width="100"><strong>234</strong></td>
		                    <?php 
				            }
				            ?>
		                    <td width="100"><strong>4534</strong></td>
		                    <td width="100"><strong>2355</strong></td>
		                </tr>
		            </tfoot>
	        	</table>
			</fieldset>
		</div>
	








		<?php

		die;

		$sql="SELECT a.customerName, b.orderNumber,  DATE_FORMAT(b.shippedDate, '%M-%y') as yearMonth, b.status, sum(c.quantityOrdered) as qty, sum(c.priceEach) as value, c.productCode
		FROM customers a, orders b, orderdetails c 
		WHERE a.customerNumber=b.customerNumber and b.orderNumber=c.orderNumber AND b.shippedDate BETWEEN '$from_date' AND '$to_date'
		GROUP by a.customerName, b.orderNumber, c.productCode 
		order by b.shippedDate, a.customerName"; //   and b.customerNumber in(103)
		$sql_result=sql_select($sql);

		$data_arr=$yearMonth_arr=$monthYarQty=array();
		foreach ($sql_result as $key => $row) 
		{
		  $data_arr[$row['customerName']][$row['orderNumber']][$row['productCode']]['status']=$row['status'];

		  $monthYarQty[$row['customerName']][$row['orderNumber']][$row['productCode']][$row['yearMonth']]['qty']=$row['qty'];
		  $monthYarQty[$row['customerName']][$row['orderNumber']][$row['productCode']][$row['yearMonth']]['value']=$row['value']; 

		  $yearMonth_arr[$row['yearMonth']]=$row['yearMonth'];
		}
		$total_yearMonth=count($yearMonth_arr);
		$table_width=1040+($total_yearMonth*230); 
		//$div_width=($total_yearMonth*100); 
		/*echo "<pre>";
		print_r($monthYarQty);die;*/
 
		$customer_rowspan=$qty_arr=$value_arr=array();
		?>
		<div id="report_container" align="center" style="width:1040px">
			<fieldset style="width:1040px;">
				<h2>Month Wise Report</h2>
			    <table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0">
			        <tr>
			            <th width="40" rowspan="2">SL</th> 
			            <th width="200" rowspan="2"> Customer Name</th>
			            <th width="100" rowspan="2">Product Code</th>
			            <th width="130" rowspan="2">Order No</th>
			            <?php 
			            foreach ($yearMonth_arr as $key => $value) 
			            {
			            ?>
			            <th width="200" colspan="2"><?php echo $value; ?></th>
			            <?php 
			            }
			            ?>
			            <th width="100" rowspan="2">Total Order Qty</th>
			            <th width="100" rowspan="2">Total Order Value</th>
			        </tr>
			        <tr>
			        	<?php 
			            foreach ($yearMonth_arr as $key => $value) 
			            {
			            ?>
			            <th width="100">Order Qty.</th>
			            <th width="100">Order Value</th>
			            <?php 
			            }
			            ?>
			        </tr>
			    </table>
			    <table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0" id="table_body">
		            <tbody>
		            	<?php
		            	$i=1;
		            	$grand_total_order_qty=$grand_total_order_value=0;
	                	foreach ($data_arr as $customerName_key => $customerName_val) 
						{
							foreach ($customerName_val as $orderNumber_key => $orderNumber_val) 
							{
								foreach ($orderNumber_val as $productCode_key => $row) 
								{
									if ($i%2==0) $bgcolor="#E9F3FF"; else $bgcolor="#FFFFFF"; 
									?>
				                    <tr bgcolor="<?php echo $bgcolor; ?>">
				                        <td width="40"><?php echo $i; ?></td>
				                        <td width="200"><?php echo $customerName_key; ?></td>
				                        <td width="100"><?php echo $productCode_key; ?></td>
				                        <td width="130"><?php echo $orderNumber_key; ?></td>
				                        <?php 
				                        $total_qty=$total_value=0;
							            foreach ($yearMonth_arr as $yearMonth_key => $value) 
							            {
							            	$montylyQty=$monthYarQty[$customerName_key][$orderNumber_key][$productCode_key][$yearMonth_key]['qty'];
							            	$montylyvalue=$monthYarQty[$customerName_key][$orderNumber_key][$productCode_key][$yearMonth_key]['value'];

							            	$grand_total_monthly_qty[$yearMonth_key]+=$montylyQty;             	
			                    			$grand_total_monthly_value[$yearMonth_key]+=$montylyvalue;
								            ?>
					                        <td width="100"><?php echo $montylyQty; $total_qty+=$montylyQty; ?></td>
					                        <td width="100"><?php echo $montylyvalue; $total_value+=$montylyvalue; ?></td>
					                        <?php 
							            }
							            ?>
				                        <td width="100"><?php echo $total_qty; ?></td>
				                        <td width="100"><?php echo $total_value; ?></td>
				                    </tr>
				                    <?php
				                    $i++;
				                    $grand_total_order_qty+=$total_qty;
				                    $grand_total_order_value+=$total_value; 						                
								}
							}
	                	}
		                ?>
		            </tbody>
	        	</table>

	        	<table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0" id="report_table_footer">
		        	<tfoot>
		                <tr>
		                    <td width="40"></td>
		                    <td width="200"></td>
		                    <td width="100"></td>
		                    <td width="130" align="right"><strong>Grand Total:</strong></td>
		                    <?php 
				            foreach ($yearMonth_arr as $yearMonth_key => $value) 
				            {
				            ?>
		                    <td width="100"><strong><?php echo $grand_total_monthly_qty[$yearMonth_key]; ?></strong></td>
		                    <td width="100"><strong><?php echo $grand_total_monthly_value[$yearMonth_key]; ?></strong></td>
		                    <?php 
				            }
				            ?>
		                    <td width="100"><strong><?php echo $grand_total_order_qty; ?></strong></td>
		                    <td width="100"><strong><?php echo $grand_total_order_value; ?></strong></td>
		                </tr>
		            </tfoot>
	        	</table>
			</fieldset>
		</div>
		<?php
	}


	?>
</body>
</html>