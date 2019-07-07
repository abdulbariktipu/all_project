<?
/*-------------------------------------------- Comments
Version          : 
Purpose			 : 
Functionality	 :	
JS Functions	 :
Created by		 : Monir Hossain
Creation date 	 : 20/07/2016
Requirment Client: 
Requirment By    : 
Requirment type  : 
Requirment       : 
Affected page    : 
Affected Code    :              
DB Script        : 
Updated by 		 : 
Update date		 : 
QC Performed BY	 :		
QC Date			 :	
Comments		 : 
*/

session_start();
if( $_SESSION['logic_erp']['user_id'] == "" ) header("location:login.php");
require_once('../includes/common.php');
extract($_REQUEST);
$_SESSION['page_permission']=$permission;

echo load_html_head_contents("Item Issue Requisition", "../", 1, 1,'','1','');
?>

<script>
if( $('#index_page', window.parent.document).val()!=1) window.location.href = "../../logout.php";
var permission='<? echo $permission; ?>';

function fnc_item_issue_requisition_mst(operation)
{
	var txt_is_approved=$('#txt_is_approved').val();	
	if(operation==4)
	{ 
		 print_report( $('#cbo_company_id').val()+'*'+$('#txt_system_id').val()+'*'+$('#txt_indent_no').val(), "print_item_issue_requisition", "requires/item_issue_requisition_controller" ) ;
		 return;
	}

	if(txt_is_approved  == 1)
	{
		alert('This Requisition is Approved. Change Cannot Be Allowed.');
		return;
	}

	if( form_validation('cbo_company_id*txt_indent_date*txt_required_date','Company*indent Date*Required Date')==false )
		{
			return;
		}
		else
		{
			var data="action=save_update_delete_mst&operation="+operation+get_submitted_data_string('cbo_company_id*txt_indent_date*txt_required_date*cbo_delivery_point*txt_remarks*txt_manual_requisition_no*cbo_location_name*cbo_division_name*cbo_department_name*cbo_section_name*cbo_sub_section_name*txt_system_id*txt_indent_no*cbo_ready_to_approved',"../");
			//alert(data);
			freeze_window(operation);
			http.open("POST","requires/item_issue_requisition_controller.php",true);
			http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			http.send(data);
			http.onreadystatechange =fnc_item_issue_requisition_mst_Reply_info;
		}
}

function fnc_item_issue_requisition_mst_Reply_info()

{
	if(http.readyState == 4) 
	{
		//alert(http.responseText);
		var response=trim(http.responseText).split('**');
		$('#txt_indent_no').val(response[2]);	
		show_msg(response[0]);
		
		if(response[0]==0 || response[1]==1 )
		{
			$('#txt_system_id').val(response[1]);
			set_button_status(1,permission,'fnc_item_issue_requisition_mst',1);
		}
		
		
		if(response[0]==2)
		{
			reset_form('itemissuerequisition_1,itemissuerequisition_2','item_issue_listview','','txt_tot_row,0','$(\'#tbl_item_issue_list tbody tr:not(:first)\').remove();','hidden_selectedID')
			
		}

	}
	release_freezing();
}


