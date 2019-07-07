<?php
	include ('dbconn.php');

	if (isset($_POST['submit'])) {
		$city_id = $_POST['city_id'];
		$area_name = $_POST['area_name'];
		$comment = $_POST['comment'];

		$result = mysql_query("INSERT INTO area (city_id,area_name,comment) VALUES ('$city_id','$area_name','$comment')");
	}

?>

<form action="" method="post">
	
	City name: <select name="city_id">
	    <option value="">Select City:</option>
	    <?php 
	      $sql="SELECT * FROM city";
	      $result = mysql_query($sql);
	      while($row = mysql_fetch_array($result)) {
	  	?>
	    <option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
	    <?php 
	    	}
	  	?>
  </select><br><br>

	Area name: <input type="type" name="area_name" id="area_name"><br><br>
	Comment: <textarea name="comment"></textarea><br><br>
	<input type="submit" name="submit" value="Insert">
</form>
