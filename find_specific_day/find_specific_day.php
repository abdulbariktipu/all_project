<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.shift_a_color{
			font-size: 20px; 
			background-color: #D2691E; 
			width: 248px; 
			display:inline-block;
		}
		.shift_b_color{
			font-size: 20px; 
			background-color: lightblue; 
			width: 248px; 
			display:inline-block;
		}
	</style>
</head>
<body>
	<form action="/all_project/find_specific_day/find_specific_day.php" method="post">
		From Date: <input type="date" name="from_date" id="from_date">
		To Date: <input type="date" name="to_date" id="to_date">
		<input type="submit" name="submit" id="submit" value="Submit"><br>
	</form>
	<br>
	
	<table width="500" border="1"> 
		<div>
		  <div class='shift_a_color'><span class="badge badge-primary">Shift A Color</span></div>
		  <div class='shift_b_color'><span class="badge badge-primary">Shift B Color</span></div>
		</div>
        <tr bgcolor="gray"> 
            <th style="width: 248px;">Shift Name</th> 
            <th style="width: 248px;">Day and Date</th>
        </tr> 
  		<?php
	  		if(isset($_POST['submit'])!="")
			{
			    $from_date=$_POST['from_date'];
			    $to_date=$_POST['to_date'];
			    if ($from_date==""|| $to_date=="") 
			    {
			    	echo "<div style='background-color: red; width:500px;'>Please Select From Date and To Date</div>";die;
			    }
			    else
			    {
				    $tm1 = strtotime($from_date);
				    $tm2 = strtotime($to_date);
				    
				    $dt = Array ();
				    for($i=$tm1; $i<=$tm2;$i=$i+86400) 
				    {
				        if(date("w",$i) == 6) 
				        {
				        	$dt[] = date("l d-F-Y ", $i);
				        }
				    }

				    echo "<div style='background-color: green; width:500px;'>".'Found '.count($dt). ' Saturdays From '.$from_date.' To '.$to_date."</div>";
				    for($i=0;$i<count($dt);$i++) 
				    {
				    	if ($i%2==0) { $bgcolor="#D2691E"; $shift_name="A"; } 
				    	else { $bgcolor="lightblue"; $shift_name="B"; }; 
						?>
						<tr bgcolor="<?php echo $bgcolor; ?>"> 
				            <td style="text-align: center; width: 248px;"><? echo $shift_name; ?></td> 
				            <td style="width: 248px;"><?php echo $dt[$i]."<br>"; ?></td>
				        </tr>
				        <?
				    }
			    }
		    }

		?>
        
    </table> 
</body>
</html>