<?php
	session_start();
	$_SESSION['secure'] = rand(1000, 9999);
?>

<img src="generate.php">

<!-- <?php
	//echo $_SESSION['secure'];
?> -->

<form action="index.php" method="post">
	Type the value you see: 
	<input type="text" name="secure" size="6"> 
	<input type="submit" name="" value="Submit">
</form>