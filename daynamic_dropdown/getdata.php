<?php
	include_once "dbconnect.php";

	if (!empty($_POST["cid"])) {
		$cid = $_POST["cid"];
		$query = "SELECT * FROM city WHERE cid = $cid";
		$results = mysqli_query($con, $query);

		foreach ($results as $city) {
		?>
		<option value="<?php echo $city["cityId"]; ?>"><?php echo $city["city"]; ?></option>
		<?php
		}
	}
?>