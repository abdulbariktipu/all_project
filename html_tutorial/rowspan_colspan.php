<!DOCTYPE html>
<html>
	<head>
		<title>Page Title</title>
        <style>
            td{
                border: 1px solid green;
                text-align: center;
            }
            th{
                border: 1px solid green;
                text-align: center;
            }
        </style>
	</head>
	<body>
		<div style="align:center;">
	        <table style="border: 1px solid green; width: 100%">

            <!-- Header start below -->
                <tr>
                    <th rowspan="2">M/C No</th>
                    <th rowspan="2">M/C & Capacity</th>
                    <th rowspan="2">Buyer Name</th>
                    <th rowspan="2">Batch No.</th>
                    <th rowspan="2">Batch Colour</th>
                    <th rowspan="2">Booking No.</th>
                    <th rowspan="2">Colour Range</th>
                    <th colspan="6">Total Production Qty in Kg</th>
                    <th rowspan="2">Water/kg in Ltr</th>
                    <th rowspan="2">M/C UT%y</th>
                    <th rowspan="2">Loading Time</th>
                    <th rowspan="2">Unloading Time</th>
                    <th rowspan="2">Total Time (Hour)</th>
                    <th rowspan="2">Fabric Construction</th>
                    <th rowspan="2">Result</th>
                    <th rowspan="2">Remarks</th>
                </tr>
                <tr>
                    <th>Others Color</th>
                    <th>White Color</th>
                    <th>Wash (Y/D)</th>
                    <th>Wash (AOP)</th>
                    <th>Re-Process</th>
                    <th>Trims Weight</th>
                </tr> 
            <!-- Header start end -->
            
            <!-- Value start below -->
                <tr>
                    <td>1</td>
                    <td>Thies-01-250kg</td>
                    <?php
                        $self=1;
                        $subcontract='';
                        if ($self==1) 
                        {
                            echo '<td>New Times</td>';
                        }
                        if ($subcontract==2) 
                        {
                            echo '<td>Party Name</td>';
                        }
                    ?>
                    
                    <td>M-53746</td>
                    <td>White</td>
                    <td>18-00746</td>
                    <td>White</td>
                    <td></td>
                    <td>189</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> 76 </td>
                    <td>9.00 AM</td>
                    <td>4.00 AM</td>
                    <td>7.00 H</td>
                    <td>S/J</td>
                    <td>Shade Matched</td>
                    <td></td>
                </tr>    
            <!-- Value start end -->
	        </table>	
        </div>
	</body>
</html>

<?php
    function csf($data)    
    {
        //echo $data;
        echo $var = strtolower($data); 
    }
     csf('JLSDFJLKSDF');
?>