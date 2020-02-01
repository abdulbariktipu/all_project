<?
require_once('../includes/common.php');
/*extract($_REQUEST);
$_SESSION['page_permission']=$permission;*/

//--------------------------------------------------------------------------------------------------------------------
echo load_html_head_contents("Customer Bill Pay","../", 1, 1, '','','',1); 

?>  
<!DOCTYPE html>
<html>
<head>
   <!--  <link rel="stylesheet" href="../css/dhtmlwindow.css" type="text/css" />
   <script type="text/javascript" src="../popup_window_js/dhtmlwindow.js">
   
   /***********************************************
   * DHTML Window Widget- © Dynamic Drive (www.dynamicdrive.com)
   * This notice must stay intact for legal use.
   * Visit http://www.dynamicdrive.com/ for full source code
   ***********************************************/
   </script>
   
   <link rel="stylesheet" href="../css/modal.css" type="text/css" />
   <script type="text/javascript" src="../popup_window_js/modal.js"></script> -->
    

    <!-- set up your links, either via text links or form buttons Start-->
    <SCRIPT language=JavaScript>
        // Start
        // http://www.dynamicdrive.com/dynamicindex11/copytext.htm
        //Animated Window- By Rizwan Chand (rizwanchand@hotmail.com)
        //Modified by DD for NS compatibility
        //Visit http://www.dynamicdrive.com for this script
        function expandingWindow(website) 
        {
            var windowprops='width=100,height=100,scrollbars=yes,status=yes,resizable=yes'
            var heightspeed = 15; // vertical scrolling speed (higher = slower)
            var widthspeed = 22;  // horizontal scrolling speed (higher = slower)
            var leftdist = 10;    // distance to left edge of window
            var topdist = 10;     // distance to top edge of window

            if (window.resizeTo&&navigator.userAgent.indexOf("Opera")==-1) 
            {
                var winwidth = window.screen.availWidth - leftdist;
                var winheight = window.screen.availHeight - topdist;
                var sizer = window.open("","","left=" + leftdist + ",top=" + topdist +","+ windowprops);
                for (sizeheight = 1; sizeheight < winheight; sizeheight += heightspeed)
                sizer.resizeTo("1", sizeheight);
                for (sizewidth = 1; sizewidth < winwidth; sizewidth += widthspeed)
                sizer.resizeTo(sizewidth, sizeheight);
                sizer.location = website;
            }
            else
                window.open(website,'mywindow');
        }
        // End
    </SCRIPT>
    <!-- set up your links, either via text links or form buttons End-->

    <script>
        function openmypage_customerNo(type)
        {
            var cbo_company_id = 1;
            var cbo_company_id_to = 3;

            var title = 'Order Info';   
            var page_link = 'requires/customer_bill_pay_controller.php?cbo_company_id='+cbo_company_id+'&type='+type+'&cbo_company_id_to='+cbo_company_id_to+'&action=customer_popup';

            emailwindow=dhtmlmodal.open('EmailBox', 'iframe', page_link, title, 'width=950px,height=300px,center=1,resize=1,scrolling=1','../css')

            emailwindow.onclose=function() //Define custom code to run when window is closed
            { 
                var theform=this.contentDoc.forms[0]; //Access first form inside iframe just for your reference
                var theemail=this.contentDoc.getElementById("customer_id"); //Access form field with id="customer_id" inside

                var customer_id=this.contentDoc.getElementById("hidd_customer_id").value;  
                var customer_name=this.contentDoc.getElementById("hidd_customer_name").value;  
                var customer_phone_no=this.contentDoc.getElementById("hidd_customer_phone_no").value;  
                var customer_address=this.contentDoc.getElementById("hidd_customer_address").value;  
                var hidd_state=this.contentDoc.getElementById("hidd_state").value;  
                var hidd_start_date=this.contentDoc.getElementById("hidd_start_date").value;  
                $("#customer_id").val(customer_id); //Assign the email to a span on the page
                $("#txt_customer_name").val(customer_name); //Assign the email to a span on the page
                $("#txt_customer_phone_no").val(customer_phone_no);
                $("#txt_customer_address").val(customer_address);
                $("#txt_state").val(hidd_state);
                $("#txt_start_date").val(hidd_start_date);

                get_php_form_data(customer_id+"**"+customer_name, "populate_data_from_customer_bill", "requires/customer_bill_pay_controller" );
                /*if(type=='from')
                {
                    load_drop_down( 'requires/customer_bill_pay_controller', customer_id, 'load_drop_down_item_desc', 'itemDescTd' );
                    show_list_view(customer_id,'show_dtls_list_view','list_fabric_desc_container','requires/customer_bill_pay_controller','');
                }*/
                return true;
            }
        }

        function openmypage_billInfo(type)
        {
            var txt_customer_id = $('#customer_id').val();
            var txt_customer_name = $('#txt_customer_name').val();
            var title = 'Customer Bill Info';   
            var page_link = 'requires/customer_bill_pay_controller.php?txt_customer_id='+txt_customer_id+'&txt_customer_name='+txt_customer_name+'&action=customer_billInfo_popup';
              
            emailwindow=dhtmlmodal.open('EmailBox', 'iframe', page_link, title, 'width=800px,height=300px,center=1,resize=1,scrolling=0','../');
        }

        function active_inactive(str)
        {
            //alert(str);
        }
    </script>
