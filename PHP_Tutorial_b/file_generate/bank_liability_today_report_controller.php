<!DOCTYPE html>
<html>
    <head>
        <title>Commercial -> Report -> Import LC Reports -> Bank Liability Position As Of Today</title>
        <!--Commercial -> Report -> Import LC Reports -> Bank Liability Position As Of Today-->
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    </head>
    <body>
    
    <p><a href="bank_liability_today_report_controller.php?action=print_preview_2&company_id='<? echo 20; ?>'" target="_blank" style="text-decoration:none"><input type="button" value="Excel Preview 2" class="formbutton" style="width:110px"/></a>&nbsp;</p>
    <?php 
    $user_id=1;
    @$action=$_REQUEST['action'];
    //echo $action;die;
    if ($action=="print_preview_2") 
    {
        ob_start();
        ?>
        <div width="1160px">
        <table class="rpt_table" border="1" rules="all" width="1040" cellpadding="0" cellspacing="0">
            <thead>
                <th width="40">SL</th>
                <th width="110">Company Name</th> 
                <th width="100">Buyer Name</th> 
                <th width="100"> Dealing Merchant</th>
                <th width="90">UOM</th>
                <th width="130">PO Qty.</th>
                <th width="130">In Hand Qty.</th>
                <th width="140">In Hand Value ($)</th>
                <th width="100">Shipment Date</th>
                <th>Ship Status</th>
            </thead>
            <tbody>
                <tr>
                    <td width="40">01</td>
                    <td width="110">Company Name</td>
                    <td width="100">Buyer Name</td>
                    <td width="100">Dealing Merchant</td>
                    <td width="90">UOM</td>
                    <td width="130">PO Qty.</td>
                    <td width="130">In Hand Qty.</td>
                    <td width="140">In Hand Value ($)</td>
                    <td width="100">Shipment Date</td>
                    <td >Ship Status</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td width="40"></td>
                    <td width="110">2</td>
                    <td width="100">3</td>
                    <td width="100">4</td>
                    <td width="90">5</td>
                    <td width="130">6</td>
                    <td width="130">7</td>
                    <td width="140">8</td>
                    <td width="100">9</td>
                    <td >10</td>
                </tr>
            </tfoot>
            </table>
        </div>
            <div width="1160px">
            <table class="rpt_table" border="1" rules="all" width="1040" cellpadding="0" cellspacing="0">
                <tfoot>
                    <tr>
                        <td width="100"></td>
                        <td width="90"></td>
                        <td width="130"></td>
                        <td width="130"></td>
                        <td width="140"></td>
                        <td width="100"></td>
                        <td ></td>
                    </tr>
                </tfoot>>
            </table>
            </div>
            
        </body>
        </html>
        <?php
        foreach (glob("$user_id*.xls") as $filename2) 
        {
            @unlink($filename2);
            //if( @filemtime($filename2) < (time()-$seconds_old) )
        }
        //---------end------------//
        $name=time();
        $filename2=$user_id."_".$name.".xls";
        $create_new_doc = fopen($filename2, 'w');
        $is_created = fwrite($create_new_doc,ob_get_contents());
        $filename2=$user_id."_".$name.".xls";
        //ob_end_clean();
        //echo "$total_data****$filename2";
    
       // header('Content-Description: File Transfer');
        //header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filename2).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename2));
        flush(); // Flush system output buffer
        readfile($filename2);
        exit;
    }
    ?>
    
    