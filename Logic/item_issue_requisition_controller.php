<?
header('Content-type:text/html; charset=utf-8');
session_start();
if ($_SESSION['logic_erp']['user_id'] == "") header("location:login.php");
include('../../includes/common.php');
$data = $_REQUEST['data'];
$action = $_REQUEST['action'];
$user_id=$_SESSION['logic_erp']['user_id'];

foreach($general_item_category as $item_id=>$item_name)
{
	$all_general_item_id.=$item_id.",";
}
$all_general_item_id=chop($all_general_item_id,",");
//echo $all_general_item_id;die;

$company_arr = return_library_array("select id, company_name from lib_company", 'id', 'company_name');


if ($action == "load_drop_down_location") {
	echo create_drop_down("cbo_location_name", 145, "select id,location_name from lib_location where company_id=$data and is_deleted=0  and status_active=1", "id,location_name", 1, "-- Select --", $selected, "");
	exit();
}

//load_drop_down( 'requires/item_issue_requisition_controller', this.value, 'load_drop_down_division','division_td');
if ($action == "load_drop_down_location_popup") {
	echo create_drop_down("cbo_location_name", 90, "select id,location_name from lib_location where company_id=$data and is_deleted=0  and status_active=1", "id,location_name", 1, "-- Select --", $selected, "");
	exit();
}
//load_drop_down( 'item_issue_requisition_controller', this.value, 'load_drop_down_division_popup','division_td');
if ($action == "load_drop_down_division") {
	echo create_drop_down("cbo_division_name", 145, "select id,division_name from lib_division where company_id=$data and is_deleted=0  and status_active=1", "id,division_name", 1, "-- Select --", $selected, "load_drop_down( 'requires/item_issue_requisition_controller', this.value, 'load_drop_down_department','department_td');");
}

if ($action == "load_drop_down_division_popup") {
	echo create_drop_down("cbo_division_name", 90, "select id,division_name from lib_division where company_id=$data and is_deleted=0  and status_active=1", "id,division_name", 1, "-- Select --", $selected, "load_drop_down( 'item_issue_requisition_controller', this.value, 'load_drop_down_department_popup','department_td');");
	exit();
}


if ($action == "load_drop_down_department") {
	echo create_drop_down("cbo_department_name", 145, "select id,department_name from lib_department where division_id=$data and is_deleted=0 and status_active=1", "id,department_name", 1, "-- Select --", $selected, "load_drop_down( 'requires/item_issue_requisition_controller', this.value, 'load_drop_down_section','section_td');");
	exit();
}


if ($action == "load_drop_down_department_popup") {
	echo create_drop_down("cbo_department_name", 90, "select id,department_name from lib_department where division_id=$data and is_deleted=0 and status_active=1", "id,department_name", 1, "-- Select --", $selected, "load_drop_down( 'item_issue_requisition_controller', this.value, 'load_drop_down_section_popup','section_td');");
	exit();
}


if ($action == "load_drop_down_section_popup") {
	echo create_drop_down("cbo_section_name", 90, "select id,section_name from lib_section where department_id=$data and is_deleted=0 and status_active=1", "id,section_name", 1, "-- Select --", $selected, "load_drop_down( 'item_issue_requisition_controller', this.value, 'load_drop_down_sub_section_popup','sub_section_td');");
	exit();
}

if ($action == "load_drop_down_sub_section_popup") {
	$array = array(0 => "None");
	echo create_drop_down("cbo_sub_section_name", 90, $array, "", 1, "-- Select --", 1);
	exit();
}


if ($action == "load_drop_down_section") {
	echo create_drop_down("cbo_section_name", 145, "select id,section_name from lib_section where department_id=$data and is_deleted=0 and status_active=1", "id,section_name", 1, "-- Select --", $selected, "load_drop_down( 'requires/item_issue_requisition_controller', this.value, 'load_drop_down_sub_section','sub_section_td');");
	exit();
}

if ($action == "load_drop_down_sub_section") {
	//echo "jahid";die;
	//$array=array(1=>"None");
	echo create_drop_down("cbo_sub_section_name", 145, $array, "", 1, "-- Select --", 1);
	exit();
	//echo create_drop_down( "cbo_sub_section_name", 145,"select id,section_name from lib_section where department_id=$data and is_deleted=0 and status_active=1","id,section_name", 1, "-- Select --", $selected, "" );

}


if ($action == "item_issue_requisition_popup_search") {
	echo load_html_head_contents("Item Issue Requisition search From", "../../", 1, 1, '', '1', '');
	extract($_REQUEST);

	?>
    <script>

        function hidden_item_value(id) {
            $('#hidden_item_issue_id').val(id);
            parent.emailwindow.hide();
        }

        function item_issue_requisition_popup() {

            if (form_validation('cbo_company_id', 'Company') == false) {
                alert('Pls, Select Company.');
                return;
            }
            show_list_view(document.getElementById('cbo_company_id').value + '**' + document.getElementById('txt_indent_date').value + '**' + document.getElementById('txt_required_date').value + '**' + document.getElementById('cbo_location_name').value + '**' + document.getElementById('cbo_division_name').value + '**' + document.getElementById('cbo_department_name').value + '**' + document.getElementById('cbo_section_name').value + '**' + document.getElementById('cbo_sub_section_name').value + '**' + document.getElementById('cbo_delivery_point').value + '**' + document.getElementById('txt_system_id').value, 'items_search_list_view', 'search_div', 'item_issue_requisition_controller', 'setFilterGrid(\'list_view\',-1)');
        }
        function fnc_sub_section() {
            $('#cbo_sub_section_name').css('display', 'none');
        }
    </script>
    </head>
    <body>
    <div align="center" style="width:800px;">
        <form name="searchitemreqfrm" id="searchitemreqfrm">
            <fieldset style="width:800px; margin-left:3px">
                <legend>Search</legend>
                <table cellpadding="0" cellspacing="0" width="20%" class="rpt_table" rules="all">
                    <thead>
                    <th class="must_entry_caption">Company</th>
                    <th>Indent No.</th>
                    <th>Indent Date</th>
                    <th align="right">Required Date</th>
                    <th align="right">Location</th>
                    <th align="right">Division</th>
                    <th align="right">Department</th>
                    <th align="right">Section</th>
                    <th align="right">Sub Section</th>
                    <th align="right">Delivery Point</th>
                    <th><input type="reset" name="reset" id="reset" value="Reset" style="width:100px"
                               class="formbutton"/><input type="hidden" name="id_field" id="id_field" value=""/></th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
							<?

							$company = "select comp.id,comp.company_name from lib_company comp where  comp.status_active=1 and comp.is_deleted=0  order by company_name";
							echo create_drop_down("cbo_company_id", 144, $company, "id,company_name", 1, "--select--", $cbo_company_name, "load_drop_down( 'item_issue_requisition_controller', this.value, 'load_drop_down_location_popup','location_td');");

							?>
                        </td>
                        <td><input type="text" name="txt_system_id" id="txt_system_id" class="text_boxes"  style="width:70px"></td>
                        <td><input type="text" name="txt_indent_date" id="txt_indent_date" class="datepicker" style="width:70px"></td>
                        <td><input type="text" name="txt_required_date" id="txt_required_date" class="datepicker" style="width:70px" readonly></td>
                        <td id="location_td">
							<?php
							echo create_drop_down("cbo_location_name", 90, $blank_array, "id,location_name", 1, "-- Select --", 0, "");
							?>
                        </td>
                        <td id="division_td" width="90">
							<?php
							echo create_drop_down("cbo_division_name", 90, $blank_array, "", 1, "-- Select --");
							?>
                        </td>
                        <td width="70" id="department_td">
							<?php
							echo create_drop_down("cbo_department_name", 90, $blank_array, "", 1, "-- Select --");
							?>
                        </td>
                        <td id="section_td" width="132">
							<?
							echo create_drop_down("cbo_section_name", 90, $blank_array, "", 1, "-- Select --", '');
							?>
                        </td>
                        <td id="sub_section_td" width="90">
							<?php
							echo create_drop_down("cbo_sub_section_name", 90, $blank_array, "", 1, "-- Select --");
							?>
                        </td>
                        <td><input type="text" name="cbo_delivery_point" id="cbo_delivery_point" style="width:90px"
                                   class="text_boxes"></td>
                        <td><input type="hidden" id="hidden_item_issue_id"/>
                            <input type="button" id="search_button" class="formbutton" value="Show"
                                   onClick="item_issue_requisition_popup()" style="width:100px;"/>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div style="width:100%; margin-top:10px;" id="search_div" align="center"></div>
            </fieldset>
        </form>
    </div>
    </body>
    <script src="../../includes/functions_bottom.js" type="text/javascript"></script>
    </html>

	<?
	exit();

}

