<?
header('Content-type:text/html; charset=utf-8');
include('../includes/common.php');
// error_reporting (0);
// require_once('db_mysql_function.php');
$db_type=0;
$action=$_REQUEST['action'];
if ($action=="order_popup")
{
	//echo load_html_head_contents("Order Info", "../../../", 1, 1,'','','');
	extract($_REQUEST);
	?> 
	<script>
		function js_set_value(id,batchNo,batchColor)
		{
			$("#order_id").val(id);
			/*$("#txt_batch_no").val(batchNo);
			$("#txt_batch_color").val(batchColor);*/
			// parent.emailwindow.hide();
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
	                        <input type="hidden" name="order_id" id="order_id" class="text_boxes" value="">
	                    </th>
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
							<!-- <input type="hidden" id="txt_batch_id" value="" />
							<input type="hidden" id="txt_batch_no" value="" />
							<input type="hidden" id="txt_batch_color" value="" /> -->
							<!-- END -->
	                    </td>
	                </tr>
	            </table>
	        	<div style="margin-top:10px" id="search_div"></div> 
			</fieldset>
		</form>
	</div>    
	</body>           
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="../includes/functions_bottom.js" type="text/javascript"></script>
	<script src="../includes/functions.js" type="text/javascript"></script>
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
 					<tr bgcolor="<? echo $bgcolor; ?>" style="cursor:pointer" onClick="js_set_value(<? echo $row['customerNumber'];?>,'<? echo $row['customerName'];?>','<? echo $row['contactLastName']; ?>')"  >
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

if ($action=="populate_data_from_order")
{
	//echo "string";
}
?>
