<? 
header('Content-type:text/html; charset=utf-8');
session_start();
if( $_SESSION['logic_erp']['user_id'] == "" ) header("location:login.php");

require_once('../../../includes/common.php');

$data=$_REQUEST['data'];
$action=$_REQUEST['action'];

//--------------------------------------------------------------------------------------------------------------------

if ($action=="load_drop_down_location")
{
	echo create_drop_down( "cbo_location", 110, "select id,location_name from lib_location where status_active =1 and is_deleted=0 and company_id='$data' order by location_name","id,location_name", 1, "-- Select --", $selected, "load_drop_down( 'requires/date_wise_production_report_controller', this.value, 'load_drop_down_floor', 'floor_td' );",0 );     	 
}

if ($action=="load_drop_down_floor")
{
	echo create_drop_down( "cbo_floor", 110, "select id,floor_name from lib_prod_floor where status_active =1 and is_deleted=0 and location_id='$data' order by floor_name","id,floor_name", 1, "-- Select --", $selected, "",0 );     	 
}

if ($action=="load_drop_down_buyer")
{
	echo create_drop_down( "cbo_buyer_name", 110, "select buy.id,buy.buyer_name from lib_buyer buy, lib_buyer_tag_company b where buy.status_active =1 and buy.is_deleted=0 and b.buyer_id=buy.id and b.tag_company='$data' and buy.id in (select  buyer_id from  lib_buyer_party_type where party_type in (1,3,21,90)) $buyer_cond order by buyer_name","id,buyer_name", 1, "-- Select --", $selected, "" );     	 
	exit();
}