function fnc_item_issue_requisition_dtls(operation)
{
	var txt_is_approved=$('#txt_is_approved').val();
	if(txt_is_approved  == 1)
	{
		alert('This Requisition is Approved. Change Cannot Be Allowed.');
		return;
	}
	
	
	if($('#txt_system_id').val()=='')
	
		{
			alert('Please,Fill up Requisition Reference Form.');
			
			if ( form_validation('cbo_company_id','Company')==false )
				{
					return;
				}
		}
		else
		{
			
	  		var row_num=$('#tbl_item_issue_list tbody tr').length;
			//alert(row_num);
			var multi_data="";
			
			//alert(row_num);
			if(operation==0 || operation==1)
			{  
				
				var quantity=confirm("Blank Qty item will not be saved");
				for (var j=1; j<=row_num; j++)
				{
					var qty=$('#txt_req_qty_'+j).val();
					
					if (quantity==true)
					{
						if(qty!='')
						{
							multi_data+="&txt_item_account_" + j + "='" + $('#txt_item_account_'+j).val()+"'"+"&hiddenitemgroupid_" + j + "='" + $('#hiddenitemgroupid_'+j).val()+"'"+"&txt_item_sub_" + j + "='" + $('#txt_item_sub_'+j).val()+"'"+"&txt_item_description_" + j + "='" + $('#txt_item_description_'+j).val()+"'"+"&txt_item_size_" + j + "='" + $('#txt_item_size_'+j).val()+"'"+"&txt_required_for_" + j + "='" + $('#txt_required_for_'+j).val()+"'"+"&hiddentxtuom_" + j + "='" + $('#hiddentxtuom_'+j).val()+"'"+"&txt_req_qty_" + j + "='" + $('#txt_req_qty_'+j).val()+"'"+"&txt_stock_" + j + "='" + $('#txt_stock_'+j).val()+"'"+"&txt_remarks_" + j + "='" + $('#txt_remarks_'+j).val()+"'"+"&txt_product_id_" + j + "='" + $('#txt_product_id_'+j).val()+"'";
						}
			
					}
					else
					{
						if(qty=='')
						{
							$('#txt_req_qty_'+j).focus();
							return;
						}
					}

				}
			}

				//alert(multi_data);
			var data="action=save_update_delete_dtls&row_num="+row_num+"&operation="+operation+get_submitted_data_string('txt_system_id*update_id_dtls',"../")+multi_data;
			//alert(data);
			
			freeze_window(operation);
			http.open("POST","requires/item_issue_requisition_controller.php",true);
			http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			http.send(data);
			http.onreadystatechange =fnc_item_issue_requisition_dtls_Reply_info;
		}
}

function fnc_item_issue_requisition_dtls_Reply_info()

{
	if(http.readyState == 4) 
	{
		
		var response=trim(http.responseText).split('**');
		show_msg(response[0]);
		show_list_view(response[1],'show_item_issue_listview','item_issue_listview','requires/item_issue_requisition_controller','');
		if(response[0]==0 || response[0]==1 || response[0]==2)
		{
			
			reset_form('itemissuerequisition_2','','','txt_tot_row,0','$(\'#tbl_item_issue_list tbody tr:not(:first)\').remove();','hidden_selectedID');
			show_list_view(response[1],'show_item_issue_listview','item_issue_listview','requires/item_issue_requisition_controller','');
			set_button_status(0,permission,'fnc_item_issue_requisition_dtls',2);
			
		}
		release_freezing();
	}
}


function fnc_items_sys_popup()
{
	
		var cbo_company_name=$('#cbo_company_id').val();
		var txt_is_approved=$('#txt_is_approved').val();

		var page_link='requires/item_issue_requisition_controller.php?cbo_company_name='+cbo_company_name+'&action=item_issue_requisition_popup_search';
		var title='Items Issue Requisition'
		emailwindow=dhtmlmodal.open('EmailBox', 'iframe', page_link, title, 'width=1091px,height=400px,center=1,resize=1,scrolling=0','');
		
		emailwindow.onclose=function()
		{
			var theform=this.contentDoc.forms[0];
			var hidden_item_issue_id=this.contentDoc.getElementById("hidden_item_issue_id").value;
			//alert(hidden_item_issue_id);
			if(trim(hidden_item_issue_id)!="")
			{
				freeze_window(5);
				get_php_form_data(hidden_item_issue_id, "populate_data_from_item_issue_requisition", "requires/item_issue_requisition_controller" );
				show_list_view(hidden_item_issue_id,'show_item_issue_listview','item_issue_listview','requires/item_issue_requisition_controller','');

				if(txt_is_approved == 1)
				{
					$('#update1').removeClass('formbutton').addClass('formbutton_disabled');  
					$('#Delete1').removeClass('formbutton').addClass('formbutton_disabled'); 
				}
				
			}
			
			release_freezing();
		}

}


