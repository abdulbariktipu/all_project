<?php
    //include('dbconnect.php');
    // https://www.youtube.com/watch?v=m50DZkIwd-s
    // https://tcpdf.org/examples/example_004/
    function fetch_data()
    {
        $output = '';
        include('dbconnect.php');
        $query = "SELECT * FROM tb_student ORDER BY stu_id ASC";
        $result = mysql_query($query);
        while($row = mysql_fetch_array($result))
        {
            $output.='
                <tr>
                    <td>'.$row["stu_id"].'</td>
                    <td>'.$row["stu_name"].'</td>
                    <td>'.$row["address"].'</td>
                </tr>
            ';
        }
        return $output;
    }
    
    if(isset($_POST["create_pdf"]))
    {      
        // Include the main TCPDF library (search for installation path).
        require_once('tcpdf/tcpdf.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 001');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        // $pdf->SetHeaderData(array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        // set header and footer fonts
        /*$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));*/

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(20, 20, 20, 20);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) 
        {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 11, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // set text shadow effect
        //$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

        // Set some content to print
        $html = '';
        $content = '';

        $content .='
        <div border="1">
        <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3>
        <table align="center" border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th width="5%">ID</th>
                <th width="30%">Name</th>
                <th width="10%">Address</th>
            </tr>
            ';
            $content .=fetch_data();
            
        $content .= '</table></div>';

        $pdf->writeHTML($content);
        $pdf->Output("mypdf.pdf","I");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Daynamic data to PDF</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    </head>
    
    <body>
        <br /><br />
        <div class="cotainer" style="width: 700px;">
            <h3>Export HTML Table data to PDF using TCPDF in PHP</h3><br />
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="30%">Name</th>
                        <th width="10%">Address</th>
                    </tr>
                    <?php
                    echo fetch_data();
                    ?>
                </table>
            </div>
            <form action="" method="post">
                <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />
            </form>
        </div>
    </body>
</html>