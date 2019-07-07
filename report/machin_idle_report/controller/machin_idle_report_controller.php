<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	error_reporting (0);
	require_once('../includes/db_mysql_function.php');
	$action=$_REQUEST['action'];
	$data=$_REQUEST['search'];

	if ($action=='generate_report') // month_wise_report2
	{
		// echo "string";die;
		extract($_REQUEST);

		$sql="SELECT a.id, a.company_id, a.location_id, a.floor_id, b.machin_id, b.machin_name, b.from_date, b.from_hour, b.from_minute, b.to_date, b.to_hour, b.to_minute, b.remarks
		FROM machin_entry a, machin_idle_mst b
		WHERE a.id=b.machin_id AND b.from_date BETWEEN '$from_date' AND '$to_date' and b.to_date BETWEEN '$from_date' AND '$to_date'
		order by b.from_hour";
		// echo $sql;

		$sql_result=sql_select($sql);
		
		$data_arr=$rowspan=array();
		foreach ($sql_result as $key => $row) 
		{
			$data_arr[$row['from_date']][$row['location_id']][$row['floor_id']][$row['machin_id']][$row['from_hour']][$row['from_minute']]['to_date']=$row['to_date'];
			$data_arr[$row['from_date']][$row['location_id']][$row['floor_id']][$row['machin_id']][$row['from_hour']][$row['from_minute']]['to_hour']=$row['to_hour'];
			$data_arr[$row['from_date']][$row['location_id']][$row['floor_id']][$row['machin_id']][$row['from_hour']][$row['from_minute']]['to_minute']=$row['to_minute'];
			$data_arr[$row['from_date']][$row['location_id']][$row['floor_id']][$row['machin_id']][$row['from_hour']][$row['from_minute']]['remarks']=$row['remarks'];
		}
		/*echo "<pre>";
		print_r($data_arr);*/


		//== Convert Seconds into Years, Months, Days, Hours, Minutes and Seconds in php Start ==
		/*function secondsToTime($seconds) 
		{
			$date1 = new DateTime("@0");
			$date2 = new DateTime("@$seconds");
			$interval =  date_diff($date1, $date2);
			return $interval->format('%y Years, %m months, %d days, %h hours, %i minutes and %s seconds');
		}

		$timestamp=strtotime("now");
		$date = date("Y m d H:i:s",$timestamp);
		$birthday = "05-05-1990 06:30:10";
		$convertedtotimestamp = strtotime($birthday);
		$difference = abs(($timestamp)-($convertedtotimestamp));
		echo secondsToTime($difference);*/ // just echo
		//== Convert Seconds into Years, Months, Days, Hours, Minutes and Seconds in php End ==



 		//== Convert Seconds into Hours, Minutes, Second in php Start ==
		function secondsToTime($seconds) 
		{
			$hours = floor($seconds / 3600);
			$minutes = floor(($seconds / 60) % 60);
			$seconds = $seconds % 60;
			return "$hours:$minutes:$seconds";
		} // just echo
		//== Convert Seconds into Hours, Minutes, Second in php in php End ==



		//==================== Convert Seconds into Hours, Minutes in php Start ==============
		function convertTime($from_date,$from_hour,$from_minute,$to_date,$to_hour,$to_minute)
		{
			$time1 = strtotime("$from_date $from_hour:$from_minute");
		    $time2 = strtotime("$to_date $to_hour:$to_minute");
		    $difference = $time2 - $time1;
		    $hours = $difference / 3600;
		    $minutes = ($difference % 3600) / 60;

		    return sprintf("%d:%d", $hours, $minutes);
		}
		//=============== Convert Seconds into Hours, Minutes in php End =====================

		function convertSecond($from_date,$from_hour,$from_minute,$to_date,$to_hour,$to_minute)
		{
			$time1 = strtotime("$from_date $from_hour:$from_minute");
		    $time2 = strtotime("$to_date $to_hour:$to_minute");
		    return $difference = $time2 - $time1;
		}

		$table_width=940;
 
		?>
		<div id="report_container" align="center" style="width:940px">
			<fieldset style="width:940px;">
				<h2>Date, Location, Floor, Machin and Hour-Minute Wise Report</h2>
			    <table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0">
			        <tr>
			            <th width="40">SL</th> 
			            <th width="100">Date</th>
			            <th width="100">Location</th>
			            <th width="100">Floor</th>
			            <th width="100">Machin</th>
			            <th width="80">From Hour</th>
			            <th width="80">From Minute</th>
			            <th width="80">To Date</th>
			            <th width="80">To Hour</th>
			            <th width="80">To Minute</th>
			            <th>Idle Duration</th>
			        </tr>
			    </table>
			    <table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0" id="table_body">
		            <tbody>
		            	<?php
		            	$i=1;
		            	$grand_total=$grand_total_from_minute=0;
	                	foreach ($data_arr as $from_date_key => $from_date_val) 
						{
							foreach ($from_date_val as $location_id => $location_val) 
							{
								foreach ($location_val as $floor_key => $floor_val) 
								{
									foreach ($floor_val as $machin_id_key => $machin_val) 
									{
										foreach ($machin_val as $from_hour_key => $from_hour_val) 
										{
											foreach ($from_hour_val as $from_minute_key => $row) 
											{
											if ($i%2==0) $bgcolor="#E9F3FF"; else $bgcolor="#FFFFFF"; 
											?>
							                    <tr bgcolor="<?php echo $bgcolor; ?>">
							                        <td width="40" align="center"><?php echo $i; ?></td>
						                        	<td width="100"><?php echo $from_date_key; ?></td>
							                        <td width="100" align="center"><?php echo $location_id; ?></td>
							                        <td width="100" align="center"><?php echo $floor_key; ?></td>
							                        <td width="100" align="center"><?php echo $machin_id_key; ?></td>
							                        <td width="80" align="right"><?php echo $from_hour_key; ?></td>
							                        <td width="80" align="center"><?php echo $from_minute_key; ?></td>
							                        <td width="80" align="center"><?php echo $row['to_date']; ?></td>
							                        <td width="80" align="center"><?php echo $row['to_hour']; ?></td>
							                        <td width="80" align="center"><?php echo $row['to_minute']; ?></td>
							                        <td align="center"><?php echo convertTime($from_date_key,$from_hour_key,$from_minute_key,$row['to_date'],$row['to_hour'],$row['to_minute']); 
							                        $idle_second=convertSecond($from_date_key,$from_hour_key,$from_minute_key,$row['to_date'],$row['to_hour'],$row['to_minute']); ?></td>
							                    </tr>
							                    <?php
							                    $i++;
							                    $grand_total_from_minute+=$row['to_minute'];
							                    $grand_total+=$idle_second;
						                	}
						                }
						            }
								}
							}
	                	}
		                ?>
		            </tbody>
	        	</table>

	        	<table class="rpt_table" border="1" rules="all" width="<?php echo $table_width; ?>" cellpadding="0" cellspacing="0" id="report_table_footer">
		        	<tfoot>
		                <tr>
		                    <td width="40"></td>
		                    <td width="100"></td>
		                    <td width="100"></td>
		                    <td width="100" align="right"></td>
		                    <td width="100" align="right"><strong>Grand Total:</strong></td>
		                    <td width="80" align="right"><strong></strong></td>
		                    <td width="80"><strong></strong></td>
		                    <td width="80"><strong></strong></td>
		                    <td width="80"><strong></strong></td>
		                    <td width="80" align="right"><strong><?php echo $grand_total_from_minute; ?></strong></td>
		                    <td align="right"><strong><?php echo secondsToTime($grand_total); ?></strong></td>
		                </tr>
		            </tfoot>
	        	</table>
			</fieldset>
		</div>
		<?php
	}

	?>
</body>
</html>