function fnc_item_account(row_num)
{
	var sys_id=$('#txt_system_id').val();
	if(sys_id=='')
	{
		alert('Pls,Browse Indent No. From Requisition Reference Form.');
		$('#txt_indent_no').focus();
		return;
	}
	
	var cbo_company_name=$('#cbo_company_id').val();
	var page_link='requires/item_issue_requisition_controller.php?cbo_company_name='+cbo_company_name+'&action=item_account_popup';
			 var title='Search Item Account';
			 emailwindow=dhtmlmodal.open('EmailBox', 'iframe', page_link, title, 'width=825px,height=420px,center=1,resize=1,scrolling=0','');
			 
			 emailwindow.onclose=function()
			{	
					var theform=this.contentDoc.forms[0];
					var item_issue_id=this.contentDoc.getElementById("txt_selected_id").value; 
				if(item_issue_id!="")
				{  	
					
					var pre_selectID = $("#hidden_selectedID").val();
					if(trim(pre_selectID)=="") $("#hidden_selectedID").val(item_issue_id);else $("#hidden_selectedID").val(pre_selectID+","+item_issue_id); 
					
					var tot_row=$('#txt_tot_row').val();
					//alert(tot_row);
					var data=item_issue_id+"**"+tot_row;
					//alert(data);
					var list_view_orders = return_global_ajax_value( data, 'item_issue_requisition_list', '', 'requires/item_issue_requisition_controller');				 
					var item_account=$('#txt_item_account_'+row_num).val();
					//alert(row_num+"Row check");
					if(item_account=="")
					{
						$("#tr_"+row_num).remove();
					}
					
					$("#tbl_item_issue_list tbody:last").append(list_view_orders);	
					
					var numRow = $('table#tbl_item_issue_list tbody tr').length;
					//alert(numRow); 
					$('#txt_tot_row').val(numRow);
		
				}
			}

}

 /*function fnc_sub_section()
 {

		 $('#cbo_sub_section_name').css('display','none');
 }*/


function populate_row_dte()
{
	$('#tbl_item_issue_list tbody tr:not(:first)').remove();
}

function trans_history_popup(product_id)
{
	//alert (product_id);
	var cbo_company_name=$('#cbo_company_id').val();
	var page_link='requires/item_issue_requisition_controller.php?action=stock_popup&product_id='+product_id+'&cbo_company_name='+cbo_company_name;
	var title='Tansaction Stock History';
	
	 emailwindow=dhtmlmodal.open('EmailBox', 'iframe', page_link, title, 'width=300px,height=200px,center=1,resize=1,scrolling=0','');
}

</script>

