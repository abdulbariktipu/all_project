<?
/*-------------------------------------------- Comments
Purpose			: 	This form will create iron output
				
Functionality	:	This form is finish input entry
JS Functions	:
Created by		:	Shafuqr Rahman
Creation date 	: 	19-04-2018
Updated by 		: 	Kausar (Creating Print Report )	
Update date		: 	09-01-2014	   
QC Performed BY	:		
QC Date			:	
Comments		:
*/

session_start();
if( $_SESSION['logic_erp']['user_id'] == "" ) header("location:login.php");

require_once('../includes/common.php');
extract($_REQUEST);
$_SESSION['page_permission']=$permission;
$u_id=$_SESSION['logic_erp']['user_id'];
$level=return_field_value("user_level","user_passwd","id='$u_id' and valid=1 ","user_level");

//--------------------------------------------------------------------------------------------------------------------
echo load_html_head_contents("Iron Output Info","../", 1, 1, $unicode,'','');

/**
 * order type variable
 */
$order_type = "Self Order*Subcontract Order";
$order_type_values = "1*2";

/**
 * goods type variable
 */
$goods_type = "Good GMT In Hand*Damage GMT*Leftover Sample";
$goods_type_values = "1*2*3";
?>	

<script>
var permission='<? echo $permission; ?>';
if( $('#index_page', window.parent.document).val()!=1) window.location.href = "../../logout.php";

function dynamic_must_entry_caption(data)
{
 	if(data==1) 
	{
		$('#locations').css('color','blue');
		$('#floors').css('color','blue');

	}
	else
	{
		$('#locations').css('color','black');
		$('#floors').css('color','black');

	}

}

 
function openmypage(page_link,title)
{
	
	if ( form_validation('cbo_company_name*cbo_order_type*cbo_goods_type','Company Name*Order Type*Goods Type')==false )
	{
		return;
	}

	else
	{
		
		emailwindow=dhtmlmodal.open('EmailBox', 'iframe', page_link, title, 'width=900px,height=370px,center=1,resize=0,scrolling=1','');

		emailwindow.onclose=function()
		{
			//alert('some');
			var theform=this.contentDoc.forms[0];
			//alert(theform);
			var po_id=this.contentDoc.getElementById("hidden_id").value;//po id
			//alert(po_id);
			//var item_id=this.contentDoc.getElementById("hidden_grmtItem_id").value;			
			var buyer_id=this.contentDoc.getElementById("hidden_byer_name").value;	
			var country_id=this.contentDoc.getElementById("hidden_country_id").value;
			var style_ref_no=this.contentDoc.getElementById("hidden_style_ref_no").value;
			var gmts_item=this.contentDoc.getElementById("hidden_gmts_item").value;
			var location_name=this.contentDoc.getElementById("hidden_location_name").value;	
			var fob_rate=this.contentDoc.getElementById("hidden_order_rate").value;
			var currency=this.contentDoc.getElementById("hidden_currency").value;

			//alert(buyer_id);
			
				
			if (po_id!="")
			{
				//alert('buyer_name');
				//freeze_window(5);
				$("#txt_order_no").val(po_id);			
				$("#cbo_buyer_name").val(buyer_id);
				$("#txt_country").val(country_id);
				$("#txt_style_name").val(style_ref_no);
				$("#txt_item_name").val(gmts_item);
				$("#cbo_location_name").val(location_name);		
				$("#txt_fob_rate").val(fob_rate);
				$("#txt_currency").val(currency);			
				
				//onchange location_name store_name and floor_name
				load_drop_down( 'requires/left_over_finish_garments_receive_controller', $("#cbo_location_name").val(), 'load_drop_down_store_name', 'cbo_store_name' ); 
				load_drop_down( 'requires/left_over_finish_garments_receive_controller', $("#cbo_location_name").val(), 'load_drop_down_floor', 'cbo_floor' );
				//onchange location_name store_name and floor_name end

				childFormReset();//child from reset
				get_php_form_data(po_id+'**'+item_id+'**'+country_id+'**'+$('#hidden_preceding_process').val(), "populate_data_from_search_popup", "requires/iron_output_controller" );
 				
				var variableSettings=$('#sewing_production_variable').val();
				var styleOrOrderWisw=$('#styleOrOrderWisw').val();
				var variableSettingsReject=$('#iron_production_variable_rej').val();
				if(variableSettings!=1){ 
					get_php_form_data(po_id+'**'+item_id+'**'+variableSettings+'**'+styleOrOrderWisw+'**'+country_id+'**'+variableSettingsReject+'**'+$('#hidden_preceding_process').val(), "color_and_size_level", "requires/iron_output_controller" ); 
				}
				else
				{
					$("#txt_iron_qty").removeAttr("readonly");
				}
				
				if(variableSettingsReject!=1)
				{
					$("#txt_reject_qnty").attr("readonly");
				}
				else
				{
					$("#txt_reject_qnty").removeAttr("readonly");
				}
				
				show_list_view(po_id+'**'+item_id+'**'+country_id,'show_dtls_listview','list_view_container','requires/iron_output_controller','setFilterGrid(\'tbl_list_search\',-1)');
				show_list_view(po_id,'show_country_listview','list_view_country','requires/iron_output_controller','');
				set_button_status(0, permission, 'fnc_iron_input',1,0);
				release_freezing();
			}
		}
		$("#cbo_company_name").attr("disabled","disabled"); 
		$("#cbo_location_name").attr("disabled","disabled");
	}//end else
}//end function