if($action=="report_generate")
{ 
	
	$process = array( &$_POST );
	extract(check_magic_quote_gpc( $process )); 
	
	$company_library=return_library_array( "select id,company_name from lib_company", "id", "company_name"  );
	$company_short_library=return_library_array( "select id,company_short_name from lib_company", "id", "company_short_name"  );
 	$buyer_short_library=return_library_array( "select id,short_name from lib_buyer", "id", "short_name"  );
 	$location_library=return_library_array( "select id,location_name from lib_location", "id", "location_name"  ); 
	$floor_library=return_library_array( "select id,floor_name from lib_prod_floor", "id", "floor_name"  ); 
	$line_library=return_library_array( "select id,line_name from lib_sewing_line", "id", "line_name"  ); 
	
	$costing_per_arr = return_library_array("select job_no, costing_per from wo_pre_cost_mst","job_no","costing_per");
	$tot_cost_arr=array(); $tot_cm_cost_arr=array();
	//$tot_cost_arr = return_library_array("select job_no, cm_for_sipment_sche from wo_pre_cost_dtls","job_no","cm_for_sipment_sche"); 
	$pre_cost_arr = sql_select("select job_no, cm_cost, cm_for_sipment_sche from wo_pre_cost_dtls"); 
	foreach($pre_cost_arr as $row)
	{
		$tot_cost_arr[$row[csf('job_no')]]=$row[csf('cm_for_sipment_sche')];
		$tot_cm_cost_arr[$row[csf('job_no')]]=$row[csf('cm_cost')];
	}
 	/*if($template==1)
	{
	*/	
		
		//print_r($_REQUEST);die;
		$garments_nature=str_replace("'","",$cbo_garments_nature);
		if($garments_nature==1)$garments_nature="";
		$type = str_replace("'","",$cbo_type);
		if(str_replace("'","",$cbo_company_name)==0)$company_name=""; else $company_name=" and b.company_name=$cbo_company_name";
		if(str_replace("'","",$cbo_buyer_name)==0)$buyer_name="";else $buyer_name=" and b.buyer_name=$cbo_buyer_name";
		if(str_replace("'","",trim($txt_date_from))=="" || str_replace("'","",trim($txt_date_to))=="") $txt_date="";
		else $txt_date=" and c.production_date between $txt_date_from and $txt_date_to";
		$fromDate = change_date_format( str_replace("'","",trim($txt_date_from)) );
		$toDate = change_date_format( str_replace("'","",trim($txt_date_to)) );
		//cbo_garments_nature
		
		if($type==1) //--------------------------------------------Show Date Wise
		{
			ob_start();
		?>
			<div>
                <table width="2460" cellspacing="0">
                    <tr class="form_caption" style="border:none;">
                            <td colspan="28" align="center" style="border:none;font-size:14px; font-weight:bold" >Date Wise Production Report</td>
                     </tr>
                    <tr style="border:none;">
                            <td colspan="28" align="center" style="border:none; font-size:16px; font-weight:bold">
                                Company Name:<? echo $company_library[str_replace("'","",$cbo_company_name)]; ?>                                
                            </td>
                      </tr>
                      <tr style="border:none;">
                            <td colspan="28" align="center" style="border:none;font-size:12px; font-weight:bold">
                            	<? echo "From $fromDate To $toDate" ;?>
                            </td>
                      </tr>
                </table>
                <table width="2460" cellspacing="0" border="1" class="rpt_table" rules="all" id="table_header_1">
                   <thead>
                        <th width="40">SL</th>    
                        <th width="80">Working Factory</th>
                        <th width="65">Job No</th>
                        <th width="55">Year</th>
                        <th width="130">Order Number</th>
                        <th width="70">Buyer Name</th>
                        <th width="140">Style Name</th>
                        <th width="150">Item Name</th>
                        <th width="100">Production Date</th>
                        <th width="80">Cutting</th>
                        <th width="80">Sent to Print</th>
                        <th width="80">Rev Print</th>
                        <th width="80">Sent to Emb</th>
                        <th width="80">Rev Emb</th>
                        <th width="80">Sent to Wash</th>
                        <th width="80">Rev Wash</th>
                        <th width="80">Sent to Sp. Works</th>
                        <th width="80">Rev Sp. Works</th>
                        <th width="80">Sewing Input</th>
                        <th width="80">Sewing Output</th>
                        <th width="80">Iron Qty </th>
                        <th width="80">Re-Iron Qty </th>
                        <th width="80">Finish Qty </th>
                        <th width="80">Today Carton</th>
                        <th width="80">Prod/Dzn</th>
                        <th width="100">CM Value</th>
                        <th width="100">CM Cost</th>
                        <th width="80">Remarks</th>
                     </thead>
                </table>
                <div style="max-height:425px; overflow-y:scroll; width:2480px" id="scroll_body">
                    <table cellspacing="0" border="1" class="rpt_table"  width="2460" rules="all" id="table_body" >
                    <?
					
					$cutting_array=array();
					$printing_array=array();
					$printreceived_array=array();
					$emb_array=array();
					$embreceived_array=array();
					$wash_array=array();
					$washreceived_array=array();
					$sp_array=array();
					$washreceived_array=array();
					$sewingin_array=array();
					$sewingout_array=array();
					$iron_array=array();
					$re_iron_array=array();
					$finish_array=array();
					$carton_array=array();
					
					$sql_order=sql_select("SELECT c.po_break_down_id,c.production_date,
					sum(CASE WHEN c.production_type ='1' THEN c.production_quantity ELSE 0 END) AS cutting_qnty,
					sum(CASE WHEN c.production_type ='2' AND c.embel_name=1 THEN c.production_quantity ELSE 0 END) AS printing_qnty,
					sum(CASE WHEN c.production_type ='3' AND c.embel_name=1 THEN c.production_quantity ELSE 0 END) AS printreceived_qnty,
					sum(CASE WHEN c.production_type ='2' AND c.embel_name=2 THEN c.production_quantity ELSE 0 END) AS emb_qnty,
					sum(CASE WHEN c.production_type ='3' AND c.embel_name=2 THEN c.production_quantity ELSE 0 END) AS embreceived_qnty,
					sum(CASE WHEN c.production_type ='2' AND c.embel_name=3 THEN c.production_quantity ELSE 0 END) AS wash_qnty,
					sum(CASE WHEN c.production_type ='3' AND c.embel_name=3 THEN c.production_quantity ELSE 0 END) AS washreceived_qnty,
					sum(CASE WHEN c.production_type ='2' AND c.embel_name=4 THEN c.production_quantity ELSE 0 END) AS sp_qnty,
					sum(CASE WHEN c.production_type ='3' AND c.embel_name=4 THEN c.production_quantity ELSE 0 END) AS spreceived_qnty,
					sum(CASE WHEN c.production_type ='4' THEN c.production_quantity ELSE 0 END) AS sewingin_qnty,
					sum(CASE WHEN c.production_type ='5' THEN c.production_quantity ELSE 0 END) AS sewingout_qnty,
					sum(CASE WHEN c.production_type ='7' THEN c.production_quantity ELSE 0 END) AS iron_qnty,
					sum(CASE WHEN c.production_type ='7' THEN c.re_production_qty ELSE 0 END) AS re_iron_qnty,
					sum(CASE WHEN c.production_type ='8' THEN c.production_quantity ELSE 0 END) AS finish_qnty,
					sum(c.carton_qty) as carton_qty 
								from 
									wo_po_break_down a,wo_po_details_master b, pro_garments_production_mst c 
								where 
									a.job_no_mst=b.job_no and a.id=c.po_break_down_id and a.is_deleted=0 and a.status_active=1 and b.is_deleted=0 and b.status_active=1 and c.is_deleted=0 and c.status_active=1 $txt_date $company_name $buyer_name $garments_nature group by c.po_break_down_id,c.production_date");
					foreach($sql_order as $sql_result)
					{
						$cutting_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['1']=$sql_result[csf("cutting_qnty")];
						
						$printing_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['2']=$sql_result[csf("printing_qnty")];
						$printreceived_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['3']=$sql_result[csf("printreceived_qnty")];
						
						$emb_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['2']=$sql_result[csf("emb_qnty")];
						$embreceived_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['3']=$sql_result[csf("embreceived_qnty")];
						
						$wash_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['2']=$sql_result[csf("wash_qnty")];
						$washreceived_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['3']=$sql_result[csf("washreceived_qnty")];
						
						$sp_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['2']=$sql_result[csf("sp_qnty")];
						$spreceived_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['3']=$sql_result[csf("spreceived_qnty")];
						
						$sewingin_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['4']=$sql_result[csf("sewingin_qnty")];
						$sewingout_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['5']=$sql_result[csf("sewingout_qnty")];
						$iron_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['7']=$sql_result[csf("iron_qnty")];
						$re_iron_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['7']=$sql_result[csf("re_iron_qnty")];
						$finish_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]['8']=$sql_result[csf("finish_qnty")];
						$carton_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]]=$sql_result[csf("carton_qty")];
					}
		
                    $total_cut=0;
                    $total_print_iss=0;
                    $total_print_re=0;
					$total_emb_iss=0;
                    $total_emb_re=0;
					$total_wash_iss=0;
                    $total_wash_re=0;
					$total_sp_iss=0;
                    $total_sp_re=0;
                    $total_sew_input=0;
                    $total_sew_out=0;
					$total_iron=0;
					$total_re_iron=0;
                    $total_finish=0;
                    $total_carton=0;
                    $total_prod_dzn=0;
                    $total_cm_value=0;
					$total_cm_cost=0;
                    
                    $i=1;
					if($garments_nature!="") $garments_nature=" and c.garments_nature=$garments_nature";
				
					if($db_type==0)
					{
                    	$pro_date_sql=sql_select("SELECT a.job_no_mst,a.po_number,a.po_quantity,b.total_set_qnty as ratio, b.job_no_prefix_num, YEAR(b.insert_date) as year, b.order_uom,b.buyer_name,b.style_ref_no as style ,b.company_name as company_name ,c.garments_nature,c.po_break_down_id,c.item_number_id,c.production_source,c.serving_company,c.location,c.embel_name,c.embel_type, c.production_date,c.production_quantity,c.production_type,c.entry_break_down_type,c.production_hour,c.sewing_line,c.supervisor,c.carton_qty,c.remarks,c.floor_id,c.alter_qnty,c.reject_qnty 
					from 
						wo_po_break_down a,wo_po_details_master b, pro_garments_production_mst c 
					where 
						a.job_no_mst=b.job_no and a.id=c.po_break_down_id and a.is_deleted=0 and a.status_active=1 and b.is_deleted=0 and b.status_active=1 and c.is_deleted=0 and c.status_active=1 $txt_date $company_name $buyer_name $garments_nature group by c.po_break_down_id,c.production_date order by c.production_date");
					}
					else
					{
						
						$pro_date_sql=sql_select("SELECT a.job_no_mst,a.po_number,a.po_quantity,b.total_set_qnty as ratio,b.job_no_prefix_num,to_char(b.insert_date,'YYYY') as year, b.order_uom,b.buyer_name,b.style_ref_no as style ,b.company_name as company_name,c.garments_nature,c.po_break_down_id,c.item_number_id,c.production_date
					from 
						wo_po_break_down a,wo_po_details_master b, pro_garments_production_mst c 
					where 
						a.job_no_mst=b.job_no and a.id=c.po_break_down_id and a.is_deleted=0 and a.status_active=1 and b.is_deleted=0 and b.status_active=1 and c.is_deleted=0 and c.status_active=1 $txt_date $company_name $buyer_name $garments_nature group by a.job_no_mst,a.po_number,a.po_quantity,b.total_set_qnty, b.job_no_prefix_num, b.order_uom,b.buyer_name,b.style_ref_no,b.company_name,c.garments_nature,c.po_break_down_id,c.item_number_id, c.production_date, b.insert_date order by c.production_date");
						
					}
 					foreach($pro_date_sql as $pro_date_sql_row)
                    {
						if ($i%2==0) $bgcolor="#E9F3FF"; else $bgcolor="#FFFFFF";
                    ?>
                    	<tr bgcolor="<? echo $bgcolor; ?>" onClick="change_color('tr_2nd<? echo $i; ?>','<? echo $bgcolor; ?>')" id="tr_2nd<? echo $i; ?>">
                            <td width="40"><? echo $i;?></td>
                            <td width="80"><p><? echo $company_short_library[$pro_date_sql_row[csf("company_name")]]; ?></p></td>
                            <td width="65" align="center"><p><? echo $pro_date_sql_row[csf("job_no_prefix_num")];?></p></td>
                            <td width="55" align="center"><p><? echo $pro_date_sql_row[csf("year")]; ?></p></td>
                            <td width="130"><p><a href="##" onClick="openmypage_order(<? echo $pro_date_sql_row[csf("po_break_down_id")];?>,<? echo $pro_date_sql_row[csf("item_number_id")];?>,'orderQnty_popup');" ><? echo $pro_date_sql_row[csf("po_number")]; ?></a></p></td>
                            <td width="70"><p><? echo $buyer_short_library[$pro_date_sql_row[csf("buyer_name")]]; ?></p></td>
                            <td width="140"><p><? echo $pro_date_sql_row[csf("style")]; ?></p></td>
                            <td width="150"><p><? echo $garments_item[$pro_date_sql_row[csf("item_number_id")]]; ?></p></td>
                            <td width="100" align="center"><p><? echo change_date_format($pro_date_sql_row[csf("production_date")]); ?></p></td>
                            <td width="80" align="right">
								<?
									echo $cutting_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['1'];  
									$total_cut+=$cutting_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['1'];
								?>
                            </td>
                            <td width="80" align="right">
								<?
									echo $printing_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['2'];  
									$total_print_iss+=$printing_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['2'];
								?>
							</td>
                            <td width="80" align="right">
                            	<?
									echo $printreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['3'];  
									$total_print_re+=$printreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['3']; 
								?>
                            </td>
                            <td width="80" align="right">
								<?
									echo $emb_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['2'];  
									$total_emb_iss+=$emb_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['2'];
								?>
							</td>
                            <td width="80" align="right">
                            	<?
									echo $embreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['3'];  
									$total_emb_re+=$embreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['3']; 
								?>
                            </td>
                            <td width="80" align="right">
								<?
									echo $wash_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['2'];  
									$total_wash_iss+=$wash_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['2'];
								?>
							</td>
                            <td width="80" align="right">
                            	<?
									echo $washreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['3'];  
									$total_wash_re+=$washreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['3']; 
								?>
                            </td>
                            <td width="80" align="right">
								<?
									echo $sp_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['2'];  
									$total_sp_iss+=$sp_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['2'];
								?>
							</td>
                            <td width="80" align="right">
                            	<?
									echo $spreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['3'];  
									$total_sp_re+=$spreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['3']; 
								?>
                            </td>
                            <td width="80" align="right"><a href="##" onClick="openmypage_sew_output(<? echo $pro_date_sql_row[csf("po_break_down_id")]; ?>,'<? echo $pro_date_sql_row[csf("production_date")]; ?>',<? echo $pro_date_sql_row[csf("item_number_id")];?>,'sewingQnty_input_popup');" >
                            	
                            	<?
									echo $sewingin_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['4'];  
									$total_sew_input+=$sewingin_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['4'];  
								?>
                                </a>
                            </td>
                            <td width="80" align="right"><a href="##" onClick="openmypage_sew_output(<? echo $pro_date_sql_row[csf("po_break_down_id")]; ?>,'<? echo $pro_date_sql_row[csf("production_date")]; ?>',<? echo $pro_date_sql_row[csf("item_number_id")];?>,'sewingQnty_popup');" >
                            	<?
									echo $sewingout_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['5'];  
									$total_sew_out+=$sewingout_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['5'];  
								?>
                            </a>
                            </td>
                            <td width="80" align="right">
                            	<?
									echo $iron_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['7'];  
									$total_iron+=$iron_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['7'];  
								?>
                            </td>
                            <td width="80" align="right">
                            	<?
									echo $re_iron_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['7'];  
									$total_re_iron+=$re_iron_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['7']; 
								?>
                            </td>
                            <td width="80" align="right">
                            	<?
									echo $finish_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['8'];  
									$total_finish+=$finish_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['8'];  
								?>
                            </td>
                            <td width="80" align="right">
                            	<?
									echo $carton_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]];  
									$total_carton+=$carton_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]; 
								?>
                            </td>
                            <? $prod_dzn=$sewingout_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['5'] / 12 ; $total_prod_dzn+=$prod_dzn; ?>
                            <td width="80" align="right"><? if($prod_dzn!=0) echo number_format($prod_dzn,2); else echo "0"; ?></td>
 							<?
                           // $cm_per_dzn=return_field_value("cm_for_sipment_sche","wo_pre_cost_dtls","job_no='".$pro_date_sql_row[csf("job_no_mst")]."' and is_deleted=0 and status_active=1");
							$dzn_qnty=0; $cm_value=0; $cm_cost=0;
							if($costing_per_arr[$pro_date_sql_row[csf('job_no_mst')]]==1) $dzn_qnty=12;
							else if($costing_per_arr[$pro_date_sql_row[csf('job_no_mst')]]==3) $dzn_qnty=12*2;
							else if($costing_per_arr[$pro_date_sql_row[csf('job_no_mst')]]==4) $dzn_qnty=12*3;
							else if($costing_per_arr[$pro_date_sql_row[csf('job_no_mst')]]==5) $dzn_qnty=12*4;
							else $dzn_qnty=1;
							
							$dzn_qnty=$dzn_qnty*$pro_date_sql_row[csf('ratio')];
							$cm_value=($tot_cost_arr[$pro_date_sql_row[csf('job_no_mst')]]/$dzn_qnty)*$sewingout_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['5'];
							$total_cm_value+=$cm_value;
							
							$cm_cost=($tot_cm_cost_arr[$pro_date_sql_row[csf('job_no_mst')]]/$dzn_qnty)*$sewingout_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]]['5'];
							$total_cm_cost+=$cm_cost;
                            ?>
                            <td width="100" align="right" ><? echo number_format($cm_value,2,'.',''); ?></td>
                            <td width="100" align="right" ><? echo number_format($cm_cost,2,'.',''); ?></td>
                            <td width="80">
                            	<a href="##"  onclick="openmypage_remark(<? echo $pro_date_sql_row[csf("po_break_down_id")];?>,'date_wise_production_report');" > Veiw </a>
                            </td>
                   	 </tr>
					<?	
					$i++;
					
				}//end foreach 1st
				
				?>
                </table> 
                <table width="2460" cellspacing="0" border="1" class="rpt_table" rules="all" id="report_table_footer" >
                    <tfoot>
                            <th width="40" align="right"></th>
                            <th width="80" align="right"></th>
                            <th width="65" align="right"></th>
                            <th width="55" align="right"></th>
                            <th width="130" align="right"></th>
                            <th width="70" align="right"></th>
                            <th width="140" align="right"></th>
                            <th width="150" align="right"></th>
                            <th width="100" align="right">Total</th> 
                            <th width="80" align="right" id="total_cut_td" ><? echo $total_cut;?></th> 
                            <th width="80" align="right" id="total_printissue_td"><? echo $total_print_iss; ?> </th> 
                            <th width="80" align="right" id="total_printrcv_td"><?  echo $total_print_re;  ?>  </th>
                            <th width="80" align="right" id="total_emb_iss"><? echo $total_emb_iss; ?> </th> 
                            <th width="80" align="right" id="total_emb_re"><?  echo $total_emb_re;  ?>  </th>
                            <th width="80" align="right" id="total_wash_iss"><? echo $total_wash_iss; ?> </th> 
                            <th width="80" align="right" id="total_wash_re"><?  echo $total_wash_re;  ?>  </th>
                            <th width="80" align="right" id="total_sp_iss"><? echo $total_sp_iss; ?> </th> 
                            <th width="80" align="right" id="total_sp_re"><?  echo $total_sp_re;  ?>  </th>
                            <th width="80" align="right" id="total_sewin_td"><? echo $total_sew_input;  ?> </th> 
                            <th width="80" align="right" id="total_sewout_td"><? echo $total_sew_out;  ?> </th>
                            <th width="80" align="right" id="total_iron_td"><?  echo $total_iron; ?> </th> 
                            <th width="80" align="right" id="total_re_iron_td"><?  echo $total_re_iron; ?> </th>
                            <th width="80" align="right" id="total_finish_td"><?  echo $total_finish; ?>  </th>   
                            <th width="80" align="right" id="total_carton_td"><? echo $total_carton; ?> </th> 
                            <th width="80" align="right" id="value_total_prod_dzn_td"><?  echo number_format($total_prod_dzn,2); ?> </th>
                            <th width="100" align="right" id="value_total_cm_value_td"><? echo number_format($total_cm_value,2); ?> </th >
                            <th width="100" align="right" id="value_total_cm_cost"><? echo number_format($total_cm_cost,2); ?> </th >
                            <th width="80">&nbsp;</th>
                       </tfoot>
                </table>
           </div>     
  	</div>
