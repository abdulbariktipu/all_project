<?
session_start();
if( $_SESSION['logic_erp']['user_id'] == "" ) header("location:login.php");
require_once('../../includes/common.php');
extract($_REQUEST);
$_SESSION['page_permission']=$permission;
//--------------------------------------------------------------------------------------------------------------------
echo load_html_head_contents("Production Floor Information", "../../", 1, 1,$unicode,'','');

if ($_SESSION['logic_erp']["data_level_secured"]==1) 
{
	if ($_SESSION['logic_erp']["buyer_id"]!=0 && $_SESSION['logic_erp']["buyer_id"]!="") $buyer_name=" and id in (".$_SESSION['logic_erp']["buyer_id"].")"; else $buyer_name="";
	if ($_SESSION['logic_erp']["company_id"]!=0 && $_SESSION['logic_erp']["company_id"]!="") $company_name="and id in (".$_SESSION['logic_erp']["company_id"].")"; else $company_name="";
}
else
{
	$buyer_name="";
	$company_name="";
}
?>
 
<script>
	if( $('#index_page', window.parent.document).val()!=1) window.location.href = "../../logout.php";  
	var permission='<? echo $permission; ?>';
	
	
	function fnc_product_floor_info( operation )
	{
	   if (form_validation('cbo_company_name*cbo_location_name*txt_floor*txt_floor_sequence*cbo_production_process','Company Name*Location Name*Floor Name*Floor Sequence*Production Process')==false)
		{
			return;
		}
		else
		{
			eval(get_submitted_variables('cbo_company_name*cbo_location_name*txt_floor*cbo_status*update_id'));
			var data="action=save_update_delete&operation="+operation+get_submitted_data_string('cbo_company_name*cbo_location_name*txt_floor*txt_floor_sequence*cbo_production_process*cbo_status*update_id',"../../");
			freeze_window(operation);
			http.open("POST","requires/production_floor_controller.php", true);
			http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			http.send(data);
			http.onreadystatechange = fnc_productionfloor_reponse;
		}
	}
	
	function fnc_productionfloor_reponse()
	{
		if(http.readyState == 4) 
		{
			//alert(http.responseText);
			var reponse=trim(http.responseText).split('**');
			if (reponse[0].length>2) reponse[0]=10;
			show_msg(reponse[0]);
			document.getElementById('update_id').value  = reponse[2];
			show_list_view('','productionfloor_list_view','product_floor_list','../production/requires/production_floor_controller','setFilterGrid("list_view",-1)');
			set_button_status(0, permission, 'fnc_product_floor_info',1);
			reset_form('productfloorinfo_1','','');
			release_freezing();
		}
	}
			
 </script>
</head>
<body  onLoad="set_hotkey()">
	<div align="center" style="width:100%;">
	<? echo load_freeze_divs ("../../",$permission);  ?>
	<fieldset style="width:650px;">
		<legend>Product Floor Information</legend>
		<form name="productfloorinfo_1" id="productfloorinfo_1" autocomplete="off">	
			<table cellpadding="0" cellspacing="2" width="100%" align="center" border="0">
            	<tr><td width="100%" align="center">
                        <table width="450" align="center">
                        <tr>
                            <td width="150" class="must_entry_caption">Company</td>
                            <td colspan="2"> <? 
												echo create_drop_down( "cbo_company_name", 262, "select company_name,id from lib_company comp where is_deleted=0  and status_active=1 $company_cond  order by company_name",'id,company_name', 1, '--- Select Company ---', 0, "load_drop_down( 'requires/production_floor_controller', this.value, 'load_drop_down_location', 'location' )" ); ?>
                         </td>
                        </tr>
                        <tr>
                            <td width="150" class="must_entry_caption">Location</td>
                            <td colspan="2" id="location"> 	
							<? 
								 echo create_drop_down( "cbo_location_name", 262, "select location_name,id from lib_location where is_deleted=0  and status_active=1 order by location_name",'id,location_name', 1, '--- Select Location ---', 0, "" );
                            ?>
                            </td>
                        </tr>	
                        <tr>
                            <td width="150" class="must_entry_caption">Floor</td>
                            <td colspan="2">
                            <input type="text" name="txt_floor" id="txt_floor" style="width:250px" class="text_boxes"  maxlength="50" title="Maximum 50 Character">
                            </td>
                            
                        </tr>
                         <tr>
                            <td width="150" class="must_entry_caption">Floor Sequence</td>
                            <td colspan="2">
                            <input type="text" name="txt_floor_sequence" id="txt_floor_sequence" style="width:250px" class="text_boxes_numeric"  maxlength="50" title="Maximum 50 Character">
                            </td>
                            
                        </tr>		
                        <tr>
                            <td class="must_entry_caption">Production Process</td>
                            <td  colspan="2"><? 
                                    echo create_drop_down( "cbo_production_process", 262, $production_process,'', 1, '--Select--', 0 );
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td  colspan="2"><? 
                                    echo create_drop_down( "cbo_status", 262, $row_status,'', '', '', 1 );
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">&nbsp;						
                                <input  type="hidden"name="update_id" id="update_id">	
                            </td>					
                        </tr>
                        <tr>
                           <td colspan="3" height="40" valign="bottom" align="center" class="button_container">
                                <? 
                                    echo load_submit_buttons( $permission, "fnc_product_floor_info", 0,0 ,"reset_form('productfloorinfo_1','','',1)",1);
                                ?>
                            </td>					
                        </tr>
                        <tr>
                           <td colspan="3" height="20" valign="bottom" align="center" class="button_container"></td>					
                        </tr>
                        <tr>
                           <td colspan="3" valign="bottom" align="center"  id="product_floor_list">
							 <?
                                $arr=array(3=>$production_process,4=>$row_status);
                                echo  create_list_view ( "list_view", "Company Name,Location Name,Floor Name,Prod. Process,Status", "150,100,100,100,50","600","220",1, "select c.company_name,l.location_name,a.floor_name,a.status_active, a.production_process, a.id from  lib_prod_floor a, lib_company c, lib_location l  where a.company_id=c.id and a.location_id=l.id and a.is_deleted=0  order by a.floor_name", "get_php_form_data", "id","'load_php_data_to_form'", 1, "0,0,0,production_process,status_active", $arr , "company_name,location_name,floor_name,production_process,status_active", "../production/requires/production_floor_controller", 'setFilterGrid("list_view",-1);' ) ;
								?>
                            </td>					
                        </tr>
                    </table>
                </td>
                </tr>				
			</table>
		</form>	
	</fieldset>
    </div>
 </body>
 <script src="../../includes/functions_bottom.js" type="text/javascript">//set_bangla();</script>
