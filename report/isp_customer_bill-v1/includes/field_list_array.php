<?
//This function will return page wise array
function get_fieldlevel_arr( $index )
{
	global $fieldlevel_arr;
	$field_arr=array();
	foreach($fieldlevel_arr[$index] as $key=>$val)
	{
		$value=explode("_",$val);
		$i=0;
		$str='';
		foreach($value as $k=>$v)
		{
			if(count($value)==1){$str =" ".ucwords (str_replace(array('cbo','txt'),'',$v));}
			else if($i!=0)$str .=" ".ucwords ($v);

			$i++;
		}
		$field_arr[$key]= $str;
	}
	return $field_arr;
}

// ##RULES## array[entry_form][sequence] = "Field Name"; ##

$fieldlevel_arr[18][1]="cbo_sales_order"; //Knit Finish Fabric Issue
$fieldlevel_arr[18][2]="txt_issue_date"; //Knit Finish Fabric Issue

//$fieldlevel_arr[54][1]="cbo_is_sales"; //Finish Fabric Delivery to Store
$fieldlevel_arr[68][1]="cbo_is_sales"; //Finish Fabric Roll Receive by Store
//$fieldlevel_arr[70][1]="cbo_basis"; //yarn purchase requisition

$fieldlevel_arr[41][1]="txt_dyeing_charge"; // Yarn Dying with order

// Main Fabric Booking
$fieldlevel_arr[86][1]="cbo_company_name";
$fieldlevel_arr[86][2]="cbo_buyer_name";
$fieldlevel_arr[86][3]="txt_job_no";
$fieldlevel_arr[86][4]="txt_booking_no";
$fieldlevel_arr[86][5]="cbo_fabric_natu";
$fieldlevel_arr[86][6]="cbo_fabric_source";
//$fieldlevel_arr[86][7]="cbo_currency";
//$fieldlevel_arr[86][8]="txt_exchange_rate";
$fieldlevel_arr[86][9]="cbo_pay_mode";
$fieldlevel_arr[86][10]="txt_booking_date";
//$fieldlevel_arr[86][11]="cbo_booking_month";
$fieldlevel_arr[86][12]="cbo_supplier_name";
$fieldlevel_arr[86][13]="cbo_supplier_name";
//$fieldlevel_arr[86][14]="txt_attention";
$fieldlevel_arr[86][15]="txt_delivery_date";
//$fieldlevel_arr[86][16]="cbo_source";
//$fieldlevel_arr[86][17]="cbo_booking_year";
//$fieldlevel_arr[86][18]="txt_booking_percent";
//$fieldlevel_arr[86][19]="txt_colar_excess_percent";
//$fieldlevel_arr[86][20]="txt_cuff_excess_percent";
//$fieldlevel_arr[86][21]="cbo_ready_to_approved";
$fieldlevel_arr[86][22]="processloss_breck_down";
//$fieldlevel_arr[86][23]="txt_fabriccomposition";
//$fieldlevel_arr[86][24]="txt_intarnal_ref";
//$fieldlevel_arr[86][25]="txt_file_no";