<?
		}// end if condition of type
		
		//-------------------------------------------END Show Date Wise------------------------
		//-------------------------------------------Show Date Location Floor & Line Wise------------------------	
		if($type==2)
		{
			ob_start();
		?>
             <div> 
                <table width="2380"  cellspacing="0"   >
                    <tr class="form_caption" style="border:none;">
                            <td colspan="30" align="center" style="border:none;font-size:14px; font-weight:bold"> Date Location Floor & Line Wise Production Report</td>
                     </tr>
                    <tr style="border:none;">
                            <td colspan="30" align="center" style="border:none; font-size:16px; font-weight:bold">
                                Company Name:<? echo $company_library[str_replace("'","",$cbo_company_name)]; ?>                                
                            </td>
                      </tr>
                      <tr style="border:none;">
                            <td colspan="30" align="center" style="border:none;font-size:12px; font-weight:bold">
                            	<? echo "From $fromDate To $toDate" ;?>
                            </td>
                      </tr>
                </table>
                <table width="2800" cellspacing="0" border="1" class="rpt_table" rules="all" id="table_header_1">
                   <thead>
                        <th width="40">SL</th>    
                        <th width="80">Working Factory</th>
                        <th width="65">Job No</th>
                        <th width="55">Year</th>
                        <th width="130">Order Number</th>
                        <th width="70">Buyer Name</th>
                        <th width="130">Style Name</th>
                        <th width="130">Item Name</th>
                        <th width="100">Production Date</th>
                        <th width="100">Status</th>
                        <th width="100">Location</th>
                        <th width="100">Floor</th>
                        <th width="100">Sewing Line No</th>
                        <th width="80">Cutting</th>
                        <th width="80">Sent to Print</th>
                        <th width="80">Rev Print</th>
                         <th width="80">Sent to Emb</th>
                        <th width="80">Rev Emb</th>
                        <th width="80">Sent to Wash</th>
                        <th width="80">Rev Wash</th>
                        <th width="80">Sent to Sp. Works</th>
                        <th width="80">Rev Sp. Works</th>
                        <th width="80">Sewing Input</th>
                        <th width="80">Sewing Output</th>
                        <th width="80">Iron Qty </th>
                        <th width="80">Re-Iron Qty </th>
                        <th width="80">Finish Qty </th>
                        <th width="80">Today Carton</th>
                        <th width="80">Prod/Dzn</th>
                        <th width="100">CM Value</th>
                        <th width="100">CM Cost</th>
                        <th>Remarks</th>
                       </thead>
                </table>
                <div style="max-height:425px; overflow-y:scroll; width:2818px" id="scroll_body">
                    <table cellspacing="0" border="1" class="rpt_table"  width="2800" rules="all" id="table_body" >
                    <?
					$cutting_array=array();
					$printing_array=array();
					$printreceived_array=array();
					$sewingin_array=array();
					$sewingout_array=array();
					$iron_array=array();
					$re_iron_array=array();
					$finish_array=array();
					$carton_array=array();
					
					$sql_order=sql_select("SELECT c.po_break_down_id,c.production_date,c.location,c.floor_id,c.sewing_line,
					sum(CASE WHEN c.production_type ='1' THEN c.production_quantity ELSE 0 END) AS cutting_qnty,
					sum(CASE WHEN c.production_type ='2' AND c.embel_name=1 THEN c.production_quantity ELSE 0 END) AS printing_qnty,
					sum(CASE WHEN c.production_type ='3' AND c.embel_name=1 THEN c.production_quantity ELSE 0 END) AS printreceived_qnty,
					sum(CASE WHEN c.production_type ='2' AND c.embel_name=2 THEN c.production_quantity ELSE 0 END) AS emb_qnty,
					sum(CASE WHEN c.production_type ='3' AND c.embel_name=2 THEN c.production_quantity ELSE 0 END) AS embreceived_qnty,
					sum(CASE WHEN c.production_type ='2' AND c.embel_name=3 THEN c.production_quantity ELSE 0 END) AS wash_qnty,
					sum(CASE WHEN c.production_type ='3' AND c.embel_name=3 THEN c.production_quantity ELSE 0 END) AS washreceived_qnty,
					sum(CASE WHEN c.production_type ='2' AND c.embel_name=4 THEN c.production_quantity ELSE 0 END) AS sp_qnty,
					sum(CASE WHEN c.production_type ='3' AND c.embel_name=4 THEN c.production_quantity ELSE 0 END) AS spreceived_qnty,
					sum(CASE WHEN c.production_type ='4' THEN c.production_quantity ELSE 0 END) AS sewingin_qnty,
					sum(CASE WHEN c.production_type ='5' THEN c.production_quantity ELSE 0 END) AS sewingout_qnty,
					sum(CASE WHEN c.production_type ='7' THEN c.production_quantity ELSE 0 END) AS iron_qnty, 
					sum(CASE WHEN c.production_type ='7' THEN c.re_production_qty ELSE 0 END) AS re_iron_qnty, 
					sum(CASE WHEN c.production_type ='8' THEN c.production_quantity ELSE 0 END) AS finish_qnty, 
					sum(c.carton_qty) as carton_qty
								from 
									wo_po_break_down a,wo_po_details_master b, pro_garments_production_mst c 
								where 
									a.job_no_mst=b.job_no and a.id=c.po_break_down_id and a.is_deleted=0 and a.status_active=1 and b.is_deleted=0 and b.status_active=1 and c.is_deleted=0 and c.status_active=1 $txt_date $company_name $buyer_name $garments_nature group by c.po_break_down_id,c.production_date,c.location,c.floor_id,c.sewing_line");
					foreach($sql_order as $sql_result)
					{
						$cutting_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['1']=$sql_result[csf("cutting_qnty")];
						
						$printing_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['2']=$sql_result[csf("printing_qnty")];
						$printreceived_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['3']=$sql_result[csf("printreceived_qnty")];
						
						$emb_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['2']=$sql_result[csf("emb_qnty")];
						$embreceived_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['3']=$sql_result[csf("embreceived_qnty")];
						
						$wash_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['2']=$sql_result[csf("wash_qnty")];
						$washreceived_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['3']=$sql_result[csf("washreceived_qnty")];
						
						$sp_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['2']=$sql_result[csf("sp_qnty")];
						$spreceived_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['3']=$sql_result[csf("spreceived_qnty")];
						
						$sewingin_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['4']=$sql_result[csf("sewingin_qnty")];
						$sewingout_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['5']=$sql_result[csf("sewingout_qnty")];
						$iron_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['7']=$sql_result[csf("iron_qnty")];
						$re_iron_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['7']=$sql_result[csf("re_iron_qnty")];
						$finish_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]['8']=$sql_result[csf("finish_qnty")];
						$carton_array[$sql_result[csf("po_break_down_id")]][$sql_result[csf("production_date")]][$sql_result[csf("location")]][$sql_result[csf("floor_id")]][$sql_result[csf("sewing_line")]]=$sql_result[csf("carton_qty")];
						
					}
					
					
                    $total_cut=0;
                    $total_print_iss=0;
                    $total_print_re=0;
                    $total_sew_input=0;
                    $total_sew_out=0;
					$total_iron=0;
					$total_re_iron=0;
                    $total_finish=0;
                    $total_carton=0;
                    $total_prod_dzn=0;
                    $total_cm_value=0;
					$total_cm_cost=0;
                    
                    $i=1;
					
					if($garments_nature!="") $garments_nature=" and c.garments_nature=$garments_nature";
					
						
					if($db_type==0)
					{
                    	$pro_date_sql=sql_select("SELECT a.job_no_mst,a.po_number,a.po_quantity, b.total_set_qnty as ratio, b.job_no_prefix_num, YEAR(b.insert_date) as year, b.order_uom,b.buyer_name,b.style_ref_no as style,b.company_name as company_name ,c.garments_nature,c.po_break_down_id,c.item_number_id,c.production_source,c.serving_company,c.location,c.embel_name,c.embel_type, c.production_date,c.production_quantity,c.production_type,c.entry_break_down_type,c.production_hour,c.sewing_line,c.supervisor,c.carton_qty,c.remarks,c.floor_id,c.alter_qnty,c.reject_qnty 
					from 
						wo_po_break_down a,wo_po_details_master b, pro_garments_production_mst c 
					where 
						a.job_no_mst=b.job_no and a.id=c.po_break_down_id and a.is_deleted=0 and a.status_active=1 and b.is_deleted=0 and b.status_active=1 and c.is_deleted=0 and c.status_active=1 $txt_date $company_name $buyer_name $garments_nature group by c.po_break_down_id,c.production_date,c.location,c.floor_id,c.sewing_line order by c.production_date");
					}
					else
					{
						$pro_date_sql=sql_select("SELECT a.job_no_mst,a.po_number,b.total_set_qnty as ratio, b.job_no_prefix_num,to_char(b.insert_date,'YYYY') as year, b.buyer_name,b.style_ref_no as style ,b.company_name as company_name ,
c.po_break_down_id,c.item_number_id,c.production_source,c.location, c.production_date,c.sewing_line,c.floor_id
					from 
						wo_po_break_down a,wo_po_details_master b, pro_garments_production_mst c 
					where 
						a.job_no_mst=b.job_no and a.id=c.po_break_down_id and a.is_deleted=0 and a.status_active=1 and b.is_deleted=0 and b.status_active=1 and c.is_deleted=0 and c.status_active=1 $txt_date $company_name $buyer_name $garments_nature group by a.job_no_mst,a.po_number,b.total_set_qnty, b.job_no_prefix_num, b.buyer_name,b.style_ref_no ,b.company_name,c.po_break_down_id,c.item_number_id,c.production_source,c.location, c.production_date,c.sewing_line,c.floor_id,b.insert_date order by c.production_date");
						
					}
                    //echo $pro_date_sql;die;
 					foreach($pro_date_sql as $pro_date_sql_row)
                    {  
						if ($i%2==0) $bgcolor="#E9F3FF"; else $bgcolor="#FFFFFF";	
						
                    ?>
                    	<tr bgcolor="<? echo $bgcolor; ?>" onClick="change_color('tr_2nd<? echo $i; ?>','<? echo $bgcolor; ?>')" id="tr_2nd<? echo $i; ?>">
                            <td width="40"><? echo $i;?></td>
                            <td width="80"><p><? echo $company_short_library[$pro_date_sql_row[csf("company_name")]]; ?></p></td>
                            <td width="65" align="center"><p><? echo $pro_date_sql_row[csf("job_no_prefix_num")];?></p></td>
                            <td width="55" align="center"><p><? echo $pro_date_sql_row[csf("year")];?></p></td>
                            <td width="130"><p><a href="##" onClick="openmypage_order(<? echo $pro_date_sql_row[csf("po_break_down_id")];?>,<? echo $pro_date_sql_row[csf("item_number_id")]; ?>,'orderQnty_popup');" ><? echo $pro_date_sql_row[csf("po_number")]; ?></a></p></td>
                            <td width="70"><p><? echo $buyer_short_library[$pro_date_sql_row[csf("buyer_name")]]; ?></p></td>
                            <td width="130"><p><? echo $pro_date_sql_row[csf("style")]; ?></p></td>
                            <td width="130"><p><? echo $garments_item[$pro_date_sql_row[csf("item_number_id")]]; ?></p></td>
                            <td width="100" align="center"><p><? echo change_date_format($pro_date_sql_row[csf("production_date")]); ?></p></td>
                            <td width="100"><p><? echo $knitting_source[$pro_date_sql_row[csf("production_source")]]; ?></p></td>
                            <td width="100"><p><? echo $location_library[$pro_date_sql_row[csf("location")]]; ?></p></td>
                            <td width="100"><p><? echo $floor_library[$pro_date_sql_row[csf("floor_id")]]; ?></p></td>
                            <td width="100"><p><? echo $line_library[$pro_date_sql_row[csf("sewing_line")]]; ?></p></td>
                            <td width="80" align="right">
                            	<?
									echo $cutting_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['1'];  
									$total_cut+=$cutting_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['1'];
								?>
                            </td>
                            <td width="80" align="right">
                            	<?
									echo $printing_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['2'];  
									$total_print_iss+=$printing_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['2'];
								?>
                            </td>
                            <td width="80" align="right">
                            	<?
									echo $printreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['3'];  
									$total_print_re+=$printreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['3'];  
								?>
                            </td>
                            <td width="80" align="right">
								<?
									echo $emb_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['2']; 
									$total_emb_iss+=$emb_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['2'];
								?>
							</td>
                            <td width="80" align="right">
                            	<?
									echo $embreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['3'];   
									$total_emb_re+=$embreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['3'];  
								?>
                            </td>
                            <td width="80" align="right">
								<?
									echo $wash_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['2']; 
									$total_wash_iss+=$wash_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['2'];
								?>
							</td>
                            <td width="80" align="right">
                            	<?
									echo $washreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['3'];    
									$total_wash_re+=$washreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['3'];  
								?>
                            </td>
                            <td width="80" align="right">
								<?
									echo $sp_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['2'];  
									$total_sp_iss+=$sp_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['2'];
								?>
							</td>
                            <td width="80" align="right">
                            	<?
									echo $spreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['3'];    
									$total_sp_re+=$spreceived_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['3'];   
								?>
                            </td>
                            <td width="80" align="right"><a href="##" onClick="openmypage_sew_output(<? echo $pro_date_sql_row[csf("po_break_down_id")]; ?>,'<? echo $pro_date_sql_row[csf("production_date")]; ?>',<? echo $pro_date_sql_row[csf("item_number_id")];?>,'sewingQnty_input_popup');" >
                            	<?
									echo $sewingin_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['4'];  
									$total_sew_input+=$sewingin_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['4'];  
								?>
                                </a>
                            </td>
                            <td width="80" align="right"><a href="##" onClick="openmypage_sew_output(<? echo $pro_date_sql_row[csf("po_break_down_id")]; ?>,'<? echo $pro_date_sql_row[csf("production_date")]; ?>',<? echo $pro_date_sql_row[csf("item_number_id")];?>,'sewingQnty_popup');" >
                            	<?
									echo $sewingout_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['5'];  
									$total_sew_out+=$sewingout_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['5'];  
								?>
                                </a>
                            </td>
                            <td width="80" align="right">
                            	<?
									echo $iron_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['7'];  
									$total_iron+=$iron_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['7'];  
								?>
                            </td>
                            <td width="80" align="right">
                            	<?
									echo $re_iron_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['7'];  
									$total_re_iron+=$re_iron_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['7'];  
								?>
                            </td>
                            <td width="80" align="right">
                            	<?
									echo $finish_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['8'];  
									$total_finish+=$finish_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['8']; 
								?>
                            </td>
                            <td width="80" align="right">
                            	<?
									echo $carton_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]];  
									$total_carton+=$carton_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]; 
								?>
                            </td>
                            
                            <? $prod_dzn=$sewingout_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['5']/ 12 ; $total_prod_dzn+=$prod_dzn; ?>
                            <td width="80" align="right"><? if($prod_dzn!=0) echo number_format($prod_dzn,2); else echo "0"; ?></td>
 							<?
								$dzn_qnty=0; $cm_value=0; $cm_cost=0;
								if($costing_per_arr[$pro_date_sql_row[csf('job_no_mst')]]==1) $dzn_qnty=12;
								else if($costing_per_arr[$pro_date_sql_row[csf('job_no_mst')]]==3) $dzn_qnty=12*2;
								else if($costing_per_arr[$pro_date_sql_row[csf('job_no_mst')]]==4) $dzn_qnty=12*3;
								else if($costing_per_arr[$pro_date_sql_row[csf('job_no_mst')]]==5) $dzn_qnty=12*4;
								else $dzn_qnty=1;
								
								$dzn_qnty=$dzn_qnty*$pro_date_sql_row[csf('ratio')];
								$cm_value=($tot_cost_arr[$pro_date_sql_row[csf('job_no_mst')]]/$dzn_qnty)*$sewingout_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['5'];
								$total_cm_value+=$cm_value;
								$cm_cost=($tot_cm_cost_arr[$pro_date_sql_row[csf('job_no_mst')]]/$dzn_qnty)*$sewingout_array[$pro_date_sql_row[csf("po_break_down_id")]][$pro_date_sql_row[csf("production_date")]][$pro_date_sql_row[csf("location")]][$pro_date_sql_row[csf("floor_id")]][$pro_date_sql_row[csf("sewing_line")]]['5'];
								$total_cm_cost+=$cm_cost;
                            ?>
                            <td align="right" width="100"><? echo number_format($cm_value,2,'.',''); ?></td>
                            <td align="right" width="100"><? echo number_format($cm_cost,2,'.',''); ?></td>
                            <td width="">
                             <a href="##"  onclick="openmypage_remark(<? echo $pro_date_sql_row[csf("po_break_down_id")];?>,'date_wise_production_report');" > Veiw </a>
                            </td>
                   	 </tr>
						
						<?
					$i++;
					
				}//end foreach 1st
				
				?>
                </table>
                <table width="2800" cellspacing="0" border="1" class="rpt_table" rules="all" id="report_table_footer" >
                    <tfoot>
                        <tr>
                            <th width="40" align="right"></th>
                            <th width="80" align="right"></th>
                            <th width="65" align="right"></th>
                            <th width="55" align="right"></th>
                            <th width="130" align="right"></th>
                            <th width="70" align="right"></th>
                            <th width="130" align="right"></th>
                            <th width="130" align="right"></th>
                            <th width="100" align="right"></th>
                            <th width="100" align="right"></th>
                            <th width="100" align="right"></th>
                            <th width="100" align="right"></th> 
                            <th width="100" align="right">Total</th>
                            <th width="80" align="right" id="total_cut_td"><? echo $total_cut;?></th> 
                            <th width="80" align="right" id="total_printissue_td"><? echo $total_print_iss; ?> </th> 
                            <th width="80" align="right" id="total_printrcv_td"><?  echo $total_print_re;  ?>  </th>
                            <th width="80" align="right" id="total_emb_iss"><? echo $total_emb_iss; ?> </th> 
                            <th width="80" align="right" id="total_emb_re"><?  echo $total_emb_re;  ?>  </th>
                            <th width="80" align="right" id="total_wash_iss"><? echo $total_wash_iss; ?> </th> 
                            <th width="80" align="right" id="total_wash_re"><?  echo $total_wash_re;  ?>  </th>
                            <th width="80" align="right" id="total_sp_iss"><? echo $total_sp_iss; ?> </th> 
                            <th width="80" align="right" id="total_sp_re"><?  echo $total_sp_re;  ?>  </th>
                            <th width="80" align="right" id="total_sewin_td"><? echo $total_sew_input;  ?> </th> 
                            <th width="80" align="right" id="total_sewout_td"><? echo $total_sew_out;  ?> </th>
                            <th width="80" align="right" id="total_iron_td"><?  echo $total_iron; ?>  </th> 
                            <th width="80" align="right" id="total_re_iron_td"><?  echo $total_re_iron; ?>  </th> 
                            <th width="80" align="right" id="total_finish_td"><?  echo $total_finish; ?>  </th>   
                            <th width="80" align="right" id="total_carton_td"><? echo $total_carton; ?> </th> 
                            <th width="80" align="right" id="value_total_prod_dzn_td"><?  echo number_format($total_prod_dzn,2); ?> </th>
                            <th width="100" align="right" id="value_total_cm_value_td"><? echo number_format($total_cm_value,2); ?> </th>
                            <th width="100" align="right" id="value_total_cm_cost"><? echo number_format($total_cm_cost,2); ?> </th >
                            <th width="">&nbsp;</th>
                         </tr>
                     </tfoot>
                </table>
              </div>
  		</div>
  