if ($action == "items_search_list_view") {
	$data = explode('**', $data);
	$delivery = $data[8];
	$indent_no = trim($data[9]);
	//var_dump($data);die;
	if ($data[0] != 0) 
	{
		$company_id = " and company_id = $data[0]";
	} 
	else 
	{
		echo "Select Company";
		die;
	}
	
	$location_id=$division_id =$department_id =$section_id =$sub_section_id =$delivery_id =$ind_id ="";
	if ($data[3] != 0) $location_id = " and location_id = $data[3]"; 
	if ($data[4] != 0) $division_id = " and division_id = $data[4]";
	if ($data[5] != 0) $department_id = " and department_id = $data[5]";
	if ($data[6] != 0) $section_id = " and section_id = $data[6]";
	if ($data[7] != 0) $sub_section_id = " and sub_section_id = $data[7]";
	if ($data[8] != '') $delivery_id = " and delivery_point like '$delivery%'";
	if ($data[9] != '') $ind_id = " and itemissue_req_sys_id like '%$indent_no'";
	
	
	//$date=change_date_format($data[1],'mm-dd-yyyy');
	//if($data[1]!=0){ $indent_date=" and indent_date = $data[1]";}else{ $indent_date=""; }
	$section_library = return_library_array("select id, section_name from lib_section", "id", "section_name");
	$department = return_library_array("select id, department_name from lib_department", "id", "department_name");
	$location = return_library_array("select id, location_name from lib_location", "id", "location_name");
	$division = return_library_array("select id, division_name from lib_division", "id", "division_name");
	$section_library = return_library_array("select id, section_name from lib_section", "id", "section_name");


	$date = $data[1];
	$re_date = $data[2];
	$indent_date = $require_date = "";
	if ($data[1] != "")
	{
		if ($db_type == 0) 
		{
			$indent_date = "and indent_date ='" . change_date_format($date, 'yyyy-mm-dd') . "'";
		} 
		else if ($db_type == 2) 
		{
			$indent_date = "and indent_date ='" . change_date_format($date, '', '', 1) . "'";
		}
	}

	if ($data[2] != "") 
	{
		if ($db_type == 0) 
		{
			$require_date = "and required_date ='" . change_date_format($re_date, 'yyyy-mm-dd') . "'";
		} 
		else if ($db_type == 2) 
		{
			$require_date = "and required_date ='" . change_date_format($re_date, '', '', 1) . "'";
		}
	}

	if ($db_type == 0) $year_field = "YEAR(insert_date) as year";
	else if ($db_type == 2) $year_field = "to_char(insert_date,'YYYY') as year";
	else $year_field = "";

	$sql = "select id,$year_field,itemissue_req_prefix,itemissue_req_prefix_num,itemissue_req_sys_id,company_id,indent_date,required_date,location_id,division_id,department_id,section_id,sub_section_id,delivery_point,remarks 
	from inv_item_issue_requisition_mst 
	where status_active=1 and is_deleted=0 $company_id $indent_date $require_date $location_id $division_id $department_id $section_id $sub_section_id $delivery_id $ind_id";
	//echo  $sql; die;
	$arr = array(0 => $company_arr, 5 => $location, 6 => $division, 7 => $department, 8 => $section_library);

	echo create_list_view("list_view", "Company,Year,Indent No.,Indent Date,Required Date,Location,Division,Department,Section,Sub Section,Delivery Point", "150,50,80,80,80,100,80,80,80,80", "1030", "320", 0, $sql, "hidden_item_value", "id", "", 1, "company_id,0,0,0,0,location_id,division_id,department_id,section_id", $arr, "company_id,year,itemissue_req_prefix_num,indent_date,required_date,location_id,division_id,department_id,section_id,sub_section_id,delivery_point", "", '', '0,0,0,3,3');

}