function fnc_iron_input(operation)
{
	if(operation==4)
	{
		 var report_title=$( "div.form_caption" ).html();
		 print_report( $('#cbo_company_name').val()+'*'+$('#txt_mst_id').val()+'*'+report_title, "iron_output_print", "requires/iron_output_controller" ) 
		 return;
	}
	else if(operation==0 || operation==1 || operation==2)
	{
 		if ( form_validation('cbo_company_name*txt_order_no*cbo_iron_company*txt_iron_date','Company Name*Order No*Iron Company*Input Date')==false )
		{
			return;
		}		
		else
		{
			if($('#txt_iron_qty').val()<1&&$('#txt_reiron_qty').val()<1&&$('#txt_reject_qnty').val()<1)
			{
				alert("Iron quantity or Reiron quantity or Reject quantity should be filled up");
				return;
			}
			
			var current_date='<? echo date("d-m-Y"); ?>';
			if(date_compare($('#txt_iron_date').val(), current_date)==false)
			{
				alert("Iron Date Can not Be Greater Than Current Date");
				return;
			}	
			freeze_window(operation);			
			var sewing_production_variable = $("#sewing_production_variable").val();
			var colorList = ($('#hidden_colorSizeID').val()).split(",");
			var variableSettingsReject=$('#iron_production_variable_rej').val();
			
			var i=0; var k=0; var colorIDvalue=''; var colorIDvalueRej='';
			if(sewing_production_variable==2)//color level
			{
 				$("input[name=txt_color]").each(function(index, element) {
 					if( $(this).val()!='' )
					{
						if(i==0)
						{
							colorIDvalue = colorList[i]+"*"+$(this).val();
						}
						else
						{
							colorIDvalue += "**"+colorList[i]+"*"+$(this).val();
						}
					}
					i++;
				});
			}
			else if(sewing_production_variable==3)//color and size level
			{
 				$("input[name=colorSize]").each(function(index, element) {
					if( $(this).val()!='' )
					{
						if(i==0)
						{
							colorIDvalue = colorList[i]+"*"+$(this).val();
						}
						else
						{
							colorIDvalue += "***"+colorList[i]+"*"+$(this).val();
						}
					}
 					i++;
				});
			}
			
			if(variableSettingsReject==2)//color level
			{
				$("input[name=txtColSizeRej]").each(function(index, element) {
 					if( $(this).val()!='' )
					{
						if(k==0)
						{
							colorIDvalueRej = colorList[k]+"*"+$(this).val();
						}
						else
						{
							colorIDvalueRej += "**"+colorList[k]+"*"+$(this).val();
						}
					}
					k++;
				});
				//alert (colorIDvalueRej);return;
			}
			else if(variableSettingsReject==3)//color and size level
			{
				$("input[name=colorSizeRej]").each(function(index, element) {
					if( $(this).val()!='' )
					{
						if(k==0)
						{
							colorIDvalueRej = colorList[k]+"*"+$(this).val();
						}
						else
						{
							colorIDvalueRej += "***"+colorList[k]+"*"+$(this).val();
						}
					}
 					k++;
				});
			}
			 
			var data="action=save_update_delete&operation="+operation+"&colorIDvalue="+colorIDvalue+"&colorIDvalueRej="+colorIDvalueRej+get_submitted_data_string('garments_nature*cbo_company_name*cbo_country_name*sewing_production_variable*iron_production_variable_rej*hidden_po_break_down_id*hidden_colorSizeID*cbo_buyer_name*txt_style_no*cbo_item_name*txt_order_qty*cbo_source*cbo_iron_company*cbo_location*cbo_floor*txt_iron_date*txt_reporting_hour*txt_iron_qty*txt_reiron_qty*txt_challan*txt_remark*txt_sewing_quantity*txt_cumul_iron_qty*txt_yet_to_iron*hidden_break_down_html*txt_mst_id*txt_reject_qnty*hidden_currency_id*hidden_exchange_rate*hidden_piece_rate*cbo_work_order',"../");
 			
 			http.open("POST","requires/iron_output_controller.php",true);
			http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			http.send(data);
			http.onreadystatechange = fnc_iron_input_Reply_info;
		}
	}
}
  