// Short Fabric Booking
//$fieldlevel_arr[88][1]="txt_order_no_id";
//$fieldlevel_arr[88][2]="cbo_company_name";
//$fieldlevel_arr[88][3]="cbo_buyer_name";
//$fieldlevel_arr[88][4]="txt_job_no";
//$fieldlevel_arr[88][5]="txt_booking_no";
//$fieldlevel_arr[88][6]="cbo_fabric_natu";
//$fieldlevel_arr[88][7]="cbo_fabric_source";
//$fieldlevel_arr[88][8]="cbo_currency";
//$fieldlevel_arr[88][9]="txt_exchange_rate";
//$fieldlevel_arr[88][10]="cbo_pay_mode";
//$fieldlevel_arr[88][11]="txt_booking_date";
//$fieldlevel_arr[88][12]="cbo_booking_month";
//$fieldlevel_arr[88][13]="cbo_supplier_name";
//$fieldlevel_arr[88][14]="txt_attention";
//$fieldlevel_arr[88][15]="txt_delivery_date";
//$fieldlevel_arr[88][16]="cbo_source";
//$fieldlevel_arr[88][17]="cbo_booking_year";
//$fieldlevel_arr[88][18]="cbo_ready_to_approved";
//$fieldlevel_arr[88][19]="cbo_order_id";
//$fieldlevel_arr[88][20]="cbo_fabricdescription_id";
$fieldlevel_arr[88][21]="cbo_fabriccolor_id";
//$fieldlevel_arr[88][22]="cbo_garmentscolor_id";
//$fieldlevel_arr[88][23]="txt_process_loss";
//$fieldlevel_arr[88][24]="txt_grey_qnty";
//$fieldlevel_arr[88][25]="txt_rate";
//$fieldlevel_arr[88][26]="txt_amount";
//$fieldlevel_arr[88][27]="txt_rmg_qty";
//$fieldlevel_arr[88][28]="cbo_responsible_dept";
//$fieldlevel_arr[88][29]="cbo_responsible_person";
//$fieldlevel_arr[88][30]="txt_reason";
//$fieldlevel_arr[88][31]="cbo_short_booking_type";



$fieldlevel_arr[89][1]="txt_order_no_id";
$fieldlevel_arr[89][2]="cbo_company_name";
$fieldlevel_arr[89][3]="cbo_buyer_name";
$fieldlevel_arr[89][4]="txt_job_no";
$fieldlevel_arr[89][5]="txt_booking_no";
$fieldlevel_arr[89][6]="cbo_fabric_natu";
$fieldlevel_arr[89][7]="cbo_fabric_source";
$fieldlevel_arr[89][8]="cbo_currency";
$fieldlevel_arr[89][9]="txt_exchange_rate";
$fieldlevel_arr[89][10]="cbo_pay_mode";
$fieldlevel_arr[89][11]="txt_booking_date";
$fieldlevel_arr[89][12]="cbo_booking_month";
$fieldlevel_arr[89][13]="cbo_supplier_name";
$fieldlevel_arr[89][14]="txt_attention";
$fieldlevel_arr[89][15]="txt_delivery_date";
$fieldlevel_arr[89][16]="cbo_source";
$fieldlevel_arr[89][17]="cbo_booking_year";
$fieldlevel_arr[89][18]="cbo_ready_to_approved";
$fieldlevel_arr[89][19]="cbo_ready_to_approved";


//Sample Fabric Booking -With order
$fieldlevel_arr[89][20]="cbo_order_id";
$fieldlevel_arr[89][21]="cbo_fabricdescription_id";
$fieldlevel_arr[89][22]="cbo_sample_type";
$fieldlevel_arr[89][23]="cbo_fabriccolor_id";
$fieldlevel_arr[89][24]="cbo_garmentscolor_id";
$fieldlevel_arr[89][25]="cbo_itemsize_id";
$fieldlevel_arr[89][26]="cbo_garmentssize_id";
$fieldlevel_arr[89][27]="txt_dia_width";
$fieldlevel_arr[89][28]="txt_finish_qnty";
$fieldlevel_arr[89][29]="txt_process_loss";
$fieldlevel_arr[89][30]="txt_grey_qnty";
$fieldlevel_arr[89][31]="txt_rate";
$fieldlevel_arr[89][32]="txt_amount";