if ($action == "populate_data_from_item_issue_requisition") 
{
	$data_array = sql_select("select id,itemissue_req_prefix,itemissue_req_prefix_num,itemissue_req_sys_id,company_id,indent_date,required_date,location_id,division_id,department_id,section_id,sub_section_id,delivery_point,remarks,manual_requisition_no,ready_to_approved,is_approved from inv_item_issue_requisition_mst where status_active=1 and is_deleted=0 and id='$data'");

	foreach ($data_array as $row) 
	{
		echo "load_drop_down( 'requires/item_issue_requisition_controller', '" . $row[csf("company_id")] . "', 'load_drop_down_location', 'location_td' );\n";
		echo "load_drop_down( 'requires/item_issue_requisition_controller', '" . $row[csf("company_id")] . "', 'load_drop_down_division', 'division_td' );\n";
		echo "load_drop_down( 'requires/item_issue_requisition_controller', '" . $row[csf("division_id")] . "', 'load_drop_down_department', 'department_td' );\n";
		echo "load_drop_down( 'requires/item_issue_requisition_controller', '" . $row[csf("department_id")] . "', 'load_drop_down_section', 'section_td' );\n";
		//echo "load_drop_down( 'requires/item_issue_requisition_controller', '" . $row[csf("section_id")] . "', 'load_drop_down_sub_section', 'sub_section_td' );\n";
		echo "document.getElementById('txt_indent_no').value = '" . $row[csf("itemissue_req_sys_id")] . "';\n";
		echo "document.getElementById('cbo_company_id').value = '" . $row[csf("company_id")] . "';\n";
		echo "$('#cbo_company_id').attr('disabled','true')" . ";\n";
		echo "document.getElementById('txt_indent_date').value = '" . change_date_format($row[csf("indent_date")]) . "';\n";
		echo "document.getElementById('txt_required_date').value = '" . change_date_format($row[csf("required_date")]) . "';\n";
		echo "document.getElementById('cbo_location_name').value = '" . $row[csf("location_id")] . "';\n";
		echo "document.getElementById('cbo_division_name').value = '" . $row[csf("division_id")] . "';\n";
		echo "document.getElementById('cbo_department_name').value = '" . $row[csf("department_id")] . "';\n";
		echo "document.getElementById('cbo_section_name').value = '" . $row[csf("section_id")] . "';\n";
		echo "document.getElementById('cbo_sub_section_name').value = '" . $row[csf("sub_section_id")] . "';\n";
		echo "document.getElementById('cbo_delivery_point').value = '" . $row[csf("delivery_point")] . "';\n";
		echo "document.getElementById('txt_remarks').value = '" . $row[csf("remarks")] . "';\n";
		echo "document.getElementById('txt_manual_requisition_no').value = '" . $row[csf("manual_requisition_no")] . "';\n";
		echo "document.getElementById('cbo_ready_to_approved').value = '" . $row[csf("ready_to_approved")] . "';\n";
		echo "document.getElementById('txt_is_approved').value = '" . $row[csf("is_approved")] . "';\n";
		if($row[csf("is_approved")] == 1)
		{
		echo "$('#approval_status_tr').html('This Requisition is Approved by Authority.');\n";
		echo "$('#itemissuerequisition_1 input, #itemissuerequisition_1 select').prop('disabled','true')".";\n";
		echo "$('#itemissuerequisition_2 input, #itemissuerequisition_2 select').prop('disabled','true')".";\n";
		echo "$('#txt_indent_no').removeAttr('disabled')" . ";\n";
		echo "$('#Refresh1').removeAttr('disabled')" . ";\n";
		echo "$('#Print1').removeAttr('disabled')" . ";\n";
		echo "$('#update1').removeClass('formbutton').addClass('formbutton_disabled');\n";  
		echo "$('#Delete1').removeClass('formbutton').addClass('formbutton_disabled');\n"; 
		}
		echo "document.getElementById('txt_system_id').value = '" . $row[csf("id")] . "';\n";
		echo "set_button_status(1, '" . $_SESSION['page_permission'] . "', 'fnc_item_issue_requisition_mst',1);\n";
	}

	exit();
}


if ($action == "item_account_popup") 
{
	echo load_html_head_contents("Item Details Info", "../../", 1, 1, '', '', '');
	extract($_REQUEST);
	?>
    <script>
        var selected_id = new Array, selected_name = new Array();
        selected_attach_id = new Array();

        function check_all_data() {
            var tbl_row_count = document.getElementById('tbl_list').rows.length;

            tbl_row_count = tbl_row_count - 1;
            //alert(tbl_row_count);
            for (var i = 1; i <= tbl_row_count; i++) {
                eval($('#tr_' + i).attr("onclick"));
            }
        }

        function toggle(x, origColor) {
            var newColor = 'yellow';
            if (x.style) {
                x.style.backgroundColor = ( newColor == x.style.backgroundColor ) ? origColor : newColor;
            }
        }

        function js_set_value(id) {
            var str = id.split("_");
            toggle(document.getElementById('tr_' + str[0]), '#FFFFFF');
            str = str[1];
            if (jQuery.inArray(str, selected_id) == -1) {
                selected_id.push(str);
            }
            else {
                for (var i = 0; i < selected_id.length; i++) {
                    if (selected_id[i] == str) break;
                }
                selected_id.splice(i, 1);
            }
            var id = '';
            for (var i = 0; i < selected_id.length; i++) {
                id += selected_id[i] + ',';
            }
            id = id.substr(0, id.length - 1);

            $('#txt_selected_id').val(id);
        }
    </script>
    </head>
    <body>
    <div align="center">
        <form name="item_detailsfrm" id="item_detailsfrm">
            <fieldset style="width:580px;">
                <table width="570" cellspacing="0" cellpadding="0" border="1" rules="all" align="center"
                       class="rpt_table" id="tbl_list_search">
                    <thead>
                    <th>Item Category</th>
                    <th>Item Group</th>
                    <th>Item Description</th>
                    <th><input type="reset" name="button" class="formbutton" value="Reset" style="width:100px;"
                               onClick="reset_form('item_detailsfrm','search_div','','','','');"></th>
                    </thead>
                    <tbody>
                    <tr>

                        <td align="center">
                            <!--<input type="text" style="width:130px" class="text_boxes" name="txt_item_category" id="txt_item_category" />-->
							<?php
							echo create_drop_down("cbo_item_category_id", 160, $item_category, "", 1, "-- Select --", $selected, "", "", "", "", "", "1,2,3,12,13,14,24,25");
							?>
                        </td>
                        <td align="center">
                            <input type="text" style="width:130px" class="text_boxes" name="txt_item_group"
                                   id="txt_item_group"/></td>
                        <td align="center"><input type="text" style="width:130px" class="text_boxes"
                                                  name="txt_item_description" id="txt_item_description"/></td>
                        <td align="center"><input type="button" name="button" class="formbutton" value="Show"
                                                  onClick="show_list_view (document.getElementById('cbo_item_category_id').value+'**'+document.getElementById('txt_item_group').value+'**'+document.getElementById('txt_item_description').value+'**'+<? echo $cbo_company_name; ?>, 'item_account_popup_list_view', 'search_div', 'item_issue_requisition_controller', 'setFilterGrid(\'tbl_list\',-1)');"
                                                  style="width:100px;"/>
                            <input type="hidden" name="txt_tot_row" id="txt_tot_row"/>
                            <input type="hidden" name="txt_selected_id" id="txt_selected_id" value=""/></td>
                    </tr>
                    </tbody>
                </table>
            </fieldset>
            <div style="margin-top:15px" id="search_div"></div>
        </form>
    </div>
    </body>
    <script src="../../includes/functions_bottom.js" type="text/javascript"></script>
    </html>
	<?
	exit();
}

if ($action == "item_account_popup_list_view") 
{
	$data = explode('**', $data);
	$group = trim($data[1]);
	$description = trim($data[2]);
	$company = $data[3];
	?>
    </head>
    <body>
    <div align="center" style="width:100%">
        <form name="order_popup_1" id="order_popup_1">
            <fieldset style="width:780px">
				<?
				$item_category_id = $item_group = $item_description = "";
				if ($data[0] != 0) $item_category_id = " and a.item_category_id='$data[0]'";
				if ($data[1] != "") $item_group = " and b.item_name like '%$group%'";
				if ($data[2] != "") $item_description = " and a.item_description like '%$description%' ";
				
				

				$arr = array(1 => $item_category, 5 => $unit_of_measurement, 9 => $row_status);
				$sql = "select a.id,a.item_account,a.item_category_id,a.item_description,a.item_size,a.item_group_id,a.unit_of_measure,a.current_stock,a.re_order_label,a.status_active,b.item_name from product_details_master a,lib_item_group b where a.item_group_id=b.id and company_id=$company and a.status_active=1 and a.is_deleted=0 and b.status_active=1 and b.is_deleted=0 $item_category_id $item_group $item_description ";
				//echo $sql;

				echo create_list_view("tbl_list", "Item Account,Item Category,Item Description,Item Size,Item Group,UOM,Stock,ReOrder Level,Product ID", "100,100,100,60,100,40,40,80,50,60", "780", "250", 0, $sql, "js_set_value", "id", "", 1, "0,item_category_id,0,0,0,unit_of_measure,0,0,0", $arr, "item_account,item_category_id,item_description,item_size,item_name,unit_of_measure,current_stock,re_order_label,id", "", 'setFilterGrid("tbl_list",-1);', '0,0,0,0,0,0,1,1,0', '', 1);
				?>
            </fieldset>
        </form>
    </div>
    </body>
    <script src="../../includes/functions_bottom.js" type="text/javascript"></script>
    </html>
	<?
}

