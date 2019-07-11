
<img src="generate.php"><br>

<?php
	session_start();

	if (!isset($_POST['secure'])) {
		$_SESSION['secure'] = rand(1000, 9999);
	}else {
		if ($_SESSION['secure'] == $_POST['secure']) {
			echo 'A match!';
		}else{
			echo 'Incorrect, Try aganin.';
			$_SESSION['secure'] = rand(1000, 9999);
		}
	}
?>

<!-- <?php
	//echo $_SESSION['secure'];
?> -->

<form action="index.php" method="post">
	Type the value you see: 
	<input type="text" name="secure" size="6"> 
	<input type="submit" value="Submit">
</form>