</head>
<body onLoad="set_hotkey();">
<? echo load_freeze_divs ("../",$permission); ?>
<div align="center">
  	<fieldset style=" width:815px">
	<form  name="itemissuerequisition_1" id="itemissuerequisition_1" >
		<legend>Requisition Reference</legend>
		<table  align="center" cellspacing="3" border="0" cellpadding="5">
			<tr>
            	<td align="right" colspan="3">Indent No</td><td>
                <input type="text" name="txt_indent_no" id="txt_indent_no" class="text_boxes" style="width:132px" placeholder="Browse"  onDblClick="fnc_items_sys_popup()" readonly>
                <input type="hidden" name="txt_system_id" id="txt_system_id" class="text_boxes" style="width:132px" placeholder="Hidden id" readonly>
                </td>
           </tr>
           <tr>
				<td align="right" class="must_entry_caption">Company</td>
				<td> 
		        <? 
				$company="select comp.id,comp.company_name from lib_company comp where   comp.status_active=1 and comp.is_deleted=0 $company_cond order by company_name";
				echo create_drop_down("cbo_company_id",144,$company,"id,company_name",1,"--select--",0,"load_drop_down( 'requires/item_issue_requisition_controller', this.value, 'load_drop_down_location','location_td');load_drop_down( 'requires/item_issue_requisition_controller', this.value, 'load_drop_down_division','division_td');");
				  ?>
                 
		        </td>
				
				<td align="right" class="must_entry_caption">Indent Date</td>
		        <td><input type="text" name="txt_indent_date" id="txt_indent_date" class="datepicker" style="width:132px" readonly></td>
				<td align="right" class="must_entry_caption">Required Date</td>
				<td ><input type="text" name="txt_required_date" id="txt_required_date" class="datepicker" style="width:132px" readonly></td>
			</tr>
            <tr>
	            <td width="110" align="right">Location</td>
	            <td id="location_td" width="160">
					<?php 
						 echo create_drop_down( "cbo_location_name", 145,$blank_array,"", 1, "-- Select --" );
	                 ?> 	
	            </td>
	            <td width="110" align="right">Division</td>
	            <td id="division_td" width="160">
				   <?php 
						echo create_drop_down( "cbo_division_name", 145,$blank_array,"", 1, "-- Select --");
	               ?> 	
	            </td>
	            <td width="110" align="right" >Department</td>
	            <td id="department_td" width="145">
				   <?php 
						echo create_drop_down( "cbo_department_name", 145,$blank_array,"", 1, "-- Select --" );
	               ?> 	
	            </td>
	            
	          </tr>
				<tr>
	            <td  align="right">Section</td>
	            <td id="section_td" width="132">
					<?php 
						echo create_drop_down( "cbo_section_name", 145,$blank_array,"", 1, "-- Select --",'fnc_sub_section();' );
	                ?> 	
	            </td>
	            <td  align="right" id="sb_section">Sub Section</td>
	            <td id="sub_section_td" width="132">
					<?php 
						echo create_drop_down( "cbo_sub_section_name", 145,$blank_array,"", 1, "-- Select --" );
	                ?> 	
	                
	            </td>
				<td align="right">Delivery Point</td>
				<td colspan="5"><input type="text" name="cbo_delivery_point" id="cbo_delivery_point" style="width:130px" class="text_boxes"></td>
					
			</tr>
			<tr>
            	<td align="right">Manual Requisition No</td>
				<td><input type="text" name="txt_manual_requisition_no" id="txt_manual_requisition_no" style="width:130px" class="text_boxes" ></td>
				<td align="right">Remarks</td>
				<td colspan="3"><input type="text" name="txt_remarks" id="txt_remarks" style="width:420px" class="text_boxes" ></td>
			</tr>
			 <tr>
           		<td align="right">Ready To Approved</td>  
				<td>
				    <?
				    echo create_drop_down("cbo_ready_to_approved", 145, $yes_no, "", 1, "-- Select--", 2, "", "", "");
				    ?>
				</td>
           </tr>
            <tr>
				<td colspan="6" height="30" valign="middle" align="center">
					<input type="hidden" name="txt_is_approved" id="txt_is_approved" value="">
					<span id="approval_status_tr" style="color: red;font-size: 20px;"></span>	
				</td>
           </tr>
            <tr>
                 <td colspan="6" height="50" valign="middle" align="center" class="button_container">
							<? 
								echo load_submit_buttons( $permission,"fnc_item_issue_requisition_mst",0,1,"reset_form('itemissuerequisition_1,itemissuerequisition_2','item_issue_listview','','txt_tot_row,0','disable_enable_fields(\'cbo_company_id\');$(\'#tbl_item_issue_list tbody tr:not(:first)\').remove();','')") ; 
							?>
                  </td>
           </tr>
		</table>
		
	</form>
    </fieldset>
    </div>
	<div style="margin-top:30px;" id="Warning"></div>
    <div align="center">
    <fieldset style="width:1015px;">
	<form id="itemissuerequisition_2" name="itemissuerequisition_2" autocomplete="off" >
		
		<legend>Item Details</legend>
		<table width="1000" s class="rpt_table" cellspacing="0" rules="all" id="tbl_item_issue_list" >
		<thead>
			<tr>
				<th width="80" class="must_entry_caption" >Item Account</th>
				<th width="80">Item Group</th>
				<th width="80">Item Sub. Group</th>
				<th width="240">Item Description</th>
				<th width="100">Item Size</th>
				<th width="80">Required For</th>
				<th width="40">UOM</th>
				<th width="80" class="must_entry_caption">Req. Qty.</th>
				<th width="60">Stock</th>
                <th width="80">Remarks</th>
			</tr>
		</thead>
		<tbody>
		  	<tr  class="general" id="tr_1">
				<td width="80" >			        
                  <input type="text" name="txt_item_account_1" id="txt_item_account_1" placeholder="Browse" class="text_boxes" onDblClick="fnc_item_account(1)" style="width:80px;" readonly >
                   <input type="hidden" name="txt_product_id_1" id="txt_product_id_1" placeholder="browse" class="text_boxes" style="width:80px;" readonly >
		        </td>
			    <td width="80">
			        <input type="text" name="txt_item_group_1" id="txt_item_group_1" class="text_boxes" style="width:80px;" disabled>
	                <input type="hidden" name="hiddenitemgroupid_<? echo $table_row; ?>" id="hiddenitemgroupid_1" class="text_boxes" value="" style="width:80px;" />
			    </td>
			   	<td width="80">
			       <input type="text" name="txt_item_sub_1" id="txt_item_sub_1" class="text_boxes" disabled>
			    </td>
			    <td width="100" ><input type="text" name="txt_item_description_1" id="txt_item_description_1" class="text_boxes" style="width:240px" disabled  ></td>
			    <td width="40"><input type="text" name="txt_item_size_1" id="txt_item_size_1" class="text_boxes" style="width:100px" disabled></td>
			    <td width="60">
			        <input type="text" name="txt_required_for_1" id="txt_required_for_1" class="text_boxes_numeric" placeholder="Write" style="width:60px;">
			     </td>
			    <td  width="50" align="right">
	            <input type="text" name="txt_uom_1" id="txt_uom_1" class="text_boxes_numeric" style=" width:40px" readonly >
	                <input type="hidden" name="hiddentxtuom_1" id="hiddentxtuom_1" class="text_boxes" value="" style="width:60px;" />
	             <?
			      /*  echo create_drop_down("cbo_uom_1",50,$unit_of_measurement,"",1,"--select--",'','',1);*/
					?>
	            
	            </td>
			    <td width="60"><input type="text" name="txt_req_qty_1" id="txt_req_qty_1" class="text_boxes_numeric" style="width:60px;" placeholder="Write" ></td>
			    <td width="40" ><input type="text" name="txt_stock_1" id="txt_stock_1" class="text_boxes_numeric" style="width:40px;" readonly></td>
	            <td width="80" ><input type="text" name="txt_remarks_1" id="txt_remarks_1" class="text_boxes"  placeholder="Write" style="width:80px;" >
	            <input type="hidden" id="hidden_selectedID" readonly= "readonly" />
	             <input type="hidden" id="update_id_dtls" name="update_id_dtls" disabled />
	            
	            <input type="hidden" name="txt_tot_row" id="txt_tot_row" class="text_boxes_numeric" />
	            </td>
			 </tr>
		</tbody>
	      <tfoot>
	         <tr>
	 			<td colspan="10" height="50" valign="middle" align="center" class="button_container">
					<? 
	                    echo load_submit_buttons( $permission,"fnc_item_issue_requisition_dtls",0,0,"reset_form('itemissuerequisition_2','','','txt_tot_row,0','$(\'#tbl_item_issue_list tbody tr:not(:first)\').remove();','')",2) ; 
	                ?>
	            </td>
               </tr>
            </tfoot>
		</table>
        
		<div style="width:100%; margin-top:10px;" id="item_issue_listview" ></div>
	</form>
    </fieldset>
    </div>
</body>
<script src="../includes/functions_bottom.js" type="text/javascript"></script>
</html>