if ($action == "stock_popup") 
{
	extract($_REQUEST);

	$sql = "select store_id, sum(case when transaction_type in (1,4,5)  then cons_quantity else 0 end) as total_receive,sum(case when transaction_type in (2,3,6)  then cons_quantity else 0 end) as total_issue  from inv_transaction where prod_id='$product_id' and company_id='$cbo_company_name' and status_active=1 and is_deleted=0 group by store_id";
	$store = return_library_array("select a.id,a.store_name from lib_store_location a, lib_store_location_category b where a.id=b.store_location_id and b.category_type in ($all_general_item_id) and a.status_active=1 and a.is_deleted=0 group by a.id,a.store_name order by a.store_name", 'id', 'store_name');

	?>
    <table width="250" cellspacing="0" cellpadding="0" border="1" class="rpt_table" align="center" rules="all">
        <thead>
        <tr>
            <th width="150">Store Name</th>
            <th align="center">Stock</th>
        </tr>
        </thead>
        <tbody>
		<? $result = sql_select($sql);
		$i = 1;
		foreach ($result as $row) {
			if ($i % 2 == 0) $bgcolor = "#E9F3FF"; else $bgcolor = "#FFFFFF";
			$stock = $row[csf('total_receive')] - $row[csf('total_issue')];
			?>
            <tr bgcolor="<? echo $bgcolor; ?>" id="">
                <td align="right"><? echo $store[$row[csf('store_id')]]; ?></td>
                <td align="right"><? echo $stock; ?></td>
            </tr>

			<?
			$total_stock += $stock;
			$i++;
		}
		?>
        <tr bgcolor="#FFCC66">
            <td align="right">Total</td>
            <td align="right"><? echo $total_stock; ?></td>
        </tr>
        </tbody>
    </table>
	<? 
}

if ($action == "item_issue_requisition_list") {
	$explode_data = explode("**", $data);
	$data = $explode_data[0];
	$table_row = $explode_data[1];
	$item_group = return_library_array("select id,item_name from lib_item_group", 'id', 'item_name');

	if ($data != "") {
		$nameArray = sql_select("select a.id,a.item_account,a.sub_group_name,a.item_category_id,a.item_description,a.item_size,a.item_group_id,a.unit_of_measure,a.current_stock,a.re_order_label,a.status_active,b.item_name from product_details_master a,lib_item_group b where a.id in ($data) and a.status_active=1 and a.item_group_id=b.id");
		//print_r($nameArray);
		foreach ($nameArray as $inf) {
			$table_row++;
			?>
            <tr class="general" id="tr_<? echo $table_row; ?>">
                <td width="80">

                    <input type="text" name="txt_item_account_<? echo $table_row; ?>"
                           id="txt_item_account_<? echo $table_row; ?>" placeholder="browse" class="text_boxes"
                           onClick="fnc_item_account(1)" value="<? echo $inf[csf("item_account")]; ?>"
                           style="width:80px;" readonly>
                    <input type="hidden" name="txt_product_id_<? echo $table_row; ?>"
                           id="txt_product_id_<? echo $table_row; ?>" placeholder="browse" class="text_boxes"
                           value="<? echo $inf[csf("id")]; ?>" style="width:80px;" readonly>
                </td>
                <td width="80">
                    <input type="text" name="txt_item_group_<? echo $table_row; ?>"
                           id="txt_item_group_<? echo $table_row; ?>" class="text_boxes"
                           value="<? echo $inf[csf("item_name")]; ?>" style="width:80px;" disabled>
                    <input type="hidden" name="hiddenitemgroupid_<? echo $table_row; ?>"
                           id="hiddenitemgroupid_<? echo $table_row; ?>" class="text_boxes"
                           value="<? echo $inf[csf("item_group_id")]; ?>" style="width:90px;" maxlength="200"/>
                </td>
                <td width="80">
                    <input type="text" name="txt_item_sub_<? echo $table_row; ?>"
                           id="txt_item_sub_<? echo $table_row; ?>" class="text_boxes"
                           value="<? echo $inf[csf("sub_group_code")]; ?>" style="width:80px;" disabled>
                </td>
                <td width="100"><input type="text" name="txt_item_description_<? echo $table_row; ?>"
                                       id="txt_item_description_<? echo $table_row; ?>" class="text_boxes"
                                       value="<? echo $inf[csf("item_description")]; ?>" style="width:240px" disabled>
                </td>
                <td width="40"><input type="text" name="txt_item_size_<? echo $table_row; ?>"
                                      id="txt_item_size_<? echo $table_row; ?>" class="text_boxes"
                                      value="<? echo $inf[csf("item_size")]; ?>" style="width:100px" disabled></td>
                <td width="60">
                    <input type="text" name="txt_required_for_<? echo $table_row; ?>"
                           id="txt_required_for_<? echo $table_row; ?>" class="text_boxes" placeholder="Write"
                           style="width:60px;">
                </td>
                <td width="40" align="right">
                    <input type="text" name="txt_uom_<? echo $table_row; ?>" id="txt_uom_<? echo $table_row; ?>"
                           class="text_boxes_numeric" style=" width:40px"
                           value="<? echo $unit_of_measurement[$inf[csf("unit_of_measure")]]; ?>" readonly>
                    <input type="hidden" name="hiddentxtuom_<? echo $table_row; ?>"
                           id="hiddentxtuom_<? echo $table_row; ?>" class="text_boxes"
                           value="<? echo $inf[csf("unit_of_measure")]; ?>" style="width:60px;" maxlength="200"
                           readonly/>
                </td>
                <td width="60"><input type="text" name="txt_req_qty_<? echo $table_row; ?>"
                                      id="txt_req_qty_<? echo $table_row; ?>" class="text_boxes_numeric"
                                      placeholder="Write" style="width:60px;"></td>
                <td width="40"><input type="text" name="txt_stock_<? echo $table_row; ?>"
                                      id="txt_stock_<? echo $table_row; ?>" class="text_boxes_numeric"
                                      value="<? echo $inf[csf("current_stock")]; ?>" style="width:40px;"
                                      onDblClick="trans_history_popup(<? echo $inf[csf("id")]; ?>)" readonly></td>
                <td width="80"><input type="text" name="txt_remarks_<? echo $table_row; ?>"
                                      id="txt_remarks_<? echo $table_row; ?>" class="text_boxes_numeric"
                                      style="width:80px;" placeholder="Write">
                    <input type="hidden" id="hidden_selectedID"/>
                    <input type="hidden" name="txt_tot_row" id="txt_tot_row"/>
                    <input type="hidden" id="update_id_dtls" name="update_id_dtls"/>
                </td>
            </tr>
			<?

		}//end foreach

	}
}