// Sample Fabric Booking -Without order
$fieldlevel_arr[90][1]="cbo_company_name";
$fieldlevel_arr[90][2]="cbo_buyer_name";
$fieldlevel_arr[90][3]="txt_booking_no";
$fieldlevel_arr[90][4]="cbo_fabric_natu";
$fieldlevel_arr[90][5]="cbo_fabric_source";
$fieldlevel_arr[90][6]="cbo_currency";
//$fieldlevel_arr[90][7]="txt_exchange_rate";
$fieldlevel_arr[90][8]="cbo_pay_mode";
$fieldlevel_arr[90][9]="txt_booking_date";
$fieldlevel_arr[90][10]="cbo_supplier_name";
$fieldlevel_arr[90][11]="txt_attention";
$fieldlevel_arr[90][12]="txt_delivery_date";
$fieldlevel_arr[90][13]="cbo_source";
$fieldlevel_arr[90][14]="cbo_ready_to_approved";
$fieldlevel_arr[90][15]="cbo_team_leader";
$fieldlevel_arr[90][16]="cbo_dealing_merchant";
$fieldlevel_arr[90][17]="cbo_body_part";
$fieldlevel_arr[90][18]="cbo_color_type";
$fieldlevel_arr[90][19]="txt_style";
$fieldlevel_arr[90][20]="txt_style_des";
$fieldlevel_arr[90][21]="cbo_sample_type";
$fieldlevel_arr[90][22]="txt_fabricdescription";
$fieldlevel_arr[90][23]="txt_gsm";
$fieldlevel_arr[90][24]="txt_gmt_color";
$fieldlevel_arr[90][25]="cbo_itemsize_id";
$fieldlevel_arr[90][26]="txt_color";
$fieldlevel_arr[90][27]="txt_gmts_size";
$fieldlevel_arr[90][28]="txt_size";
$fieldlevel_arr[90][29]="txt_dia_width";
$fieldlevel_arr[90][30]="txt_finish_qnty";
$fieldlevel_arr[90][31]="txt_process_loss";
$fieldlevel_arr[90][32]="txt_grey_qnty";
$fieldlevel_arr[90][33]="txt_rate";
$fieldlevel_arr[90][34]="txt_amount";
$fieldlevel_arr[90][35]="txt_article_no";
$fieldlevel_arr[90][36]="txt_yarn_details";
$fieldlevel_arr[90][37]="txt_remarks";
$fieldlevel_arr[90][38]="cbo_body_type";
$fieldlevel_arr[90][39]="txt_item_qty";
$fieldlevel_arr[90][40]="txt_knitting_charge";
$fieldlevel_arr[90][41]="txt_bh_qty";
$fieldlevel_arr[90][42]="txt_rf_qty";


//94 = Yarn Service Work Order
$fieldlevel_arr[94][1]="cbo_is_sales_order";

$fieldlevel_arr[96][1]="cbo_working_company_name"; //Bundle Wise Sewing Input

