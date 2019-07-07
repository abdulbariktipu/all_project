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
	$barcode=$_REQUEST['barcode_no'];

	if ($action=='customer_wise_report') // customer_wise_report
	{
		$sql="SELECT a.customerName, b.orderNumber, sum(c.quantityOrdered) as qty, sum(c.priceEach) as value, c.productCode
		FROM customers a, orders b, orderdetails c 
		WHERE a.customerNumber=b.customerNumber and b.orderNumber=c.orderNumber
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

	if ($action=='customer_order_wise_report') // customer_order_wise_report
	{
		$sql="SELECT a.customerName, b.orderNumber, b.shippedDate, b.status, sum(c.quantityOrdered) as qty, sum(c.priceEach) as value, c.productCode
		FROM customers a, orders b, orderdetails c 
		WHERE a.customerNumber=b.customerNumber and b.orderNumber=c.orderNumber
		GROUP by a.customerName, b.orderNumber, c.productCode"; //  and b.customerNumber in(242,249)
		$sql_result=sql_select($sql);

		$data_arr=$rowspan=array();
		foreach ($sql_result as $key => $row) 
		{
		  $data_arr[$row['customerName']][$row['orderNumber']][$row['productCode']]['qty']=$row['qty'];
		  $data_arr[$row['customerName']][$row['orderNumber']][$row['productCode']]['value']=$row['value'];
		  $data_arr[$row['customerName']][$row['orderNumber']][$row['productCode']]['shippedDate']=$row['shippedDate'];
		  $data_arr[$row['customerName']][$row['orderNumber']][$row['productCode']]['status']=$row['status'];

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
				                        <td width="100"><?php echo $productCode_key; ?></td>
				                        <td width="130"><?php echo $orderNumber_key; ?></td>
				                        <td width="130"><?php echo $row['qty']; ?></td>
				                        <td width="140"><?php echo $row['value']; ?></td>
				                        <?php 
				                        if (!in_array($orderNumber_key,$chk)) 
				                        {
				                        ?>				                        
				                        <td width="130" rowspan="<?php echo $rowspan[$orderNumber_key]; ?>"><?php echo $row['shippedDate']; ?></td>
				                        <td  rowspan="<?php echo $rowspan[$orderNumber_key]; ?>"><?php echo $row['status']; ?></td>
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
		$sql="SELECT a.customerName, b.orderNumber,  DATE_FORMAT(b.shippedDate, '%M-%y') as yearMonth, b.status, sum(c.quantityOrdered) as qty, sum(c.priceEach) as value, c.productCode
		FROM customers a, orders b, orderdetails c 
		WHERE a.customerNumber=b.customerNumber and b.orderNumber=c.orderNumber
		GROUP by a.customerName, b.orderNumber, c.productCode order by b.shippedDate, a.customerName"; //   and b.customerNumber in(103)
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
		$table_width=1040+($total_yearMonth*230); // 230
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

	if ($action=='barcode_report') // barcode_report
	{
		echo 'Barcode No is: '.$barcode;
	}
	
	?>
</body>
</html>