function childFormReset()
{
	//txt_iron_date  txt_reporting_hour cbo_time txt_iron_qty txt_remark txt_sewing_quantity txt_cumul_iron_qty txt_yet_to_iron
	reset_form('','','txt_reporting_hour*txt_iron_qty*txt_reiron_qty*txt_challan*txt_remark*txt_sewing_quantity*txt_cumul_iron_qty*txt_yet_to_iron*hidden_break_down_html*txt_mst_id','','');
 	$('#txt_sewing_quantity').attr('placeholder','');//placeholder value initilize
	$('#txt_cumul_iron_qty').attr('placeholder','');//placeholder value initilize
	$('#txt_yet_to_iron').attr('placeholder','');//placeholder value initilize
	$('#list_view_container').html('');//listview container
	$("#breakdown_td_id").html('');

}  

function fn_hour_check(val)
{
	if(val*1>12)
	{
		alert("You Cross 12!!This is 12 Hours.");
		$("#txt_reporting_hour").val('');
	}
}

function fn_total(tableName,index) // for color and size level
{
    var filed_value = $("#colSize_"+tableName+index).val();
	var placeholder_value = $("#colSize_"+tableName+index).attr('placeholder');
	var txt_user_lebel=$('#txt_user_lebel').val();
 	var hidden_variable_cntl=$('#hidden_variable_cntl').val()*1;
	if(filed_value*1 > placeholder_value*1)
	{
		if(hidden_variable_cntl==1 && txt_user_lebel!=2)
		{
			alert("Qnty Excceded by"+(placeholder_value-filed_value));
			$("#colSize_"+tableName+index).val('');
			$("#txt_iron_qty").val('');
		}
		else
		{
			if( confirm("Qnty Excceded by"+(placeholder_value-filed_value)) )	
				void(0);
			else
			{
				$("#colSize_"+tableName+index).val('');
			}
		}
		
	}
	
	var totalRow = $("#table_"+tableName+" tr").length;
	//alert(tableName);
	math_operation( "total_"+tableName, "colSize_"+tableName, "+", totalRow);
	if($("#total_"+tableName).val()*1!=0)
	{
		$("#total_"+tableName).html($("#total_"+tableName).val());
	}
	var totalVal = 0;
	$("input[name=colorSize]").each(function(index, element) {
        totalVal += ( $(this).val() )*1;
    });
	$("#txt_iron_qty").val(totalVal);
}