<?

		}// end if condition of type
		
		//-------------------------------------------END Show Date Location Floor & Line Wise------------------------
		//---------end------------//
		
					
		$html = ob_get_contents();
		ob_clean();
		$new_link=create_delete_report_file( $html, 1, 1, "../../../" );
		
 		echo "$html";
		exit();	
 	
}


if($action=="orderQnty_popup")
{
	
	echo load_html_head_contents("Date Wise Production Report", "../../../", 1, 1,$unicode,'','');
 	extract($_REQUEST);
	
	$sql= "SELECT b.id,b.po_number,b.pub_shipment_date,b.po_quantity*(select from wo_po_details_mas_set_details set where set.job_no=a.job_no and set.gmts_item_id=$gmts_item_id) as po_quantity from wo_po_details_master a, wo_po_break_down b where a.job_no=b.job_no_mst and b.id='$po_break_down_id' and a.garments_nature='$garments_nature' and a.is_deleted=0 and a.status_active=1";
	//echo $sql;
	echo "<br />". create_list_view ( "list_view", "Order No,Order Qnty,Pub Shipment Date", "200,120,220","540","220",1, "SELECT b.id,b.po_number,b.pub_shipment_date,b.po_quantity*a.total_set_qnty as po_quantity from wo_po_details_master a, wo_po_break_down b where a.job_no=b.job_no_mst and b.id='$po_break_down_id' and a.is_deleted=0 and a.status_active=1", "", "","", 1, '0,0,0', $arr, "po_number,po_quantity,pub_shipment_date","../requires/date_wise_production_report_controller", '','0,1,3');
  		 
	exit();
}



