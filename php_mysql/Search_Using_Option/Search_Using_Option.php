<?php
	require('connection.php');
?>

	<form action="" method="POST">
		Choose a food type:
		<select name="uh">
			<option value="">Select</option>
			<option value="u">Unhealthy</option>
			<option value="h">Healthy</option>
		</select><br><br>

		Select Calories:
		<select name="cal">
			<option value="">Select</option>
			<option value="1000">1000</option>
			<option value="700">700</option>
		</select><br><br>
		<input type="submit" name="submit"><br><br>
	</form>

<?php
if (isset($_POST['uh']) || isset($_POST['cal']) && !empty($_POST['uh']) || !empty($_POST['cal'])) {
	$uh = strtolower($_POST['uh']);
	$cal = $_POST['cal'];
	//die();
	if ($uh=='u' || $uh=='h' || $cal=='1000' || $cal=='700') {
		$query = "SELECT food_name, calories, healthy_unhealthy FROM food WHERE healthy_unhealthy='$uh' OR calories='$cal' ORDER BY 'id' DESC";
		
		if($query_run = mysql_query($query)) {
			
			if (mysql_num_rows($query_run) == NULL) {
				echo 'Not Found';
			}else{
				while ($row = mysql_fetch_assoc($query_run)) {
					$food_name = $row['food_name'];
					$calories = $row['calories'];
					$healthy_unhealthy = $row['healthy_unhealthy'];
					echo $food_name.' has '.$calories.' calories.<br>';
				}
			}
		}else{
			echo mysql_error();
		}
	}else{
		echo 'Please select any one';
	}	
}
?>