//98 = Knitting Production page....................................
$fieldlevel_arr[98][1]='txt_recieved_id';
$fieldlevel_arr[98][2]='cbo_company_id';
$fieldlevel_arr[98][3]='cbo_receive_basis';
$fieldlevel_arr[98][4]='txt_receive_date';
$fieldlevel_arr[98][5]='txt_receive_chal_no';
$fieldlevel_arr[98][6]='txt_booking_no_id';
$fieldlevel_arr[98][7]='txt_booking_no';
$fieldlevel_arr[98][8]='cbo_store_name';
$fieldlevel_arr[98][9]='cbo_knitting_source';
$fieldlevel_arr[98][10]='cbo_knitting_company';
$fieldlevel_arr[98][11]='cbo_location_name';
$fieldlevel_arr[98][12]='txt_yarn_issue_challan_no';
$fieldlevel_arr[98][13]='cbo_buyer_name';
$fieldlevel_arr[98][14]='txt_yarn_issued';
$fieldlevel_arr[98][15]='cbo_body_part';
$fieldlevel_arr[98][16]='txt_fabric_description';
$fieldlevel_arr[98][17]='fabric_desc_id';
$fieldlevel_arr[98][18]='txt_gsm';
$fieldlevel_arr[98][19]='txt_width';
$fieldlevel_arr[98][20]='cbo_floor_id';
$fieldlevel_arr[98][21]='cbo_machine_name';
$fieldlevel_arr[98][22]='txt_roll_no';
$fieldlevel_arr[98][23]='txt_remarks';
$fieldlevel_arr[98][24]='txt_receive_qnty';
$fieldlevel_arr[98][25]='txt_room';
$fieldlevel_arr[98][26]='txt_reject_fabric_recv_qnty';
$fieldlevel_arr[98][27]='txt_shift_name';
$fieldlevel_arr[98][28]='txt_rack';
$fieldlevel_arr[98][29]='cbo_uom';
$fieldlevel_arr[98][30]='txt_self';
$fieldlevel_arr[98][31]='txt_yarn_lot';
$fieldlevel_arr[98][32]='txt_binbox';
$fieldlevel_arr[98][33]='cbo_yarn_count';
$fieldlevel_arr[98][34]='txt_brand';
$fieldlevel_arr[98][35]='txt_color';
$fieldlevel_arr[98][36]='cbo_color_range';
$fieldlevel_arr[98][37]='txt_stitch_length';
$fieldlevel_arr[98][38]='txt_machine_dia';
$fieldlevel_arr[98][49]='txt_machine_gg';
$fieldlevel_arr[98][40]='fabric_store_auto_update';
$fieldlevel_arr[98][41]='knitting_charge_string';
$fieldlevel_arr[98][42]='cbo_sales_order';

//Pro Forma Invoice
$fieldlevel_arr[104][1]="cbo_goods_rcv_status"; //Goods Rcv Status
//Export LC Entry
$fieldlevel_arr[106][1]="cbo_export_item_category"; //Export Item Category
//Sales Contract Enty
$fieldlevel_arr[107][1]="cbo_export_item_category"; //Export Item Category
//Partial Fabric Booking
$fieldlevel_arr[108][1]="cbouom"; //UOM
$fieldlevel_arr[108][2]="cbo_fabric_source"; //Fabric Source
$fieldlevel_arr[108][3]="cbo_pay_mode"; //Pay Mode 
$fieldlevel_arr[108][4]="cbo_fabric_natu";
$fieldlevel_arr[108][5]="txt_delivery_date"; //check tna
$fieldlevel_arr[108][6]="cbo_source"; //check Source

//woven partial fabric Booking
$fieldlevel_arr[271][1]="cbouom"; //UOM
$fieldlevel_arr[271][2]="cbo_fabric_source"; //Fabric Source
$fieldlevel_arr[271][3]="cbo_pay_mode"; //Pay Mode
$fieldlevel_arr[271][4]="cbo_fabric_natu";
$fieldlevel_arr[271][5]="txt_delivery_date"; //check tna
$fieldlevel_arr[271][6]="cbo_source"; //check Source

$fieldlevel_arr[109][1]="cbo_company_id";//Fabriic Sales Order Entry

// Pre-Costing
//$fieldlevel_arr[111][1]="txt_common_oh_pre_cost"; 
//$fieldlevel_arr[111][2]="txt_depr_amor_pre_cost";

//Main fabric booking v2
$fieldlevel_arr[118][1]="cbo_pay_mode"; //pay mode
$fieldlevel_arr[118][2]="txt_delivery_date";

$fieldlevel_arr[3][1]="cbo_sales_order"; // Yarn Requisition Search Form Field //txt_issue_date
//$fieldlevel_arr[3][2]="txt_issue_date"; // Yarn Issue
//$fieldlevel_arr[1][1]="txt_receive_date"; // Yarn Recv

$fieldlevel_arr[120][1]="cbo_within_group"; // Yarn Requisition Entry For Sales Pop up Within Group Field
$fieldlevel_arr[121][1]="cbo_produced_by"; // Cutting Entry

