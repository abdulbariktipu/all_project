<!DOCTYPE html>
<html>
<head>
	<title>Show Hide</title>
</head>
<body>
	<?php 
		$user_id=1;
	?>
	<table>
		<tr>
			<th>SL</th>
			<?php if ($user_id==2) 
			{
				?>
				<th>Stock</th>
				<?php
			}
			else{
				?>
				<th style="display: none;">Stock</th>
				<?php
			} 
			?>			
		</tr>
	</table>
	<table>
		<tr>
			<td>01</td>
			<?php if ($user_id==2) 
			{
				?>
			<td>435</td>
			<?php
			}
			else{
				?>
				<td style="display: none;">435</td>
				<?php
			}
			?>	
		</tr>
	</table>
</body>
</html>