
<?php 
include "inc/header.php"; 
include "part-2_operation.php"; 
$message = '';
?>




	<form action="" method="post">
		<div>
            <span style="text-align: center;"><?php echo "$message"."<br>"; ?></span>
        </div>  
		<table>

			<tr>
				<td>Enter The First Number: </td>
				<td><input type="number" name="num1"></td>
			</tr>
			<tr>
				<td>Enter The Second Number: </td>
				<td><input type="number" name="num2"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="calculation" value="Calculate"></td>
			</tr>

		</table>
	</form>
<?php
	$message = '';
	if (isset($_POST["calculation"])) {
		$numOne = $_POST["num1"];
		$numTwo = $_POST["num2"];

		if (empty($numOne) or empty($numTwo)) {
			echo "<span style='color: red'>Field must not be empty.</span><br>";
			 //$message="<span style='color: red'>Field must not be empty.</span>";
		}
		else{
			echo "<span style='color: green'>Insert successfull.</span><br>";
			//$message="<span style='color: green'>Insert successfull.</span>";
			echo "First number is: " .$numOne. ", Second number is: " .$numTwo."<br>";
			$cal = new Calculation;
			$cal->add($numOne, $numTwo);
		}

		
	}
?>
<?php include "inc/footer.php"; ?>     