$fieldlevel_arr[122][1]="txt_Sewing_SMV"; //Order Update Entry
$fieldlevel_arr[122][2]="txt_Cutting_SMV"; //Order Update Entry
$fieldlevel_arr[122][3]="txt_Finish_SMV"; //Order Update Entry

//$fieldlevel_arr[122][4]="txt_excess_cut"; //Order Update Entry
$fieldlevel_arr[122][5]="cbo_order_status";
$fieldlevel_arr[122][6]="txt_po_no";
$fieldlevel_arr[122][7]="txt_pub_shipment_date";
$fieldlevel_arr[122][8]="txt_org_shipment_date";
//$fieldlevel_arr[122][9]="txt_extended_ship_date";

// Fabric Requisition For Batch 2
$fieldlevel_arr[123][1]="cbo_search_by"; //Order Update Entry

//pre costing v2
$fieldlevel_arr[158][1]="cbo_fabric_costing_uom"; //uom fabric cost part
$fieldlevel_arr[158][2]="cbo_fabric_costing_fab_nature"; //Fab Nature fabric cost part


//Poly Entry
$fieldlevel_arr[164][1]="cbo_floor"; //sew.floor
// $fieldlevel_arr[164][2]="cbo_finishing_floor"; //fini.floor
$fieldlevel_arr[164][3]="cbo_color_type";

//Yarn Count Determination
$fieldlevel_arr[184][1]="cbo_fabric_nature"; //cbofabricnature

//Knitting Bill Issue
$fieldlevel_arr[186][1]="cbo_party_source"; //cbo_party_source


//Garments Delivery Entry
$fieldlevel_arr[198][1]="shipping_status";
$fieldlevel_arr[198][2]="txt_ex_factory_date";

//Grey Fabric Roll Issue
$fieldlevel_arr[61][1]="cbo_dyeing_source";

//Garments Delivery Entry
$fieldlevel_arr[62][1]="txt_delivery_date";

//Purchase Requisition
$fieldlevel_arr[69][1]="txt_date_from";
$fieldlevel_arr[69][2]="cbo_pay_mode";
$fieldlevel_arr[69][3]="cbo_currency_name";

//General Item Receive Return
$fieldlevel_arr[26][1]="txt_return_date";

//General Item Issue Return
$fieldlevel_arr[27][1]="txt_return_date";

//General Item Issue
//$fieldlevel_arr[21][1]="txt_issue_date";

//Others Purchase Order
$fieldlevel_arr[103][1]="txt_wo_date";

//General Item Receive
$fieldlevel_arr[20][1]="txt_receive_date";

//Gate pass entry
$fieldlevel_arr[251][1]="cbo_roll_by";
$fieldlevel_arr[251][2]="cbo_issue_purpose";
$fieldlevel_arr[251][3]="cbo_returnable";
//Export Invoice
$fieldlevel_arr[270][1]="shipping_mode";
//Planning Info Entry For Sales Order
$fieldlevel_arr[282][1]="cbo_within_group"; //Within Group


//Price Quotation
//$fieldlevel_arr[314][1]="txt_common_oh_pre_cost";
//$fieldlevel_arr[314][2]="txt_income_tax_pre_cost";
$fieldlevel_arr[314][3]="cbo_costing_per";


//Singeing
//$fieldlevel_arr[47][1]="txt_process_date";
//$fieldlevel_arr[47][2]="txt_end_hours";
//$fieldlevel_arr[47][3]="txt_end_minutes";


// Stentering
//$fieldlevel_arr[48][1]="txt_process_date";
//$fieldlevel_arr[48][2]="txt_end_hours";
//$fieldlevel_arr[48][3]="txt_end_minutes";


//Slitting/Squeezing
//$fieldlevel_arr[30][1]="txt_process_date";
//$fieldlevel_arr[30][2]="txt_end_hours";
//$fieldlevel_arr[30][3]="txt_end_minutes";

