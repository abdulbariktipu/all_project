<?php
	include ('dbconn.php');

	if (isset($_POST['submit'])) {
		$country_id = $_POST['country_id'];
		$city_name = $_POST['city_name'];

		$result = mysql_query("INSERT INTO city (country_id,city_name) VALUES ('$country_id','$city_name')");
	}

?>

<form action="" method="post">
	
	Country name: <select name="country_id">
	    <option value="">Select Country:</option>
	    <?php 
	      $sql="SELECT * FROM country";
	      $result = mysql_query($sql);
	      while($row = mysql_fetch_array($result)) {
	  	?>
	    <option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
	    <?php 
	    	}
	  	?>
  </select><br><br>

	City name: <input type="type" name="city_name" id="city_name"><br><br>
	<input type="submit" name="submit" value="Insert">
</form>