if ($action == "show_item_issue_listview") {
	$sql = "select b.id,b.mst_id,b.item_account,b.item_group,b.item_sub_group,b.item_description,b.item_size,b.unit_of_measure,b.current_stock,b.req_for,b.  req_qty,b.remarks from inv_item_issue_requisition_mst a,inv_itemissue_requisition_dtls b where a.id=b.mst_id and a.id='$data' and b.status_active=1 and b.is_deleted=0 order by id  Asc";

	$nameArray = sql_select($sql);
	?>
    <div style="width:988px;">
        <table width="968" cellspacing="0" cellpadding="0" border="0" rules="all" class="rpt_table" align="left">
            <thead>
            <tr>
                <th width="35">SL</th>
                <th width="114">Item Account</th>
                <th width="109">Item Group</th>
                <th width="78">Item Sub. Group</th>
                <th width="205">Item Description</th>
                <th width="57">Item Size</th>
                <th width="58">Required For</th>
                <th width="37">UOM</th>
                <th width="36">Req. Qty.</th>
                <th width="55">Stock</th>
                <th>Remarks</th>
            </tr>
            </thead>
        </table>
        <!--<div id="" style="max-height:80px; width:988px; overflow-y:scroll" >-->
        <table width="968" cellspacing="0" cellpadding="0" border="0" rules="all" class="rpt_table" align="left">

            <tbody>
			<?
			$item_group = return_library_array("select id,item_name from lib_item_group", 'id', 'item_name');
			$item_sub_group = return_library_array("select sub_group_code,sub_group_name from product_details_master", 'sub_group_code', 'sub_group_name');
			$i = 1;
			foreach ($nameArray as $selectResult) {
				?>
                <tr bgcolor="<? echo $bgcolor; ?>" style="text-decoration:none; cursor:pointer"
                    id="search<? echo $i; ?>"
                    onClick="get_php_form_data('<? echo $selectResult[csf('id')]; ?>','populate_item_details_form_data_dtls','requires/item_issue_requisition_controller');populate_row_dte();hi_tipu();">
                    <td width="35"><? echo $i; ?></td>
                    <td width="114"><? echo $selectResult[csf("item_account")]; ?></td>
                    <td width="109"><? echo $item_group[$selectResult[csf("item_group")]]; ?></td>
                    <td width="78"><? echo $item_sub_group[$selectResult[csf("item_sub_group")]]; ?></td>
                    <td width="205"><? echo $selectResult[csf("item_description")]; ?></td>
                    <td width="57"><? echo $selectResult[csf("item_size")]; ?></td>
                    <td width="58" align="right"><? echo $selectResult[csf("req_for")]; ?></td>
                    <td width="37"
                        align="right"><? echo $unit_of_measurement[$selectResult[csf("unit_of_measure")]]; ?></td>
                    <td width="36" align="right"><? echo $selectResult[csf("req_qty")]; ?></td>
                    <td width="55" align="right"><? echo $selectResult[csf("current_stock")]; ?></td>
                    <td align="right"><? echo $selectResult[csf("remarks")]; ?></td>
                </tr>

				<? $i++;
			} ?>
            </tbody>
        </table>
		
        <!-- </div>-->
    </div>


	<?

}


if ($action == "populate_item_details_form_data_dtls") {
	$item_group = return_library_array("select id,item_name from lib_item_group", 'id', 'item_name');
	$item_sub_group = return_library_array("select sub_group_code,sub_group_name from product_details_master", 'sub_group_code', 'sub_group_name');
	$data_ar = sql_select(" select id,mst_id,item_account,item_group,item_sub_group,item_description,item_size,unit_of_measure,current_stock,req_for,req_qty,remarks from inv_itemissue_requisition_dtls where id='$data'");

	foreach ($data_ar as $info) {

		echo "document.getElementById('txt_item_account_1').value 		= '" . $info[csf("item_account")] . "';\n";
		echo "document.getElementById('txt_item_group_1').value 		= '" . $item_group[$info[csf("item_group")]] . "';\n";
		echo "document.getElementById('hiddenitemgroupid_1').value 		= '" . $info[csf("item_group")] . "';\n";
		echo "document.getElementById('txt_item_sub_1').value 			= '" . $item_sub_group[$info[csf("sub_group_code")]] . "';\n";
		echo "document.getElementById('txt_item_description_1').value 	= '" . $info[csf("item_description")] . "';\n";
		echo "document.getElementById('txt_item_size_1').value 			= '" . $info[csf("item_size")] . "';\n";
		echo "document.getElementById('txt_uom_1').value 				= '" . $unit_of_measurement[$info[csf("unit_of_measure")]] . "';\n";
		echo "document.getElementById('hiddentxtuom_1').value 			= '" . $info[csf("unit_of_measure")] . "';\n";
		echo "document.getElementById('txt_stock_1').value 				= '" . $info[csf("current_stock")] . "';\n";
		echo "document.getElementById('txt_required_for_1').value 		= '" . $info[csf("req_for")] . "';\n";
		echo "document.getElementById('txt_req_qty_1').value 			= '" . $info[csf("req_qty")] . "';\n";
		echo "document.getElementById('txt_remarks_1').value 			= '" . $info[csf("remarks")] . "';\n";
		echo "document.getElementById('update_id_dtls').value 			= '" . $info[csf("id")] . "';\n";
		echo "set_button_status(1, '" . $_SESSION['page_permission'] . "', 'fnc_item_issue_requisition_dtls',2);\n";

	}

	exit();
}