// Drying
//$fieldlevel_arr[31][1]="txt_process_date";
//$fieldlevel_arr[31][2]="txt_end_hours";
//$fieldlevel_arr[31][3]="txt_end_minutes";

// Compacting
//$fieldlevel_arr[33][1]="txt_process_date";
//$fieldlevel_arr[33][2]="txt_end_hours";
//$fieldlevel_arr[33][3]="txt_end_minutes";

// 	Embellishment Work Order V2
//$fieldlevel_arr[161][1]="calculation_basis";

$fieldlevel_arr[43][1]="cbo_pay_mode";

//Woven short fabric booking
$fieldlevel_arr[275][1]="txt_order_no_id";
$fieldlevel_arr[275][2]="cbo_company_name";
//$fieldlevel_arr[275][3]="cbo_buyer_name";
//$fieldlevel_arr[275][4]="txt_job_no";
//$fieldlevel_arr[275][5]="txt_booking_no";
$fieldlevel_arr[275][6]="cbo_fabric_natu";
$fieldlevel_arr[275][7]="cbo_fabric_source";
$fieldlevel_arr[275][8]="cbo_currency";
//$fieldlevel_arr[275][9]="txt_exchange_rate";
$fieldlevel_arr[275][10]="cbo_pay_mode";
$fieldlevel_arr[275][11]="txt_booking_date";
$fieldlevel_arr[275][12]="cbo_booking_month";
$fieldlevel_arr[275][13]="cbo_supplier_name";
$fieldlevel_arr[275][14]="txt_attention";
$fieldlevel_arr[275][15]="txt_delivery_date";
$fieldlevel_arr[275][16]="cbo_source";
$fieldlevel_arr[275][17]="cbo_booking_year";
$fieldlevel_arr[275][18]="cbo_ready_to_approved";

$fieldlevel_arr[275][19]="cbo_order_id";
$fieldlevel_arr[275][20]="cbo_fabricdescription_id";
$fieldlevel_arr[275][21]="cbo_fabriccolor_id";
$fieldlevel_arr[275][22]="cbo_garmentscolor_id";
$fieldlevel_arr[275][23]="txt_process_loss";
$fieldlevel_arr[275][24]="txt_grey_qnty";
$fieldlevel_arr[275][25]="txt_rate";
$fieldlevel_arr[275][26]="txt_amount";
$fieldlevel_arr[275][27]="txt_rmg_qty";
$fieldlevel_arr[275][28]="cbo_responsible_dept";
$fieldlevel_arr[275][29]="cbo_responsible_person";
$fieldlevel_arr[275][30]="txt_reason";
$fieldlevel_arr[275][31]="cbo_short_booking_type";


$fieldlevel_arr[22][1]="txt_receive_date";  // knit gray fabric receive

$fieldlevel_arr[16][1]="txt_issue_date";  // knit gray fabric Issue

$fieldlevel_arr[225][1]="txt_receive_date";  // Knit Finish Fabric Receive By Garments

$fieldlevel_arr[24][1]="txt_receive_date";  // Trims Receive

$fieldlevel_arr[25][1]="txt_issue_date";  // Trims Issue 

$fieldlevel_arr[350][1]="txt_receive_date";  // Trims Receive Entry Multi Ref.
$fieldlevel_arr[163][1]="txt_file_no";  // Order entry
$fieldlevel_arr[163][2]="txt_sc_lc"; // Order entry

$fieldlevel_arr[351][1]="txt_grouping"; // Order Entry By Matrix Woven.


// Dyeing Production.
$fieldlevel_arr[35][1]="txt_process_start_date"; 
$fieldlevel_arr[35][2]="txt_start_hours"; 
$fieldlevel_arr[35][3]="txt_start_minutes";
//$fieldlevel_arr[35][4]="txt_process_date";
//$fieldlevel_arr[35][5]="txt_end_hours";
//$fieldlevel_arr[35][6]="txt_end_minutes";
?>