if($action=='date_wise_production_report') 
{	
	extract($_REQUEST); 
 	echo load_html_head_contents("Remarks", "../../../", 1, 1,$unicode,'','');
 ?>
	<fieldset>
    <legend>Cutting</legend>
    	<? 
			 
			 $sql= "SELECT id,production_date,production_quantity,remarks from pro_garments_production_mst where po_break_down_id='$po_break_down_id' and production_type='1' and is_deleted=0 and status_active=1";
 			 //echo $sql;
			 echo  create_list_view ( "list_view_1", "Date,Production Qnty,Remarks", "100,120,280","500","220",1, $sql, "", "","", 1, '0,0,0', $arr, "production_date,production_quantity,remarks", "../requires/order_wise_production_report_controller", '','3,1,0');
			
 		?>
    </fieldset>
    
    <fieldset>
    <legend>Print/Embr Issue</legend>
    	<? 
			 
			  $sql= "SELECT production_date,production_quantity,remarks from pro_garments_production_mst where po_break_down_id='$po_break_down_id'  and production_type='2' and is_deleted=0 and status_active=1";
			  
			 echo  create_list_view ( "list_view_2", "Date,Production Qnty,Remarks", "100,120,280","500","220",1, $sql, "", "","", 1, '0,0,0', $arr, "production_date,production_quantity,remarks", "../requires/order_wise_production_report_controller", '','3,1,0');
		?>
    </fieldset>
    
    <fieldset>
    <legend>Print/Embr Receive</legend>
    	<? 
			 
			  $sql= "SELECT production_date,production_quantity,remarks from pro_garments_production_mst where po_break_down_id='$po_break_down_id'  and production_type='3' and is_deleted=0 and status_active=1";
			  
			 echo  create_list_view ( "list_view_3", "Date,Production Qnty,Remarks", "100,120,280","500","220",1, $sql, "", "","", 1, '0,0,0', $arr, "production_date,production_quantity,remarks", "../requires/order_wise_production_report_controller", '','3,1,0');
		?>
    </fieldset>
    
    
    <fieldset>
    <legend>Sewing Input</legend>
    	<? 
			 
			  $sql= "SELECT production_date,production_quantity,remarks from pro_garments_production_mst where po_break_down_id='$po_break_down_id'  and production_type='4' and is_deleted=0 and status_active=1";
			  
			 echo  create_list_view ( "list_view_4", "Date,Production Qnty,Remarks", "100,120,280","500","220",1, $sql, "", "","", 1, '0,0,0', $arr, "production_date,production_quantity,remarks", "../requires/order_wise_production_report_controller", '','3,1,0');
		?>
    </fieldset>
    
    
    <fieldset>
    <legend>Sewing Output</legend>
    	<? 
			 
			  $sql= "SELECT production_date,production_quantity,remarks from pro_garments_production_mst where po_break_down_id='$po_break_down_id'  and production_type='5' and is_deleted=0 and status_active=1";
			  
			 echo  create_list_view ( "list_view_5", "Date,Production Qnty,Remarks", "100,120,280","500","220",1, $sql, "", "","", 1, '0,0,0', $arr, "production_date,production_quantity,remarks", "../requires/order_wise_production_report_controller", '','3,1,0');
		?>
    </fieldset>
    
    
    <fieldset>
    <legend>Finish Input</legend>
    	<? 
			 
			  $sql= "SELECT production_date,production_quantity,remarks from pro_garments_production_mst where po_break_down_id='$po_break_down_id'  and production_type='6' and is_deleted=0 and status_active=1";
			  
			 echo  create_list_view ( "list_view_6", "Date,Production Qnty,Remarks", "100,120,280","500","220",1, $sql, "", "","", 1, '0,0,0', $arr, "production_date,production_quantity,remarks", "../requires/order_wise_production_report_controller", '','3,1,0');
		?>
    </fieldset>
    
    <fieldset>
    <legend>Finish Output</legend>
    	<? 
			 
			  $sql= "SELECT production_date,production_quantity,remarks from pro_garments_production_mst where po_break_down_id='$po_break_down_id'  and production_type='8' and is_deleted=0 and status_active=1";
			 
			  echo  create_list_view ( "list_view_7", "Date,Production Qnty,Remarks", "100,120,280","500","220",1, $sql, "", "","", 1, '0,0,0', $arr, "production_date,production_quantity,remarks", "../requires/order_wise_production_report_controller", '','3,1,0');
		?>
    </fieldset>
   
<?
}//end if 