function fn_total_rej(tableName,index) // for color and size level
{
    var filed_value = $("#colSizeRej_"+tableName+index).val();
	var colsizes= $("#colSize_"+tableName+index).val();
    if(colsizes=="" && filed_value !="")
    {
    	// this if condition add for when size null but reject qnty given scenery 
    	$("#colSize_"+tableName+index).val(0);
    }
	
	var totalRow = $("#table_"+tableName+" tr").length;
	//alert(tableName);
	math_operation( "total_"+tableName, "colSizeRej_"+tableName, "+", totalRow);
	
	var totalValRej = 0;
	$("input[name=colorSizeRej]").each(function(index, element) {
        totalValRej += ( $(this).val() )*1;
    });
	$("#txt_reject_qnty").val(totalValRej);
}

function fnc_company_check(val)  
{
	if(val==1)
	{
		if($("#cbo_company_name").val()==0)
		{
			alert("Please Select Company.");
			$("#cbo_source").val(0);
			$("#cbo_iron_company").val(0);
			return;
		}
		else
		{
			get_php_form_data(document.getElementById('cbo_iron_company').value,'production_process_control','requires/iron_output_controller' );
		}
	}
	else
	{
		get_php_form_data(document.getElementById('cbo_company_name').value,'production_process_control','requires/iron_output_controller' );
	}
 }



function fn_colorlevel_total(index) //for color level
{
	
	var filed_value = $("#colSize_"+index).val();
	var placeholder_value = $("#colSize_"+index).attr('placeholder');
	var txt_user_lebel=$('#txt_user_lebel').val();
 	var hidden_variable_cntl=$('#hidden_variable_cntl').val()*1;
	if(filed_value*1 > placeholder_value*1)
	{
		if(hidden_variable_cntl==1 && txt_user_lebel!=2)
		{
			alert("Qnty Excceded by"+(placeholder_value-filed_value));
			$("#colSize_"+index).val('');
			$("#txt_iron_qty").val('');
		}
		else
		{
			if( confirm("Qnty Excceded by"+(placeholder_value-filed_value)) )	
				void(0);
			else
			{
				$("#colSize_"+index).val('');
			}
		}
	}
	
    var totalRow = $("#table_color tbody tr").length;
	//alert(totalRow);
	math_operation( "total_color", "colSize_", "+", totalRow);
	$("#txt_iron_qty").val( $("#total_color").val() );
} 

function fn_colorRej_total(index) //for color level
{
	var filed_value = $("#colSizeRej_"+index).val();
    var totalRow = $("#table_color tbody tr").length;
	//alert(totalRow);
	math_operation( "total_color_rej", "colSizeRej_", "+", totalRow);
	$("#txt_reject_qnty").val( $("#total_color_rej").val() );
}

function put_country_data(po_id, item_id, country_id, po_qnty, plan_qnty)
{
	freeze_window(5);
	
	$("#cbo_item_name").val(item_id);
	$("#txt_order_qty").val(po_qnty);
	$("#cbo_country_name").val(country_id);
 				
	childFormReset();//child from reset
	get_php_form_data(po_id+'**'+item_id+'**'+country_id+'**'+$('#hidden_preceding_process').val(), "populate_data_from_search_popup", "requires/iron_output_controller" );
	
	var variableSettings=$('#sewing_production_variable').val();
	var styleOrOrderWisw=$('#styleOrOrderWisw').val();
	var variableSettingsReject=$('#iron_production_variable_rej').val();
	if(variableSettings!=1)
	{ 
		get_php_form_data(po_id+'**'+item_id+'**'+variableSettings+'**'+styleOrOrderWisw+'**'+country_id+'**'+variableSettingsReject+'**'+$('#hidden_preceding_process').val(), "color_and_size_level", "requires/iron_output_controller" ); 
	}
	else
	{
		$("#txt_iron_qty").removeAttr("readonly");
	}
	
	if(variableSettingsReject!=1)
	{
		$("#txt_reject_qnty").attr("readonly");
	}
	else
	{
		$("#txt_reject_qnty").removeAttr("readonly");
	}
	
	show_list_view(po_id+'**'+item_id+'**'+country_id,'show_dtls_listview','list_view_container','requires/iron_output_controller','');
	set_button_status(0, permission, 'fnc_iron_input',1,0);
	release_freezing();
}