if ($action == "print_item_issue_requisition") {
	extract($_REQUEST);
	echo load_html_head_contents("Item Issue requisition Print", "../../", 1, 1, '', '', '');
	$data = explode('*', $data);
	//print_r($data);
	$company_library = return_library_array("select id, company_name from lib_company", "id", "company_name");
	$section_library = return_library_array("select id, section_name from lib_section", "id", "section_name");
	$department = return_library_array("select id, department_name from lib_department", "id", "department_name");
	$location = return_library_array("select id, location_name from lib_location", "id", "location_name");
	$division = return_library_array("select id, division_name from lib_division", "id", "division_name");
	$section_library = return_library_array("select id, section_name from lib_section", "id", "section_name");
	$sql = "select id,itemissue_req_prefix,itemissue_req_prefix_num,itemissue_req_sys_id,company_id,indent_date,required_date,location_id,division_id,department_id,section_id,sub_section_id,delivery_point,remarks from inv_item_issue_requisition_mst where status_active=1 and is_deleted=0 and id='$data[1]'";
	$dataArray = sql_select($sql);
	?>
    <div style="width:1000px;">
        <table width="1000" cellspacing="0" align="right" border="0" style="margin-right:-10px;">
            <tr>
                <td colspan="6" align="center" style="font-size:18px">
                    <strong><? echo $company_library[$data[0]]; ?></strong></td>
            </tr>
            <tr class="form_caption">
				<?
				$data_array = sql_select("select image_location  from common_photo_library  where master_tble_id='$data[0]' and form_name='company_details' and is_deleted=0 and file_type=1");
				?>

                <td align="left" width="50">
					<?
					foreach ($data_array as $img_row) {

						?>
                        <img src='../<? echo $img_row[csf('image_location')]; ?>' height='50' width='50'
                             align="middle"/>
						<?

					}
					?>
                </td>
                <td colspan="4" align="center">
					<?
					$nameArray = sql_select("select plot_no,level_no,road_no,block_no,country_id,province,city,zip_code,email,website from lib_company where id='$data[0]'");

					foreach ($nameArray as $result) {
						?>
						<? echo $result[csf('plot_no')]; ?>
						<? echo $result[csf('level_no')] ?>
						<? echo $result[csf('road_no')]; ?>
						<? echo $result[csf('block_no')]; ?>
						<? echo $result[csf('city')]; ?>
						<? echo $result[csf('zip_code')]; ?>
						<? echo $result[csf('province')]; ?>
						<? echo $country_arr[$result[csf('country_id')]]; ?><br>
						<? echo $result[csf('email')]; ?>
						<? echo $result[csf('website')];
					}
					?>
                </td>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="font-size:16px"><strong><u>Item Issue
                            requisition</u></strong></center></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="160"><strong>Indent No:</strong></td>
                <td width="160px"><? echo $dataArray[0][csf('itemissue_req_sys_id')]; ?></td>
                <td width="160"><strong>Indent Date:</strong></td>
                <td width="160px"><? echo change_date_format($dataArray[0][csf('indent_date')]); ?></td>
                <td width="160"><strong>Required Date:</strong></td>
                <td width="160px"><? echo change_date_format($dataArray[0][csf('required_date')]); ?></td>
            </tr>
            <tr>
                <td width="180"><strong>Location:</strong></td>
                <td width="160px"><? echo $location[$dataArray[0][csf('location_id')]]; ?></td>
                <td width="180"><strong>Division:</strong></td>
                <td width="160px"><? echo $division[$dataArray[0][csf('division_id')]]; ?></td>
                <td width="180"><strong>Department:</strong></td>
                <td width="160px"><? echo $department[$dataArray[0][csf('department_id')]]; ?></td>
            </tr>
            <tr>
                <td width="180"><strong>Section:</strong></td>
                <td width="160px"><? echo $section_library[$dataArray[0][csf('section_id')]]; ?></td>
                <td width="180"><strong>Sub Section:</strong></td>
                <td width="160px"><? echo $dataArray[0][csf('sub_section_id')]; ?></td>
                <td width="180"><strong>Delivery Point:</strong></td>
                <td width="160px"><? echo $dataArray[0][csf('delivery_point')]; ?></td>
            </tr>
            <tr>
                <td><strong>Remarks:</strong></td>
                <td colspan="4" width="400"><? echo $dataArray[0][csf('remarks')]; ?></td>
            </tr>
            <tr>
                <td><strong>Bar Code:</strong></td>
                <td colspan="4" id="barcode_img"></td>
            </tr>
        </table>
    </div>
    <div style="width:100%; margin-top:10px;">

		<?

		$sql_dtls = "select b.id,b.mst_id,b.item_account,b.item_group,b.item_sub_group,b.item_description,b.item_size,b.unit_of_measure,b.current_stock,b.req_for,b.  req_qty,b.remarks from inv_item_issue_requisition_mst a,inv_itemissue_requisition_dtls b where a.id=b.mst_id and a.id='$data[1]' and b.status_active=1 and b.is_deleted=0";

		$item_group = return_library_array("select id,item_name from lib_item_group", 'id', 'item_name');
		$nameArray = sql_select($sql_dtls);


		?>
        <table cellspacing="0" width="900" border="1" rules="all" class="rpt_table">
            <thead bgcolor="#dddddd" style="font-size:13px">
            <tr>
                <th width="10">SL</th>
                <th width="100">Item Account</th>
                <th width="120">Item Group</th>
                <th width="80">Item Sub. Group</th>
                <th width="120">Item Description</th>
                <th width="60">Item Size</th>
                <th width="80">Required For</th>
                <th width="40">UOM</th>
                <th width="50">Req. Qty.</th>
                <th width="20">Stock</th>
                <th width="150">Remarks</th>
            </tr>
            </thead>
            <tbody style="max-height:320px; width:808px; overflow-y:scroll">
			<?
			$item_sub_group = return_library_array("select sub_group_code,sub_group_name from product_details_master", 'sub_group_code', 'sub_group_name');
			$user_arr = return_library_array("select user_name,id from user_passwd", 'id', 'user_name');
			$user = "select id,inserted_by,updated_by from inv_item_issue_requisition_mst where id='$data[1]'";
			$user_print = sql_select($user);
			$i = 1;
			foreach ($nameArray as $selectResult) {
				?>
                <tr>
                    <td><? echo $i; ?></td>
                    <td><? echo $selectResult[csf("item_account")]; ?></td>
                    <td><? echo $item_group[$selectResult[csf("item_group")]]; ?></td>
                    <td><? echo $item_sub_group[$selectResult[csf("item_sub_group")]]; ?></td>
                    <td><? echo $selectResult[csf("item_description")]; ?></td>
                    <td><? echo $selectResult[csf("item_size")]; ?></td>
                    <td align="right"><? echo $selectResult[csf("req_for")]; ?></td>
                    <td align="right"><? echo $unit_of_measurement[$selectResult[csf("unit_of_measure")]]; ?></td>
                    <td align="right"><? echo $selectResult[csf("req_qty")]; ?></td>
                    <td align="right"><? echo $selectResult[csf("current_stock")]; ?></td>
                    <td align="right"><? echo $selectResult[csf("remarks")]; ?></td>
                </tr>

				<? $i++;
			} ?>
            </tbody>
        </table>

    </div>
    <div style="height:100px;"></div>
    <table>
        <tr height="20">
			<?
			echo signature_table(1, $data[0], "900px");
			?>
        </tr>

		<?php /*?><tr height="20"></tr>
            <tr>
            	<td style="border-top-style:dotted; border-top-width:3px;" >
                Prepared By <br/>
                <?
                	foreach($user_print as $user_info)
					   {
						   if($user_info[csf("updated_by")]=='')
						   {
						   		echo $user_arr[$user_info[csf("inserted_by")]];
						   }
						   else
						   {
							   echo $user_arr[$user_info[csf("updated_by")]];
						   }
					   }
				?>
                </td> 
                <td style="width:700px;"></td><td style="border-top-style:dotted; border-top-width:3px;">Authorized Signature</td>
            </tr>
            <tr height="50"></tr><?php */
		?>

    </table>

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquerybarcode.js"></script>
    <script>

        function generateBarcode(valuess) {

            var value = valuess;//$("#barcodeValue").val();
            //alert(value)
            var btype = 'code39';//$("input[name=btype]:checked").val();
            var renderer = 'bmp';// $("input[name=renderer]:checked").val();
            var settings = {
                output: renderer,
                bgColor: '#FFFFFF',
                color: '#000000',
                barWidth: 1,
                barHeight: 30,
                moduleSize: 5,
                posX: 10,
                posY: 20,
                addQuietZone: 1
            };
            $("#barcode_img").html('11');
            value = {code: value, rect: false};
            $("#barcode_img").show().barcode(value, btype, settings);

        }

        generateBarcode('<? echo $data[2]; ?>');

    </script>

	<?
	exit();
}