if($action=="sewingQnty_popup")
{
	echo load_html_head_contents("Date Wise Production Report", "../../../", 1, 1,$unicode,'','');
 	extract($_REQUEST);
	$sizearr=return_library_array("select id,size_name from lib_size ","id","size_name");
	$colorarr=return_library_array("select id,color_name from  lib_color ","id","color_name");
	$country_library=return_library_array( "select id,country_name from  lib_country", "id", "country_name"  ); 
	$order_library=return_library_array( "select id,po_number from  wo_po_break_down", "id", "po_number"  ); 
	//var_dump();die;
	//LISTAGG(CAST(a.style_ref_no AS VARCHAR(4000)), ',') WITHIN GROUP (ORDER BY a.style_ref_no) as style_ref_no


	/*$sql= "SELECT sum(b.production_qnty) as production_qnty,c.color_number_id, c.size_number_id from pro_garments_production_mst a,  pro_garments_production_dtls b,  wo_po_color_size_breakdown c where a.production_type=5 and a.production_date='$production_date' and a.id=b.mst_id and a.po_break_down_id=c.po_break_down_id  and a.po_break_down_id='$po_break_down_id' and b.color_size_break_down_id=c.id and a.status_active=1 and a.is_deleted=0 and b.status_active=1 and b.is_deleted=0 and c.status_active=1 and c.is_deleted=0 group by  c.size_number_id,c.color_number_id";*/
	
	if($db_type==2)
	{
		$sql= "SELECT  a.challan_no, a.floor_id, a.sewing_line, a.country_id, a.production_hour, a.production_source, c.color_number_id, LISTAGG(CAST(c.size_number_id AS VARCHAR(4000)), ',') WITHIN GROUP (ORDER BY c.size_number_id) as size_number_id  from pro_garments_production_mst a,  pro_garments_production_dtls b,  wo_po_color_size_breakdown c where a.production_type=5 and a.production_date='$production_date' and a.id=b.mst_id and b.color_size_break_down_id=c.id  and a.po_break_down_id='$po_break_down_id' and a.status_active=1 and a.is_deleted=0 and b.status_active=1 and b.is_deleted=0 and c.status_active=1 and c.is_deleted=0 
		group by  a.country_id,a.challan_no, a.floor_id, a.sewing_line, a.production_hour, a.production_source,c.color_number_id";
	}
	else if($db_type==0)
	{
		$sql= "SELECT a.challan_no,a.floor_id, a.sewing_line,a.country_id,a.production_hour,a.production_source, c.color_number_id, group_concat(c.size_number_id) as size_number_id  from pro_garments_production_mst a,  pro_garments_production_dtls b,  wo_po_color_size_breakdown c where a.production_type=5 and a.production_date='$production_date' and a.id=b.mst_id and b.color_size_break_down_id=c.id  and a.po_break_down_id='$po_break_down_id' and a.status_active=1 and a.is_deleted=0 and b.status_active=1 and b.is_deleted=0 and c.status_active=1 and c.is_deleted=0
		group by  a.country_id,a.challan_no, a.floor_id, a.sewing_line, a.production_hour, a.production_source,c.color_number_id";
	}
	//echo $sql;die;
	
	
	//echo $sql; //and a.production_date='$production_date'
	$result=sql_select($sql);
	
	$sql_color_size= sql_select("SELECT a.challan_no,a.floor_id, a.sewing_line,a.country_id,a.production_hour,a.production_source, sum(b.production_qnty) as production_qnty, c.color_number_id, c.size_number_id from pro_garments_production_mst a,  pro_garments_production_dtls b,  wo_po_color_size_breakdown c where a.production_type=5 and a.production_date='$production_date' and a.id=b.mst_id and b.color_size_break_down_id=c.id  and a.po_break_down_id='$po_break_down_id' and a.status_active=1 and a.is_deleted=0 and b.status_active=1 and b.is_deleted=0 and c.status_active=1 and c.is_deleted=0 
	group by   a.country_id,a.challan_no, a.floor_id, a.sewing_line, a.production_hour, a.production_source,c.color_number_id,c.size_number_id");
	foreach($sql_color_size as $row)
	{
		$production_break_qnty[$row[csf('country_id')]][$row[csf('challan_no')]][$row[csf('floor_id')]][$row[csf('sewing_line')]][$row[csf('production_hour')]][$row[csf('production_source')]][$row[csf('color_number_id')]][$row[csf('size_number_id')]]=$row[csf('production_qnty')];
	}
	
	
/*	$size_array=array ();
	$qun_array=array ();
	foreach ( $result as $row )
	{
		$size_array[$row[csf('size_number_id')]]=$row[csf('size_number_id')];
		$qun_array[$row[csf('color_number_id')]][$row[csf('size_number_id')]]=$row[csf('production_qnty')];
	}
*/	
	//echo $sql; and a.production_date='$production_date'
/*	$result=sql_select($sql);
	$color_array=array ();
	foreach ( $result as $row )
	{
		$color_array[$row[csf('color_number_id')]]=$row[csf('color_number_id')];
	}
	
	
*/	

	$sizearr_order=return_library_array("select size_number_id,size_number_id from wo_po_color_size_breakdown where po_break_down_id=$po_break_down_id","size_number_id","size_number_id");
	$col_width=60*count($sizearr_order);
	$table_width=600+$col_width;


?>	
<script>

	function print_window()
	{
		document.getElementById('scroll_body').style.overflow="auto";
		document.getElementById('scroll_body').style.maxHeight="none";
		
		var w = window.open("Surprise", "#");
		var d = w.document.open();
		d.write ('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN""http://www.w3.org/TR/html4/strict.dtd">'+
	'<html><head><link rel="stylesheet" href="../../../css/style_common.css" type="text/css" media="print"/><title></title></head><body>'+document.getElementById('report_container').innerHTML+'</body</html>');
	
		d.close();
		document.getElementById('scroll_body').style.overflowY="auto";
		document.getElementById('scroll_body').style.maxHeight="none";
	}
	
	function window_close()
	{
		parent.emailwindow.hide();
	}
	
</script>	
<fieldset style="width:<? echo $table_width; ?>  margin-left:10px" >
    <div style="100%">
		<input type="button" value="Close" onClick="window_close()" style="width:100px; margin-left:400px;"  class="formbutton" /><br />
        <span style="font-size:14px; font-weight:bold;">Order No : <? echo $order_library[$po_break_down_id]; ?>&nbsp;&nbsp;&nbsp;&nbsp;Date : <? echo change_date_format($production_date); ?></span>
        <table cellpadding="0" cellspacing="0" class="rpt_table" rules="all" width="<? echo $table_width; ?>" align="center">
            <thead>
                <tr>
                	<th width="40" rowspan="2">SI</th>
                    <th width="70" rowspan="2">Challan</th>
                    <th width="40" rowspan="2">Sewing Unit</th>
                    <th width="40" rowspan="2">Sewing Line</th>
                    <th width="100" rowspan="2">Color</th>
                	<th width="<? echo $col_width; ?>" colspan="<? echo count($sizearr_order); ?>">Size</th>
                    <th width="86" rowspan="2">Total</th>
                    <th width="40" rowspan="2">Input Time</th>
                    <th width="100" rowspan="2">Country Name</th>
                    <th width="100" rowspan="2">Source</th>
                </tr>
                <tr>
                <?
				foreach($sizearr_order as $size_id)
				{
					?>
                	<th width="60"><? echo $sizearr[$size_id]; ?></th>
                    <?
				}
				?>
                </tr>
                
            </thead>
            <tbody>
            <?
			$i=1;
			//var_dump($result);die;
			foreach($result as $row)
			{
				
				?>
                <tr>
                    <td align="center"><? echo $i;  ?></td>
                    <td ><? echo $row[csf("challan_no")];  ?></td>
                    <td ><? echo $row[csf("floor_id")];  ?></td>
                    <td ><? echo $row[csf("sewing_line")];  ?></td>
                    <td ><? echo $colorarr[$row[csf("color_number_id")]];  ?></td>
                    <?
					$color_total=0;
                    foreach($sizearr_order as $size_id)
                    {
                        ?>
                        <td align="right"><? echo number_format($production_break_qnty[$row[csf('country_id')]][$row[csf('challan_no')]][$row[csf('floor_id')]][$row[csf('sewing_line')]][$row[csf('production_hour')]][$row[csf('production_source')]][$row[csf('color_number_id')]][$size_id],0) ; $color_total+= $production_break_qnty[$row[csf('country_id')]][$row[csf('challan_no')]][$row[csf('floor_id')]][$row[csf('sewing_line')]][$row[csf('production_hour')]][$row[csf('production_source')]][$row[csf('color_number_id')]][$size_id]; $size_total[$size_id] +=$production_break_qnty[$row[csf('country_id')]][$row[csf('challan_no')]][$row[csf('floor_id')]][$row[csf('sewing_line')]][$row[csf('production_hour')]][$row[csf('production_source')]][$row[csf('color_number_id')]][$size_id];?></td>
                        <?
                    }
                    ?>
                    <td align="right" style="padding-right:4px;"><? echo  number_format( $color_total,0); $grand_total+=  $color_total; ?></td>
                    <td ><? echo $row[csf("production_hour")];  ?></td>
                    <td ><? echo $country_library[$row[csf("country_id")]];  ?></td>
                    <td ><? echo $knitting_source[$row[csf("production_source")]]; ?></td>
                </tr>
                <?
			}
			?>
            </tbody>
            <tfoot>
            	<th >&nbsp;</th>
                <th>&nbsp;</th>
                <th >&nbsp;</th>
                <th >&nbsp;</th>
                <th >&nbsp;</th>
                 <?
				foreach($sizearr_order as $size_id)
				{
					?>
                	<th ><? echo number_format($size_total[$size_id],0); ?></th>
                    <?
				}
				?>
                <th><? echo number_format($grand_total,0); ?></th>
                <th >&nbsp;</th>
                <th >&nbsp;</th>
                <th >&nbsp;</th>
            </tfoot>
        </table>
        </div>
    </fieldset>
<?	
}

if($action=="sewingQnty_input_popup")
{
	echo load_html_head_contents("Date Wise Production Report", "../../../", 1, 1,$unicode,'','');
 	extract($_REQUEST);
	//echo $po_break_down_id;die;
	$sizearr=return_library_array("select id,size_name from lib_size ","id","size_name");
	$colorarr=return_library_array("select id,color_name from  lib_color ","id","color_name");
	$country_library=return_library_array( "select id,country_name from  lib_country", "id", "country_name"  ); 
	$order_library=return_library_array( "select id,po_number from  wo_po_break_down", "id", "po_number"  ); 
	$buyer_library=return_library_array( "select id,buyer_name from lib_buyer", "id", "buyer_name"  );
	$floor_library=return_library_array( "select id,floor_name from  lib_prod_floor", "id", "floor_name"  );
	$sewing_line_library=return_library_array( "select id,line_name from  lib_sewing_line", "id", "line_name"  );
	
	
	$sizearr_order=return_library_array("select size_number_id,size_number_id from wo_po_color_size_breakdown where po_break_down_id=$po_break_down_id","size_number_id","size_number_id");
	$buyer_library=return_library_array( "select id,buyer_name from lib_buyer", "id", "buyer_name"  );
	//var_dump();die;
	//LISTAGG(CAST(a.style_ref_no AS VARCHAR(4000)), ',') WITHIN GROUP (ORDER BY a.style_ref_no) as style_ref_no


	/*$sql= "SELECT sum(b.production_qnty) as production_qnty,c.color_number_id, c.size_number_id from pro_garments_production_mst a,  pro_garments_production_dtls b,  wo_po_color_size_breakdown c where a.production_type=5 and a.production_date='$production_date' and a.id=b.mst_id and a.po_break_down_id=c.po_break_down_id  and a.po_break_down_id='$po_break_down_id' and b.color_size_break_down_id=c.id and a.status_active=1 and a.is_deleted=0 and b.status_active=1 and b.is_deleted=0 and c.status_active=1 and c.is_deleted=0 group by  c.size_number_id,c.color_number_id";*/
	
	$po_details_sql=sql_select("select a.job_no, a.buyer_name, a.style_ref_no, a.gmts_item_id from wo_po_details_master a, wo_po_break_down b where a.job_no=b.job_no_mst and a.status_active=1 and a.is_deleted=0 and b.status_active=1 and b.id=$po_break_down_id group by a.job_no, a.buyer_name, a.style_ref_no, a.gmts_item_id");
	//echo $po_details_sql;die;
	
	if($db_type==2)
	{
		$sql= "SELECT  a.challan_no, a.floor_id, a.sewing_line, a.country_id, a.production_hour, a.production_source, c.color_number_id, LISTAGG(CAST(c.size_number_id AS VARCHAR(4000)), ',') WITHIN GROUP (ORDER BY c.size_number_id) as size_number_id  from pro_garments_production_mst a,  pro_garments_production_dtls b,  wo_po_color_size_breakdown c where a.production_type=4 and a.production_date='$production_date' and a.id=b.mst_id and b.color_size_break_down_id=c.id  and a.po_break_down_id='$po_break_down_id' and a.status_active=1 and a.is_deleted=0 and b.status_active=1 and b.is_deleted=0 and c.status_active=1 and c.is_deleted=0 
		group by  a.country_id,a.challan_no, a.floor_id, a.sewing_line, a.production_hour, a.production_source,c.color_number_id";
	}
	else if($db_type==0)
	{
		$sql= "SELECT a.challan_no,a.floor_id, a.sewing_line,a.country_id,a.production_hour,a.production_source, c.color_number_id, group_concat(c.size_number_id) as size_number_id  from pro_garments_production_mst a,  pro_garments_production_dtls b,  wo_po_color_size_breakdown c where a.production_type=4 and a.production_date='$production_date' and a.id=b.mst_id and b.color_size_break_down_id=c.id  and a.po_break_down_id='$po_break_down_id' and a.status_active=1 and a.is_deleted=0 and b.status_active=1 and b.is_deleted=0 and c.status_active=1 and c.is_deleted=0
		group by  a.country_id,a.challan_no, a.floor_id, a.sewing_line, a.production_hour, a.production_source,c.color_number_id";
	}
	//echo $sql;die;
	
	
	//echo $sql; //and a.production_date='$production_date'
	$result=sql_select($sql);
	
	$sql_color_size= sql_select("SELECT a.challan_no,a.floor_id, a.sewing_line,a.country_id,a.production_hour,a.production_source, sum(b.production_qnty) as production_qnty, c.color_number_id, c.size_number_id from pro_garments_production_mst a,  pro_garments_production_dtls b,  wo_po_color_size_breakdown c where a.production_type=4 and a.production_date='$production_date' and a.id=b.mst_id and b.color_size_break_down_id=c.id  and a.po_break_down_id='$po_break_down_id' and a.status_active=1 and a.is_deleted=0 and b.status_active=1 and b.is_deleted=0 and c.status_active=1 and c.is_deleted=0 
	group by   a.country_id,a.challan_no, a.floor_id, a.sewing_line, a.production_hour, a.production_source,c.color_number_id,c.size_number_id");
	foreach($sql_color_size as $row)
	{
		$production_break_qnty[$row[csf('country_id')]][$row[csf('challan_no')]][$row[csf('floor_id')]][$row[csf('sewing_line')]][$row[csf('production_hour')]][$row[csf('production_source')]][$row[csf('color_number_id')]][$row[csf('size_number_id')]] +=$row[csf('production_qnty')];
		$summery_data[$row[csf('color_number_id')]][$row[csf('size_number_id')]] +=$row[csf('production_qnty')];
	}
	
	
/*	$size_array=array ();
	$qun_array=array ();
	foreach ( $result as $row )
	{
		$size_array[$row[csf('size_number_id')]]=$row[csf('size_number_id')];
		$qun_array[$row[csf('color_number_id')]][$row[csf('size_number_id')]]=$row[csf('production_qnty')];
	}
*/	
	//echo $sql; and a.production_date='$production_date'
/*	$result=sql_select($sql);
	$color_array=array ();
	foreach ( $result as $row )
	{
		$color_array[$row[csf('color_number_id')]]=$row[csf('color_number_id')];
	}
	
	
*/	

	$col_width=60*count($sizearr_order);
	$table_width=600+$col_width;
	$summer_table_width=240+$col_width;


?>	
<script>

	function print_window()
	{
		document.getElementById('scroll_body').style.overflow="auto";
		document.getElementById('scroll_body').style.maxHeight="none";
		
		var w = window.open("Surprise", "#");
		var d = w.document.open();
		d.write ('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN""http://www.w3.org/TR/html4/strict.dtd">'+
	'<html><head><link rel="stylesheet" href="../../../css/style_common.css" type="text/css" media="print"/><title></title></head><body>'+document.getElementById('report_container').innerHTML+'</body</html>');
	
		d.close();
		document.getElementById('scroll_body').style.overflowY="auto";
		document.getElementById('scroll_body').style.maxHeight="none";
	}
	
	function window_close()
	{
		parent.emailwindow.hide();
	}
	
</script>	
<fieldset style="width:<? echo $table_width; ?>  margin-left:10px" >
    <div style="100%">
		<input type="button" value="Close" onClick="window_close()" style="width:100px; margin-left:400px;"  class="formbutton" /><br />
        <p style="font-size:14px; font-weight:bold;">Buyer Name : <? echo $buyer_library[$po_details_sql[0][csf("buyer_name")]]; ?>&nbsp;&nbsp;&nbsp;&nbsp; Job No : <? echo $po_details_sql[0][csf("job_no")]; ?>&nbsp;&nbsp;&nbsp;&nbsp; Style No : <? echo $po_details_sql[0][csf("style_ref_no")]; ?>&nbsp;&nbsp;&nbsp;&nbsp; Garments Item : 
		<?
			$item_data=""; 
			$garments_item_arr=array_unique(explode(",",$po_details_sql[0][csf("gmts_item_id")])); 
			foreach($garments_item_arr as $item_id)
			{
				if($item_data!="") $item_data .=", ";
				$item_data .=$garments_item[$item_id];
			}
			echo $item_data;
		?>
        </p>
        
        <p style="font-size:14px; font-weight:bold;">Order No : <? echo $order_library[$po_break_down_id]; ?>&nbsp;&nbsp;&nbsp;&nbsp;Date : <? echo change_date_format($production_date); ?></p>
        
        <p style="font-size:14px; font-weight:bold;">Summary</p>
        
        <table cellpadding="0" cellspacing="0" class="rpt_table" rules="all" width="<? echo $summer_table_width; ?>" align="center">
            <thead>
                <tr>
                	<th width="40" rowspan="2">SI</th>
                    <th width="100" rowspan="2">Color</th>
                	<th width="<? echo $col_width; ?>" colspan="<? echo count($sizearr_order); ?>">Size</th>
                    <th width="86" rowspan="2" >Total</th>
                </tr>
                <tr>
                <?
				foreach($sizearr_order as $size_id)
				{
					?>
                	<th width="60"><? echo $sizearr[$size_id]; ?></th>
                    <?
				}
				?>
                </tr>
                
            </thead>
            <tbody>
            <?
			$i=1;
			//var_dump($result);die;
			foreach($summery_data as $color_id=>$row)
			{
				
				?>
                <tr>
                    <td align="center"><? echo $i;  ?></td>
                    <td ><? echo $colorarr[$color_id];  ?></td>
                    <?
					$summry_color_total_in =0;
                    foreach($sizearr_order as $size_id)
                    {
                        ?>
                        <td align="right"><? echo number_format($production_break_qnty[$row[csf('country_id')]][$row[csf('challan_no')]][$row[csf('floor_id')]][$row[csf('sewing_line')]][$row[csf('production_hour')]][$row[csf('production_source')]][$row[csf('color_number_id')]][$size_id],0) ; $summry_color_total_in+= $production_break_qnty[$row[csf('country_id')]][$row[csf('challan_no')]][$row[csf('floor_id')]][$row[csf('sewing_line')]][$row[csf('production_hour')]][$row[csf('production_source')]][$row[csf('color_number_id')]][$size_id]; $summry_color_size_in [$size_id]+=$production_break_qnty[$row[csf('country_id')]][$row[csf('challan_no')]][$row[csf('floor_id')]][$row[csf('sewing_line')]][$row[csf('production_hour')]][$row[csf('production_source')]][$row[csf('color_number_id')]][$size_id];?></td>
                        <?
                    }
                    ?>
                    <td align="right" style="padding-right:4px;"><? echo  number_format( $summry_color_total_in,0); $grand_tot_in+=$summry_color_total_in; ?></td>
                </tr>
                <?
			}
			?>
            </tbody>
            <tfoot>
                <th >&nbsp;</th>
                <th >&nbsp;</th>
                <?
				foreach($sizearr_order as $size_id)
				{
					?>
                	<th ><? echo $summry_color_size_in[$size_id]; ?></th>
                    <?
				}
				?>
                <th ><? echo $grand_tot_in; ?></th>
                
            </tfoot>
        </table>
        <br />
        
        <p style="font-size:14px; font-weight:bold;">Details</p>
        <table cellpadding="0" cellspacing="0" class="rpt_table" rules="all" width="<? echo $table_width; ?>" align="center">
            <thead>
                <tr>
                	<th width="40" rowspan="2">SI</th>
                    <th width="100" rowspan="2">Country Name</th>
                    <th width="80" rowspan="2">Source</th>
                    <th width="70" rowspan="2">Challan</th>
                    <th width="60" rowspan="2">Sewing Unit</th>
                    <th width="40" rowspan="2">Sewing Line</th>
                    <th width="100" rowspan="2">Color</th>
                	<th width="<? echo $col_width; ?>" colspan="<? echo count($sizearr_order); ?>">Size</th>
                    <th width="86" rowspan="2" >Total</th>
                </tr>
                <tr>
                <?
				$grand_tot_in=0;
				foreach($sizearr_order as $size_id)
				{
					?>
                	<th width="60"><? echo $sizearr[$size_id]; ?></th>
                    <?
				}
				?>
                </tr>
                
            </thead>
            <tbody>
            <?
			$i=1;
			//var_dump($result);die;
			foreach($result as $row)
			{
				
				?>
                <tr>
                    <td align="center"><? echo $i;  ?></td>
                    <td ><p><? echo $country_library[$row[csf("country_id")]];  ?></p></td>
                    <td ><p><? echo $knitting_source[$row[csf("production_source")]]; ?><p></td>
                    <td ><p><? echo $row[csf("challan_no")];  ?></p></td>
                    <td ><p><? echo $floor_library[$row[csf("floor_id")]];  ?></p></td>
                    <td ><p><? echo $sewing_line_library[$row[csf("sewing_line")]];  ?></p></td>
                    <td ><p><? echo $colorarr[$row[csf("color_number_id")]];  ?></p></td>
                    <?
					$color_total_in=0;
                    foreach($sizearr_order as $size_id)
                    {
                        ?>
                        <td align="right"><p><? echo number_format($production_break_qnty[$row[csf('country_id')]][$row[csf('challan_no')]][$row[csf('floor_id')]][$row[csf('sewing_line')]][$row[csf('production_hour')]][$row[csf('production_source')]][$row[csf('color_number_id')]][$size_id],0) ; $color_total_in+= $production_break_qnty[$row[csf('country_id')]][$row[csf('challan_no')]][$row[csf('floor_id')]][$row[csf('sewing_line')]][$row[csf('production_hour')]][$row[csf('production_source')]][$row[csf('color_number_id')]][$size_id]; $color_size_in [$size_id]+=$production_break_qnty[$row[csf('country_id')]][$row[csf('challan_no')]][$row[csf('floor_id')]][$row[csf('sewing_line')]][$row[csf('production_hour')]][$row[csf('production_source')]][$row[csf('color_number_id')]][$size_id];?></p></td>
                        <?
                    }
                    ?>
                    <td align="right" style="padding-right:4px;"><p><? echo  number_format( $color_total_in,0); $grand_tot_in+=$color_total_in; ?></p></td>
                </tr>
                <?
			}
			?>
            </tbody>
            <tfoot>
                <th >&nbsp;</th>
                <th>&nbsp;</th>
                <th >&nbsp;</th>
                <th >&nbsp;</th>
                <th >&nbsp;</th>
                <th >&nbsp;</th>
                <th >&nbsp;</th>
                <?
				foreach($sizearr_order as $size_id)
				{
					?>
                	<th ><? echo $color_size_in[$size_id]; ?></th>
                    <?
				}
				?>
                <th ><? echo $grand_tot_in; ?></th>
                
            </tfoot>
        </table>
        </div>
    </fieldset>
<?	
}
?>