function fnc_valid_time(val,field_id)
{
	var val_length=val.length;
	if(val_length==2)
	{
		document.getElementById(field_id).value=val+":";
	}
	
	var colon_contains=val.contains(":");
	if(colon_contains==false)
	{
		if(val>23)
		{
			document.getElementById(field_id).value='23:';
		}
	}
	else
	{
		var data=val.split(":");
		var minutes=data[1];
		var str_length=minutes.length;
		var hour=data[0]*1;
		
		if(hour>23)
		{
			hour=23;
		}
		
		if(str_length>=2)
		{
			minutes= minutes.substr(0, 2);
			if(minutes*1>59)
			{
				minutes=59;
			}
		}
		
		var valid_time=hour+":"+minutes;
		document.getElementById(field_id).value=valid_time;
	}
}

function numOnly(myfield, e, field_id)
{
	var key;
	var keychar;
	if (window.event)
		key = window.event.keyCode;
	else if (e)
		key = e.which;
	else
		return true;
	keychar = String.fromCharCode(key);

	// control keys
	if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) )
	return true;
	// numbers
	else if ((("0123456789:").indexOf(keychar) > -1))
	{
		var dotposl=document.getElementById(field_id).value.lastIndexOf(":");
		if(keychar==":" && dotposl!=-1)
		{
			return false;
		}
		return true;
	}
	else
		return false;
}
 
function fnc_workorder_search(supplier_id)
{
	
	if( form_validation('cbo_company_name*txt_order_no*cbo_iron_company','Company Name*Order No*Iron Company')==false )
	{
		return;
	}
	
	if($("#cbo_source").val()!=3)
	{
		return;
	}
	//alert(supplier_id)
	var company = $("#cbo_company_name").val();
	var po_break_down_id = $("#hidden_po_break_down_id").val();
	load_drop_down( 'requires/iron_output_controller', company+"_"+supplier_id+"_"+po_break_down_id, 'load_drop_down_workorder', 'workorder_td' ); 
	//alert($('#cbo_cutting_company option').size())
}

