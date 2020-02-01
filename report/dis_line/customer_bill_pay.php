<!DOCTYPE html>
<html>
<head>
    <title>Customer Bill Pay</title>
    <link rel="stylesheet" href="windowfiles/dhtmlwindow.css" type="text/css" />

    <script type="text/javascript" src="windowfiles/dhtmlwindow.js">

    /***********************************************
    * DHTML Window Widget- © Dynamic Drive (www.dynamicdrive.com)
    * This notice must stay intact for legal use.
    * Visit http://www.dynamicdrive.com/ for full source code
    ***********************************************/
    </script>

    <link rel="stylesheet" href="modalfiles/modal.css" type="text/css" />
    <script type="text/javascript" src="modalfiles/modal.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<?
require_once('includes/common.php');
/*extract($_REQUEST);
$_SESSION['page_permission']=$permission;*/

//--------------------------------------------------------------------------------------------------------------------
//echo load_html_head_contents("Grey Fabric Transfer Info","../../", 1, 1, '','',''); 

?>	

<script>
    function openmypage_orderNo(type)
    {
    	var cbo_company_id = 1;
    	var cbo_company_id_to = 3;

    	var title = 'Order Info';	
    	var page_link = 'requires/customer_bill_pay_controller.php?cbo_company_id='+cbo_company_id+'&type='+type+'&cbo_company_id_to='+cbo_company_id_to+'&action=order_popup';

        emailwindow=dhtmlmodal.open('EmailBox', 'iframe', page_link, title, 'width=950px,height=300px,center=1,resize=0,scrolling=1')

    	emailwindow.onclose=function(){ //Define custom code to run when window is closed
            var theform=this.contentDoc.forms[0]; //Access first form inside iframe just for your reference
            var theemail=this.contentDoc.getElementById("order_id"); //Access form field with id="order_id" inside iframe
            //document.getElementById("txt_from_order_no").innerHTML=theemail.value; //Assign the email to a span on the page

            var order_id=this.contentDoc.getElementById("order_id").value;  
            $("#txt_from_po_qnty").val(order_id); //Assign the email to a span on the page
            $("#txt_from_order_id").val(order_id); //Assign the email to a span on the page
            $("#txt_from_order_no").val(order_id); //Assign the email to a span on the page

            get_php_form_data(order_id+"**"+type, "populate_data_from_order", "requires/customer_bill_pay_controller" );
            /*if(type=='from')
            {
                load_drop_down( 'requires/customer_bill_pay_controller', order_id, 'load_drop_down_item_desc', 'itemDescTd' );
                show_list_view(order_id,'show_dtls_list_view','list_fabric_desc_container','requires/customer_bill_pay_controller','');
            }*/
            return true;
        }
    }

    function openmypage_orderInfo(type)
    {

        var txt_order_no = $('#txt_'+type+'_order_no').val();
        var txt_order_id = $('#txt_'+type+'_order_id').val();
        var title = 'Order Info';   
        var page_link = 'requires/customer_bill_pay_controller.php?txt_order_no='+txt_order_no+'&txt_order_id='+txt_order_id+'&type='+type+'&action=orderInfo_popup';
          
        emailwindow=dhtmlwindow.open('EmailBox', 'iframe', page_link, title, 'width=800px,height=300px,center=1,resize=1,scrolling=0','../');
    }
</script>
</head>
<body>
<div style="width:100%;">   		 
    <form name="transferEntry_1" id="transferEntry_1" autocomplete="off" >
        <div style="width:760px; float:left" align="center">   
            <fieldset style="width:760px;">
            <legend>Grey Fabric Transfer Entry</legend>

                <table width="750" cellspacing="2" cellpadding="2" border="0" id="tbl_dtls">
                    <tr>
                        <td width="49%" valign="top">
                            <fieldset>
                            <legend>From Order</legend>
                                <table id="from_order_info" cellpadding="0" cellspacing="1" width="100%">										
                                    <tr>
                                        <td width="30%" class="must_entry_caption">Order No</td>
                                        <td>
                                            <input type="text" name="txt_from_order_no" id="txt_from_order_no" style="width:150px;" placeholder="Double click to search" onDblClick="openmypage_orderNo('from');" readonly />
                                            <input type="hidden" name="txt_from_order_id" id="txt_from_order_id" readonly>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>Order Qnty</td>
                                        <td>
                                            <input type="text" name="txt_from_po_qnty" id="txt_from_po_qnty" class="text_boxes" style="width:150px;" disabled="disabled" placeholder="Display" /></td>
                                    </tr>
                                    <tr>
                                    </tr>						
                                    <tr>
                                        <td>Style Ref.</td>
                                        <td>
                                            <input type="text" name="txt_from_style_ref" id="txt_from_style_ref" class="text_boxes" style="width:150px;" disabled="disabled" placeholder="Display" /></td>
                                    </tr>
                                    <tr>
                                        <td>Job No</td>						
                                        <td>                       
                                            <input type="text" name="txt_from_job_no" id="txt_from_job_no" class="text_boxes" style="width:150px" disabled="disabled" placeholder="Display" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gmts Item</td>
                                        <td>
                                            <input type="text" name="txt_from_gmts_item" id="txt_from_gmts_item" class="text_boxes" style="width:150px;" disabled="disabled" placeholder="Display" /></td>
                                    </tr>
                                    <tr>
                                        <td>Shipment Date</td>						
                                        <td>
                                            <input type="text" name="txt_from_shipment_date" id="txt_from_shipment_date" class="datepicker" style="width:150px" disabled="disabled" placeholder="Display" />
                                            <input type="button" class="formbutton" style="width:80px" value="View" onClick="openmypage_orderInfo('from');">
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </td>
	</form>
</div>  
</body>  
<script src="includes/functions_bottom.js" type="text/javascript"></script>
<script src="includes/functions.js" type="text/javascript"></script>
</html>