</head>
<body>
</head>
<body>
<div style="width:100%;">   		 
    <form name="transferEntry_1" id="transferEntry_1" autocomplete="off" >
        <div style="width:760px; float:left" align="center">   
            <fieldset style="width:760px;">
                <legend>Customer Bill Payment Entry</legend>
                <table width="750" cellspacing="2" cellpadding="2" border="0" id="tbl_dtls">
                    <tr>
                        <td width="49%" valign="top">
                            <fieldset>
                                <legend>Customer Bill Pay</legend>
                                <table id="from_order_info" cellpadding="0" cellspacing="1" width="100%">										
                                    <tr>
                                        <td width="30%" class="must_entry_caption">Customer Name</td>
                                        <td>
                                            <input type="text" name="txt_customer_name" id="txt_customer_name" class="text_boxes" style="width:150px;" placeholder="Double click to search" onDblClick="openmypage_customerNo('from');" readonly />
                                            <input type="hidden" name="customer_id" id="customer_id" readonly>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>Customer Phone</td>
                                        <td>
                                            <input type="text" name="txt_customer_phone_no" id="txt_customer_phone_no" class="text_boxes" style="width:150px;" disabled="disabled" placeholder="Display" /></td>
                                    </tr>
                                    <tr>
                                    </tr>						
                                    <tr>
                                        <td>Address</td>
                                        <td>
                                            <input type="text" name="txt_customer_address" id="txt_customer_address" class="text_boxes" style="width:150px;" disabled="disabled" placeholder="Display" /></td>
                                    </tr>
                                    <tr>
                                        <td>State</td>						
                                        <td>                       
                                            <input type="text" name="txt_state" id="txt_state" class="text_boxes" style="width:150px" disabled="disabled" placeholder="Display" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Start Date</td>						
                                        <td>
                                            <input type="text" name="txt_start_date" id="txt_start_date" class="datepicker" style="width:150px" disabled="disabled" placeholder="Display" />
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <td>Bill</td>
                                        <td>
                                            <input type="text" name="txt_customer_bill" id="txt_customer_bill" class="text_boxes" style="width:150px;" disabled="disabled" placeholder="Display" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Billing Status</td>
                                        <td>
                                            <? 
                                            $billing_status = array( 1 => 'Paid', 2 => 'Due' );
                                            echo create_drop_down("txt_bill_status", 135,$billing_status,"", 1,"-- Select --",'0',"active_inactive(this.value);",'','','','','','','','','','');
                                            ?>                                            
                                            <input type="button" class="formbutton" style="width:80px" value="View" onClick="openmypage_billInfo('from');">
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="3" class="button_container" width="100%">
                            <?
                                echo load_submit_buttons('1_1_1_1', "fnc_yarn_transfer_entry", 0,1,"reset_form_all()",1,"","");
                            ?>
                            <input type="hidden" name="update_dtls_id" id="update_dtls_id" readonly>
                        </td>
                    </tr>
                </table> 
                <!-- set up your links, either via text links or form buttons Start-->
                <a href="#" class="formbutton" onClick="expandingWindow('http://www.facebook.com/tstipu');return false">Facebook</a><br>
                <input type="button" class="formbutton" value="Facebook" onClick="expandingWindow('http://www.facebook.com/tstipu')">
                <!-- set up your links, either via text links or form buttons End-->


            </fieldset>       
        </div>        
	</form>
</div>  
</body>  
<script src="../includes/functions_bottom.js" type="text/javascript"></script>
<!-- <script src="../includes/functions.js" type="text/javascript"></script> -->
</html>