function fnc_workorder_rate(data,id)
{
	get_php_form_data(data+"_"+id, "populate_workorder_rate", "requires/iron_output_controller" );
}
</script>
</head>
<body onLoad="set_hotkey()">
<div style="width:100%;">
	<? echo load_freeze_divs ("../",$permission);  ?>
	<div style="width:930px; float:left" align="center">
        <fieldset style="width:930px;">
        <legend>Production Module</legend>  
            <form name="ironoutput_1" id="ironoutput_1" autocomplete="off" >
  				<fieldset>
                    


                    <table width="100%" border="0">
                        <tr>
                            <td width="110" class="must_entry_caption">Company</td>
                            <td>                                
								<? 
								echo create_drop_down( "cbo_company_name", 170, "select company_name,id from lib_company comp where is_deleted=0  and status_active=1 $company_cond  order by company_name",'id,company_name', 1, '--- Select Company ---', 0, "load_drop_down( 'requires/left_over_finish_garments_receive_controller', this.value, 'load_drop_down_location', 'location' )" );
								?>	
                                
							</td>
							<td width="" id="locations">Location</td>
                             <td width="" id="location">
								 <?
                                 echo create_drop_down( "cbo_location_name", 170, $blank_array,'', 1, '--- Select Location ---', $selected, "",0,0 );
                                 ?>
							 </td>

						
                          
							<td width="120" class="must_entry_caption">Date</td>
                             <td width=""> 
                              	<input name="txt_iron_date" id="txt_iron_date" class="datepicker" type="text" value="<? echo date("d-m-Y")?>" style="width:100px;"  />
                            </td>
                          <!-- <td width="" class="must_entry_caption">Iron Company</td>
                             <td id="iron_company_td" width="170">
								 <?
                                 echo create_drop_down( "cbo_iron_company", 170, $blank_array,"", 1, "-- Select --", $selected, "" );
                                 ?>
						     </td> -->

						    <tr>

                            <td width="90" class="must_entry_caption">Order Type</td>
                            <td width="170" id="order_type">
                            	<?
                                 echo create_drop_down( "cbo_order_type", 170, $blank_array, "", 1, "-- Select --", $selected, "", "", "", $order_type, $order_type_values);
                                 ?>
							</td>
							<td width="">Buyer</td>
                            <td width="170">
								<? 
                                echo create_drop_down( "cbo_buyer_name", 170, "select id,buyer_name from lib_buyer where is_deleted=0 and status_active=1 order by buyer_name","id,buyer_name", 1, "-- Select Buyer --", $selected, "",1,0 );
                                ?>
							</td>
							 <td width="" class="must_entry_caption">Store Name</td>
                            <td width="170" id="cbo_store_name">
                            	
								<? 
                                 echo create_drop_down( "cbo_store_name", 170, "select id,store_name from lib_store_location  where id='$data'", "id,store_name", 1, "-- Select Store --", $selected,"",0,0);
                                ?>
							</td>
							</tr>
							<tr> 
								<td width="" id="floors">Floor</td>
                              <td width="" id="cbo_floor">
								  <? 
                                  echo create_drop_down( "cbo_floor_name", 170, $blank_array, "",1, "-- Select Floor --", $selected, "" );
                                  ?>
                              </td>
                            <!-- <td width="130" >Country</td>
                            <td width="170">
                                <?
                                    echo create_drop_down( "cbo_country_name", 170, "select id,country_name from lib_country","id,country_name", 1, "-- Select Country --", $selected, "",1 );
                                ?> 
                            </td> -->
							<td width="100">Exchange Rate</td>
                            <td width="170">
                            	<input name="exchange_rate" id="exchange_rate" class="text_boxes" style="width:160px " readonly>	
							</td>
                             
                             <!-- <td width="100">Job No</td>
                            <td width="170">
                            	<input name="txt_job_no" id="txt_job_no" class="text_boxes" style="width:160px " disabled readonly>	
							</td> -->


                        </tr>
                        <tr>    
                           
                            <td width="">Remarks</td>
                            <td width="" colspan="4">
								<input name="remarks" id="remarks" class="text_boxes"  style="width:100% " >
							</td>


                        </tr>
                        
                        <!-- <tr>
                         	 <td class="">Work Order</td>
                             <td  id="workorder_td">
                                 <?
                                 echo create_drop_down( "cbo_work_order",170, $blank_array,"", 1, "-- Select Work Order--", $selected, "",0 );	
                                 ?>
                             </td>
                             <td  id="workorder_rate_id" style=" color:red; font-size:12px" colspan="2"></td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             
                        </tr> -->
                    </table>

                </fieldset>
                <br />
                 <table cellpadding="0" cellspacing="1" width="100%">
                    <tr>
                    	<td width="30%" valign="top">
                            <fieldset>
                            <legend>New Entry</legend>
                                 <table  cellpadding="0" cellspacing="2" width="100%">
                                    	<tr>
                                            <td width="120">Goods Type</td>
                                             <td width="" id="goods_type"> 
                                              	<?
					                                 echo create_drop_down( "cbo_goods_type", 170, $blank_array, "", 1, "-- Select Goods Type --", $selected, "", "", "", $goods_type, $goods_type_values);
					                             ?>
					                          </td>
                                    	</tr>
                                         <tr>
                                            <td width="">PO No</td> 
                                            <td width=""> 
										       <input name="txt_order_no" placeholder="Double Click to Search" id="txt_order_no" onDblClick="openmypage('requires/left_over_finish_garments_receive_controller.php?action=order_popup&company='+$('#cbo_company_name').val()+'&order_type='+$('#cbo_order_type').val()+'&goods_type='+$('#cbo_goods_type').val(),'Order Search')"  class="text_boxes" style="width:155px " readonly />
												<input type="hidden" id="hidden_po_break_down_id" value="" />                                              
                                            </td>
                                         </tr> 
                                     <tr>  
                                         <td width="">Style Name</td> 
                                         <td width=""> 
                                            <input name="txt_style_name" id="txt_style_name" class="text_boxes"  style="width:100px" readonly="" />
                                        </td>
                                    </tr>
                                     <tr>  
                                         <td width="">Item Name</td> 
                                         <td width=""> 
                                            <input name="txt_item_name" id="txt_item_name" class="text_boxes"  style="width:100px" readonly="" />
                                        </td>
                                    </tr>
                                    <tr>  
                                         <td width="">Country</td> 
                                         <td width=""> 
                                            <input name="txt_country" id="txt_country" class="text_boxes"  style="width:100px" type="text" readonly="" />
                                        </td>
                                    </tr>
                                    <tr>
                                         <td width="">Total Left Over Receive</td> 
                                         <td>
                                           <input type="text" name="txt_total_left_over_receive" id="txt_total_left_over_receive" class="text_boxes" style="width:100px" />
                                         </td>
                                    </tr>
                                    <tr>
                                    	<td width="">Remarks</td> 
                                        <td width="" > 
                                        	<input type="text" name="txt_remark" id="txt_remark" class="text_boxes" style="width:100px" />
                                        </td>
                                   </tr>
                                </table>
                            </fieldset>
                        </td>
                        <td width="1%" valign="top">
                        </td>
                        <td width="25%" valign="top">
                            <fieldset>
                            <legend>Display</legend>
                                <table  cellpadding="0" cellspacing="2" width="100%" >
                                	<tr>
                                        <td width="140">Currency</td>
                                        <td>
                                         <input type="text" name="txt_currency" id="txt_currency" class="text_boxes" style="width:80px"  />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="140">FOB rate</td>
                                        <td>
                                         <input type="text" name="txt_fob_rate" id="txt_fob_rate" class="text_boxes" style="width:80px"  />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=""> Leftover Amount</td>
                                        <td>
                                         <input type="text" name="txt_leftover_amount" id="txt_leftover_amount" class="text_boxes" style="width:80px"   />
                                        </td>
                                    </tr>
                                     <tr>
                                        <td width="">BDT Amount</td>
                                        <td>
                                         <input type="text" name="txt_bdt_amount" id="txt_bdt_amount" class="text_boxes" style="width:80px" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="">Room</td>
                                        <td>
                                         <input type="text" name="txt_room" id="txt_room" class="text_boxes" style="width:80px" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="">Rack</td>
                                        <td>
                                         <input type="text" name="txt_rack" id="txt_rack" class="text_boxes" style="width:80px" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="">Shelf</td>
                                        <td>
                                         <input type="text" name="txt_shelf" id="txt_shelf" class="text_boxes" style="width:80px" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="">Bin</td>
                                        <td>
                                         <input type="text" name="txt_bin" id="txt_bin" class="text_boxes" style="width:80px" />
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>	
                        </td>
                        <td width="40%" valign="top" >
                            <div style="max-height:300px; overflow-y:scroll" id="breakdown_td_id" align="center"></div>
                        </td>
                    </tr>
                     <tr>
		   				<td align="center" colspan="9" valign="middle" class="button_container">
							<?
							$date=date('d-m-Y');
                            echo load_submit_buttons( $permission, "fnc_iron_input", 0, 1,"reset_form('ironoutput_1','list_view_country','','txt_iron_date,".$date."','childFormReset()')",1); 
                            ?>
                            <input type="hidden" name="txt_mst_id" id="txt_mst_id" readonly />
           				</td>
           				<td>&nbsp;</td>					
		  			</tr>
                </table>
         	<div style="width:930px; margin-top:5px;"  id="list_view_container" align="center"></div>
            </form>
        </fieldset>
    </div>
	<div id="list_view_country" style="width:380px; overflow:auto; float:left; padding-top:5px; margin-top:5px; position:relative; margin-left:10px"></div>
</div>
</body>
<script src="../includes/functions_bottom.js" type="text/javascript"></script>
</html>