<?
header('Content-type:text/html; charset=utf-8');
include('../../includes/common.php');
// error_reporting (0);
// require_once('db_mysql_function.php');
$db_type=0;
$action=$_REQUEST['action'];
if ($action=="customer_popup")
{
	// echo load_html_head_contents("Order Info","../../", 1, 1, '','','','');
	extract($_REQUEST);
	?> 
	<script>
		function js_set_value(customer_Id,customer_name,customer_phone_no,address,state,start_date)
		{
			$("#hidd_customer_id").val(customer_Id);
			$("#hidd_customer_name").val(customer_name);
			$("#hidd_customer_phone_no").val(customer_phone_no);
			$("#hidd_customer_address").val(address);
			$("#hidd_state").val(state);
			$("#hidd_start_date").val(start_date);
			parent.emailwindow.hide();
		}
    </script>
	</head>
	<body>
	<div align="center" style="width:880px;">
		<form name="searchdescfrm"  id="searchdescfrm">
			<fieldset style="width:870px;margin-left:10px">
	        <legend>Enter search words</legend>
	            <table cellpadding="0" cellspacing="0" width="800" class="rpt_table">
	                <thead>
	                    <th>Buyer Name</th>
	                    <th>Order No</th>
	                    <th>Internal Ref. No</th>
	                    <th width="230">Shipment Date Range</th>
	                    <th>
	                        <input type="reset" name="reset" id="reset" value="Reset" style="width:100px;" class="formbutton" />	                        
	                </thead>
	                <tr class="general">
	                    <td>
	                        <input type="text" style="width:130px;" class="text_boxes" name="cbo_buyer_name" id="cbo_buyer_name" />
	                    </td>
	                    <td>
	                        <input type="text" style="width:130px;" class="text_boxes" name="txt_order_no" id="txt_order_no" />
	                    </td>
	                     <td>
	                        <input type="text" style="width:130px;" class="text_boxes" name="txt_int_ref_no" id="txt_int_ref_no" />
	                    </td>
	                    <td>
	                    	<input name="txt_date_from" id="txt_date_from" class="datepicker" style="width:80px" placeholder="From Date" readonly>
	                        <input name="txt_date_to" id="txt_date_to" class="datepicker" style="width:80px" placeholder="To Date" readonly>
	                    </td>
	                    <td>
							<input type="button" name="button2" class="formbutton" value="Show" onClick="show_list_view ( document.getElementById('cbo_buyer_name').value+'_'+document.getElementById('txt_order_no').value+'_'+<? echo $cbo_company_id; ?>+'_'+document.getElementById('txt_date_from').value+'_'+document.getElementById('txt_date_to').value+'_'+'<? echo $type; ?>'+'_'+<? echo $cbo_company_id_to;?>+'_'+document.getElementById('txt_int_ref_no').value, 'create_po_search_list_view', 'search_div', 'customer_bill_pay_controller', '')" style="width:100px;" />

							<!-- Hidden field here-->
							<input type="hidden" id="hidd_customer_id" value="" />
							<input type="hidden" id="hidd_customer_name" value="" />
							<input type="hidden" id="hidd_customer_phone_no" value="" />
							<input type="hidden" id="hidd_customer_address" value="" />
							<input type="hidden" id="hidd_state" value="" />
							<input type="hidden" id="hidd_start_date" value="" />
							<!-- END -->
	                    </td>
	                </tr>
	            </table>
	        	<div style="margin-top:10px" id="search_div"></div> 
			</fieldset>
		</form>
	</div>    
	</body>           
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="../../includes/functions_bottom.js" type="text/javascript"></script>
	<script src="../../includes/functions.js" type="text/javascript"></script>
	</html>
	<?
	exit();
}