/*function signature_tables($report_id, $company, $width)
{
	//echo "select designation,name from variable_settings_signature where report_id=$report_id and company_id=$company order by sequence_no" ; die;
	$sql = sql_select("select designation,name from variable_settings_signature where report_id=$report_id and company_id=$company order by sequence_no");
	$count = count($sql);
	if($count>8)
	{
		echo '<div style="width:'.$width.'; margin:5px 5px 5px 5px;" align="center">';
		foreach($sql as $row)	
		{
		   echo '<div style="width:150px; float:left; height:100px; vertical-align:bottom"><font style="text-decoration:overline">'.$row[csf('designation')].'</font><br>'.$row[csf('name')].'<br><br></div>';
		} 
		echo '</div>';
	}
	else
	{

	$td_width = floor($width / $count);

	$standard_width = $count * 150;

	if ($standard_width > $width) $td_width = 150;

	$no_coloumn_per_tr = floor($width / $td_width);

	$i = 1;
	echo '<table width="' . $width . '"><tr><td width="100%" height="70" colspan="' . $count . '"></td></tr><tr>';
	foreach ($sql as $row) {
		echo '<td width="' . $td_width . '" align="center" valign="top"><strong style="text-decoration:overline">' . $row[csf("designation")] . "</strong><br>" . $row[csf("name")] . '</td>';

		if ($i % $no_coloumn_per_tr == 0) echo '</tr><tr><td width="100%" height="70" colspan="' . $no_coloumn_per_tr . '"></td><tr>';
		$i++;
	}
	echo '</tr></table>';
	//}
}
*/

if ($action == "save_update_delete_mst") {
	$process = array(&$_POST);
	extract(check_magic_quote_gpc($process));
	if ($operation == 0)  // Insert Here
	{
		$con = connect();
		if ($db_type == 0) {
			mysql_query("BEGIN");
		}
		$id = return_next_id("id", "inv_item_issue_requisition_mst", 1);

		if ($db_type == 0) $year_cond = "YEAR(insert_date)";
		else if ($db_type == 2) $year_cond = "to_char(insert_date,'YYYY')";
		else $year_cond = "";//defined Later
		// function return_mrr_number( $company, $location, $category, $year, $num_length, $main_query, $str_fld_name, $num_fld_name, $old_mrr_no )
		$new_item_req_system_id = explode("*", return_mrr_number(str_replace("'", "", $cbo_company_id), '', '', date("Y", time()), 5, "select itemissue_req_prefix, itemissue_req_prefix_num from inv_item_issue_requisition_mst where company_id=$cbo_company_id and $year_cond=" . date('Y', time()) . " order by id desc ", "itemissue_req_prefix", "itemissue_req_prefix_num"));

		$field_array = "id,itemissue_req_prefix,itemissue_req_prefix_num,itemissue_req_sys_id,company_id,indent_date,required_date,location_id,division_id,department_id,section_id,sub_section_id,delivery_point,remarks,manual_requisition_no,ready_to_approved,inserted_by,insert_date";
		$data_array = "(" . $id . ",'" . $new_item_req_system_id[1] . "'," . $new_item_req_system_id[2] . ",'" . $new_item_req_system_id[0] . "'," . $cbo_company_id . "," . $txt_indent_date . "," . $txt_required_date . "," . $cbo_location_name . "," . $cbo_division_name . "," . $cbo_department_name . "," . $cbo_section_name . "," . $cbo_sub_section_name . "," . $cbo_delivery_point . "," . $txt_remarks . "," . $txt_manual_requisition_no .",".$cbo_ready_to_approved. "," . $_SESSION['logic_erp']['user_id'] . ",'" . $pc_date_time . "')";
		//echo "insert into com_item_issue_requisition_mst($field_array)values ".$data_array." ";die;
		$rID = sql_insert("inv_item_issue_requisition_mst", $field_array, $data_array, 1);

		if ($db_type == 0) 
		{
			if ($rID) 
			{
				mysql_query("COMMIT");
				echo "0**" . $id . "**" . $new_item_req_system_id[0];
			} 
			else 
			{
				mysql_query("ROLLBACK");
				echo "10**" . $id;
			}
		}

		if ($db_type == 2 || $db_type == 1) 
		{
			if ($rID) 
			{
				oci_commit($con);
				echo "0**" . $id . "**" . $new_item_req_system_id[0];
			} 
			else 
			{
				oci_rollback($con);
				echo "10**" . $id;
			}
		}
		disconnect($con);
		die;
	} 
	else if ($operation == 1)   // Update Here
	{

		$con = connect();
		if ($db_type == 0) {
			mysql_query("BEGIN");
		}

		$field_array = "company_id*indent_date*required_date*location_id*division_id*department_id*section_id*sub_section_id*delivery_point*remarks*manual_requisition_no*ready_to_approved*updated_by*update_date*status_active*is_deleted";
		$data_array = "" . $cbo_company_id . "*" . $txt_indent_date . "*" . $txt_required_date . "*" . $cbo_location_name . "*" . $cbo_division_name . "*" . $cbo_department_name . "*" . $cbo_section_name . "*" . $cbo_sub_section_name . "*" . $cbo_delivery_point . "*" . $txt_remarks . "*" . $txt_manual_requisition_no . "*" . $cbo_ready_to_approved . "*" . $_SESSION['logic_erp']['user_id'] . "*'" . $pc_date_time . "'*1*0";

		$rID = sql_update("inv_item_issue_requisition_mst", $field_array, $data_array, "id", "" . $txt_system_id . "", 1);

		if ($db_type == 0) 
		{
			if ($rID) 
			{
				mysql_query("COMMIT");
				echo "1**" . $id . "**" . str_replace("'", '', $txt_indent_no);
			} 
			else 
			{
				mysql_query("ROLLBACK");
				echo "1**" . $id . "**" . str_replace("'", '', $txt_indent_no);
			}
		}
		if ($db_type == 2 || $db_type == 1) 
		{
			if ($rID) 
			{
				oci_commit($con);
				echo "1**" . $id . "**" . str_replace("'", '', $txt_indent_no);
			} 
			else 
			{
				oci_rollback($con);
				echo "1**" . $id . "**" . str_replace("'", '', $txt_indent_no);
			}
		}
		disconnect($con);
		die;
	} else if ($operation == 2)   // Delete Here
	{

		$con = connect();
		if ($db_type == 0) {
			mysql_query("BEGIN");
		}

		$field_array = "updated_by*update_date*status_active*is_deleted";
		$data_array = "" . $_SESSION['logic_erp']['user_id'] . "*'" . $pc_date_time . "'*'0'*'1'";

		$rID = sql_delete("inv_item_issue_requisition_mst", $field_array, $data_array, "id", "" . $txt_system_id . "", 1);
		$rID_dtls = sql_delete("inv_itemissue_requisition_dtls", $field_array, $data_array, "mst_id", $txt_system_id, 1);
		if ($db_type == 0) 
		{
			if ($rID && $rID_dtls) 
			{
				mysql_query("COMMIT");
				echo "2**" . $id . "**" . str_replace("'", '', $txt_indent_no);
			} 
			else 
			{
				mysql_query("ROLLBACK");
				echo "6**" . $id . "**" . str_replace("'", '', $txt_indent_no);
			}
		}
		if ($db_type == 2 || $db_type == 1) 
		{
			if ($rID && $rID_dtls) 
			{
				oci_commit($con);
				echo "2**" . $id . "**" . str_replace("'", '', $txt_indent_no);
			} 
			else 
			{
				oci_rollback($con);
				echo "10**" . $rID;
			}
		}
		disconnect($con);
		die;
	}

}


