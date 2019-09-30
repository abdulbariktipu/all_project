
	<?php 
	$data = array('1,2,3,4,5,6,7,8','45','','56,31,32,33','','','21,22','11,12,12,13,16');
	//echo "<pre>";
	//print_r($data );
	$max_arr = array();
	$max = 0;
	foreach($data as $value)
	{
	  $value = trim($value);
	  if (!empty($value))
	  {
	      $arr = explode(",",$value);
	      $max_count = count($arr);
	      if($max_count>$max)
	      {
	        $max=$max_count;
	      }
	  }
	}

	//$max;
	$NewArr = explode(",",$max);
	?>
	<style>
		#customers {
		  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		#customers td, #customers th {
		  border: 1px solid red;
		  padding: 8px;
		}

		#customers tr:nth-child(even){background-color: #f2f2f2;}

		#customers tr:hover {background-color: #ddd;}

		#customers th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: #4CAF50;
		  color: white;
		}
	</style>
	<table id="customers">
		<tr>
			<th>Color</th>
			<th>Fabric</th>
		<?php
		for($i=0;$i<$max;$i++)
		{
			?>
			<th style="text-align: center;"><?php echo $i; ?></th>
			<?php
		}
		?>
		</tr>

		<?php
		$arrayName = array(1 => "Red", 2 => "Blue");
		foreach ($arrayName as $key => $value) 
		{
			?>
			<tr>
				<td><?php echo $value; ?></td>
				<td>100% Cotton</td>
				<?php
				for($i=0;$i<$max;$i++)
				{
					?>
					<td><?php echo "Process ".$i; ?></td>
					<?php
				}
				?>
			</tr>
			<?php
		}
		?>
	</table>