if($action=="create_po_search_list_view")
{
	$data=$_REQUEST['data'];
	$data=explode('_',$data);
	if ($data[0]==0) $buyer="%%"; else $buyer=$data[0];
	$search_string="%".trim($data[1])."%";

	$company_id=$data[2];
	$cbo_company_id_to=$data[6];
	$txt_int_ref_no=$data[7];

	if ($data[3]!="" &&  $data[4]!="") 
	{
		if($db_type==0)
		{
			$shipment_date = "and b.pub_shipment_date between '".change_date_format($data[3], "yyyy-mm-dd", "-")."' and '".change_date_format($data[4], "yyyy-mm-dd", "-")."'";
		}
	}
	else 
		$shipment_date ="";
	
	$type=$data[5];
	$arr=array(2=>"Com");
	
	if($db_type==0) $year_field="YEAR(a.insert_date) as year"; 
	else if($db_type==2) $year_field="to_char(a.insert_date,'YYYY') as year";
	else $year_field="";//defined Later
	
	if($type=="from") $status_cond=" and b.status_active in(1,3)"; else $status_cond=" and b.status_active=1";	
	if($type=="from") $company_cond=" and a.company_name=$company_id "; else $company_cond=" and a.company_name=$cbo_company_id_to";	
	if($txt_int_ref_no!="") $int_ref_no_cond=" and b.grouping like" ."'%".trim($txt_int_ref_no)."%'"; else $int_ref_no_cond="";	

	$sql= "select * from customers";
 	//echo $sql;die;
 	$result = sql_select($sql);

 	?>
 	<div align="left" style="margin-left:50px; margin-top:10px">
 		<table cellspacing="0" cellpadding="0" border="1" rules="all" width="750" class="rpt_table" >
 			<thead>
 				<th width="50">SL</th>
 				<th width="100">Batch No</th>
 				<th width="100">Color</th>
 				<th width="120">Booking No</th>
 				<th width="250">Po Number</th>
 			</thead>
 		</table>

 		<div style="width:770px; max-height:250px; overflow-y:scroll" id="container_batch" >
 			<table cellspacing="0" cellpadding="0" border="1" rules="all" width="750" class="rpt_table" id="view">
 				<?
 				$i=1;
 				foreach ($result as $row)
 				{
 					if ($i%2==0) $bgcolor="#E9F3FF"; else $bgcolor="#FFFFFF";
 					?>
 					<tr bgcolor="<? echo $bgcolor; ?>" style="cursor:pointer" onClick="js_set_value(<? echo $row['customerNumber'];?>,'<? echo $row['customerName'];?>','<? echo $row['phone']; ?>','<? echo $row['addressLine1']; ?>','<? echo $row['state']; ?>','<? echo 'Date'; ?>')"  >
 						<td width="50"><? echo $i; ?>  </td>
 						<td width="100"><p><? echo $row['customerNumber']; ?></p></td>
 						<td width="100"><p><? echo $row['customerName']; ?></p></td>
 						<td width="120"><p><? echo $row['contactLastName']; ?>&nbsp;</p></td>
 						<td width="250"><p><? echo $row['contactFirstName']; ?>&nbsp;</p></td>
 					</tr>
 					<?
 					$i++;
 				}
 				?>
 			</table>
 		</div>
 	</div>
 	<?
 	exit();
}

if($action=='populate_data_from_customer_bill')
{
	$data=$_REQUEST['data'];
	$data=explode("**",$data);
	$customer_id=$data[0];
	$customer_name=$data[1];

	$data_array=sql_select("select sum(amount) as bill from payments where customerNumber=$customer_id");
	foreach ($data_array as $row)
	{	
		// echo "document.getElementById('txt_').value 			= '".$po_id."';\n";
		echo "document.getElementById('txt_customer_bill').value 			= '".$row["bill"]."';\n";
		exit();
	}
}