if ($action == "save_update_delete_dtls") {
	$process = array(&$_POST);
	extract(check_magic_quote_gpc($process));
	if ($operation == 0)  // Insert Here
	{
		$con = connect();
		if ($db_type == 0) {
			mysql_query("BEGIN");
		}

		$dtls_id = return_next_id("id", "inv_itemissue_requisition_dtls", 1);

		//echo "10**$dtls_id";die;

		//cbo_company_id*txt_indent_date*txt_required_date*cbo_delivery_point*txt_remarks
		$field_array = "id,mst_id,item_account,item_group,item_sub_group,item_description,item_size,unit_of_measure,current_stock,req_for,req_qty,remarks,product_id,inserted_by,insert_date";
		for ($j = 1; $j <= $row_num; $j++) 
		{
			$txt_item_account = "txt_item_account_" . $j;
			$txt_item_group = "hiddenitemgroupid_" . $j;
			$txt_item_sub = "txt_item_sub_" . $j;
			$txt_item_description = "txt_item_description_" . $j;
			$txt_item_size = "txt_item_size_" . $j;
			$txt_required_for = "txt_required_for_" . $j;
			$cbo_uom = "hiddentxtuom_" . $j;
			$txt_req_qty = "txt_req_qty_" . $j;
			$txt_stock = "txt_stock_" . $j;
			$txt_remarks = "txt_remarks_" . $j;
			$txt_product_id = "txt_product_id_" . $j;
			$product_id = str_replace("'", '', $txt_product_id);

			if (str_replace("'", '', $$txt_req_qty) > 0) 
			{
				//echo $txt_req_qty;die;
				if ($data_array != "") $data_array .= ",";
				$data_array .= "(" . $dtls_id . "," . $txt_system_id . "," . $$txt_item_account . "," . $$txt_item_group . "," . $$txt_item_sub . "," . $$txt_item_description . "," . $$txt_item_size . "," . $$cbo_uom . "," . $$txt_stock . "," . $$txt_required_for . "," . $$txt_req_qty . "," . $$txt_remarks . "," . $$product_id . "," . $_SESSION['logic_erp']['user_id'] . ",'" . $pc_date_time . "')";
				$dtls_id++;
			}

		}
		//echo "10**$row_num";die;
		//echo "10**insert into inv_itemissue_requisition_dtls($field_array) values ".$data_array." ";die;
		$rID = sql_insert("inv_itemissue_requisition_dtls", $field_array, $data_array, 1);

		if ($db_type == 0) 
		{
			if ($rID) 
			{
				mysql_query("COMMIT");
				echo "0**" . str_replace("'", '', $txt_system_id);
			} 
			else 
			{
				mysql_query("ROLLBACK");
				echo "10**" . str_replace("'", '', $txt_system_id);
			}
		}

		if ($db_type == 2 || $db_type == 1) 
		{
			if ($rID) 
			{
				oci_commit($con);
				echo "0**" . str_replace("'", '', $txt_system_id);
			} 
			else 
			{
				oci_rollback($con);
				echo "10**" . str_replace("'", '', $txt_system_id);
			}
		}
		disconnect($con);
		die;
	} 
	else if ($operation == 1)   // Update Here
	{

		$con = connect();
		if ($db_type == 0) {
			mysql_query("BEGIN");
		}

		$field_array = "req_for*req_qty*remarks*updated_by*update_date*status_active*is_deleted";
		$txt_required_for = "txt_required_for_1";
		$txt_req_qty = "txt_req_qty_1";
		$txt_remarks = "txt_remarks_1";
		if (str_replace("'", '', $$txt_req_qty) > 0) {
			$data_array = "" . $$txt_required_for . "*" . $$txt_req_qty . "*" . $$txt_remarks . "*" . $_SESSION['logic_erp']['user_id'] . "*'" . $pc_date_time . "'*1*0";
		}

		//echo "10**".$data_array;die;
		$rID = sql_update("inv_itemissue_requisition_dtls", $field_array, $data_array, "id", "" . $update_id_dtls . "", 1);
		//echo "10**".$rID;die;
		if ($db_type == 0) 
		{
			if ($rID) 
			{
				mysql_query("COMMIT");
				echo "1**" . str_replace("'", '', $txt_system_id);
			} 
			else 
			{
				mysql_query("ROLLBACK");
				echo "1**" . "**" . str_replace("'", '', $txt_system_id);
			}
		}
		if ($db_type == 2 || $db_type == 1) 
		{
			if ($rID) 
			{
				oci_commit($con);
				echo "1**" . str_replace("'", '', $txt_system_id);
			} 
			else 
			{
				oci_rollback($con);
				echo "1**" . str_replace("'", '', $txt_system_id);
			}
		}
		disconnect($con);
		die;
	} 
	else if ($operation == 2)   // Delete Here
	{
		$con = connect();
		if ($db_type == 0) {
			mysql_query("BEGIN");
		}

		$field_array = "updated_by*update_date*status_active*is_deleted";
		$data_array = "" . $_SESSION['logic_erp']['user_id'] . "*'" . $pc_date_time . "'*'0'*'1'";

		$rID = sql_delete("inv_itemissue_requisition_dtls", $field_array, $data_array, "id", "" . $update_id_dtls . "", 1);

		if ($db_type == 0) 
		{
			if ($rID) 
			{
				mysql_query("COMMIT");
				echo "2**" . str_replace("'", '', $txt_system_id);
			} 
			else 
			{
				mysql_query("ROLLBACK");
				echo "6**" . str_replace("'", '', $txt_system_id);
			}
		}
		if ($db_type == 2 || $db_type == 1) 
		{
			if ($rID) 
			{
				oci_commit($con);
				echo "2**" . str_replace("'", '', $txt_system_id);
			} 
			else 
			{
				oci_rollback($con);
				echo "10**" . str_replace("'", '', $txt_system_id);
			}
		}
		disconnect($con);
		die;
	}

}

?>