if ($action=="customer_billInfo_popup")
{
	// echo load_html_head_contents("Order Info","../../", 1, 1, '','','','');
	extract($_REQUEST);
	?> 

	</head>

	<body>
	<div align="center" style="width:770px;">
		<form name="searchdescfrm"  id="searchdescfrm">
			<fieldset style="width:760px;margin-left:15px">
	        <legend><? echo ucfirst($type); ?> Order Info</legend>
	        	<br>
	            <table cellpadding="0" cellspacing="0" width="100%">
	                <tr bgcolor="#FFFFFF">
	                    <td align="center"><? echo ucfirst($type); ?> Order No: <b><? echo $txt_order_no; ?></b></td>
	                </tr>
	            </table>
	            <br>
	            <table border="1" cellpadding="0" cellspacing="0" class="rpt_table" rules="all" width="750" align="center">
	                <thead>
	                    <th width="40">SL</th>
	                    <th width="100">Required</th>
	                    <?
						if($type=="from")
						{ 
						?>
	                        <th width="100">Knitted</th>
	                        <th width="100">Issue to dye</th>
	                    	<th width="100">Issue Return</th>
	                        <th width="100">Transfer Out</th>
	                        <th width="100">Transfer In</th>
	                        <th>Remaining</th>
	                    <?
						}
						else
						{
						?>
	                        <th width="80">Yrn. Issued</th>
	                        <th width="80">Yrn. Issue Rtn</th>
	                        <th width="80">Knitted</th>
	                        <th width="90">Issue Rtn.</th>
	                        <th width="100">Transf. Out</th>
	                        <th width="100">Transf. In</th>
	                        <th>Shortage</th>
	                    <?	
						}
						?>
	                    
	                </thead>
	                <?
						$req_qty=return_field_value("sum(b.grey_fab_qnty) as grey_req_qnty","wo_booking_mst a, wo_booking_dtls b","a.booking_no=b.booking_no and a.item_category in(2,13) and b.po_break_down_id=$txt_order_id and a.is_deleted=0 and a.status_active=1 and b.is_deleted=0 and b.status_active=1","grey_req_qnty");
						
						$sql="SELECT 
									sum(CASE WHEN entry_form ='3' THEN quantity ELSE 0 END) AS issue_qnty,
									sum(CASE WHEN entry_form ='5' THEN quantity ELSE 0 END) AS dye_issue_qnty,
									sum(CASE WHEN entry_form ='9' THEN quantity ELSE 0 END) AS return_qnty,
									sum(CASE WHEN entry_form ='13' and trans_type=5 THEN quantity ELSE 0 END) AS transfer_out_qnty,
									sum(CASE WHEN entry_form ='13' and trans_type=6 THEN quantity ELSE 0 END) AS transfer_in_qnty,
									sum(CASE WHEN trans_id<>0 and entry_form in(2,22) THEN quantity ELSE 0 END) AS knit_qnty
								from order_wise_pro_details where po_breakdown_id=$txt_order_id and status_active=1 and is_deleted=0";
						$dataArray=sql_select($sql);
						$remaining=0; $shoratge=0;
					?>
	                <tr bgcolor="#EFEFEF">
	                    <td>1</td>
	                    <td align="right"><? echo number_format($req_qty,2); ?>&nbsp;</td>
	                    <?
						if($type=="from")
						{
							$remaining=$dataArray[0][csf('issue_qnty')]-$dataArray[0][csf('return_qnty')]-$dataArray[0][csf('transfer_out_qnty')]+$dataArray[0][csf('transfer_in_qnty')]-$dataArray[0][csf('knit_qnty')];
						?>
	                        <td align="right"><? echo number_format($dataArray[0][csf('knit_qnty')],2); ?>&nbsp;</td>
	                        <td align="right"><? echo number_format($dataArray[0][csf('dye_issue_qnty')],2); ?></td>
	                        <td align="right"><? echo number_format($dataArray[0][csf('return_qnty')],2); ?>&nbsp;</td>
	                        <td align="right"><? echo number_format($dataArray[0][csf('transfer_in_qnty')],2); ?></td>
	                    	<td align="right"><? echo number_format($dataArray[0][csf('transfer_out_qnty')],2); ?>&nbsp;</td>
	                        <td align="right"><? echo number_format($remaining,2); ?>&nbsp;</td>
	                    <?
						}
						else
						{
							$shoratge=$req_qty-$dataArray[0][csf('issue_qnty')]-$dataArray[0][csf('return_qnty')]+$dataArray[0][csf('transfer_out_qnty')]-$dataArray[0][csf('transfer_in_qnty')];
						?>
	                        <td align="right"><? echo number_format($dataArray[0][csf('issue_qnty')],2); ?>&nbsp;</td>
	                        <td align="right"><? echo number_format($dataArray[0][csf('return_qnty')],2); ?></td>
	                        <td align="right"><? echo number_format($dataArray[0][csf('knit_qnty')],2); ?>&nbsp;</td>
	                        <td align="right"><? echo number_format($dataArray[0][csf('return_qnty')],2); ?></td>
	                    	<td align="right"><? echo number_format($dataArray[0][csf('transfer_in_qnty')],2); ?>&nbsp;</td>
	                        <td align="right"><? echo number_format($dataArray[0][csf('transfer_out_qnty')],2); ?>&nbsp;</td>
	                    	<td align="right"><? echo number_format($shoratge,2); ?>&nbsp;</td>
	                    <?	
						}

						?>
	                </tr>
	            </table>
	            <table>
					<tr>
	                    <td align="center" >
	                        <input type="button" name="close" class="formbutton" value="Close" id="main_close" onClick="parent.emailwindow.hide();" style="width:100px" />
	                    </td>
	                </tr>
				</table>
			</fieldset>
		</form>
	</div>    
	</body>           
	</html>
	<?
	exit();
}
?>
