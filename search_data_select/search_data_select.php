<?php //Database connection
	$server = "localhost";
	$dbuser = "root";
	$dbpasswor = "";
	$dbname = "classicmodels";
	$con = mysqli_connect($server,$dbuser,$dbpasswor,$dbname);

	if (!$con) {
		die();
	}else{
			//echo "Connection success";
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>search data from database when user select on Combobox</title>
	<style>
		table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
	</style>
</head>
<body background="gray">
	<form action="" method="post">
		Select Name: 
		<select name="customerName">
			<option value="">--Select--</option>
			<?php
				$a = "SELECT * FROM customers";
				$b = mysqli_query($con, $a);
				while($row=mysqli_fetch_array($b))
				{
					//echo $row['customerName'];
				?>
					<option value="<?php echo $row['customerName'];?>"><?php echo $row['customerName']; ?></option>
				<?php 
				}  
			?>
		</select>
		<input type="text" name="contactLastName" placeholder="contactLastName">
		<input type="submit" name="btn_search" value="View">
		<input type="submit" name="btn_insert" value="Insert">
	</form>

	<?php //SEARCH HEARE

		if (isset($_POST['btn_search'])) 
		{
			$customerName = $_POST['customerName'];
			$contactLastName = $_POST['contactLastName'];
			$sql = "SELECT * FROM customers WHERE customerName='$customerName' || contactLastName='$contactLastName'";
			$result = mysqli_query($con, $sql);
			
				?>
					<table>
						<th><input type="checkbox" name=""></th>
						<th>SL</th>
						<th>Name</th>
						<th>Leader Id</th>
				<?php
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_array($result)) 
				{				
				?>

					<tr>
						<td><input type="checkbox" name=""></td>
						<td><?php echo $row['customerNumber']; ?></td>							
						<td><?php echo $row['customerName'] ?></td>
						<td><?php echo $row['contactLastName'] ?></td>
					</tr>
					
				<?php
				}
				?>
					</table>
				<?php
				//echo "Success";
					}else{
						$sql = "SELECT * FROM customers";
						$result = mysqli_query($con, $sql);
					    
						?>
							<table>
								<th><input type="checkbox" name=""></th>
								<th>SL</th>
								<th>Name</th>
								<th>Leader Id</th>
						<?php
					  while ($row = mysqli_fetch_array($result)) {				
						?>

							<tr>
								<td><input type="checkbox" name=""></td>
								<td><?php echo $row['customerNumber']; ?></td>							
								<td><?php echo $row['customerName'] ?></td>
								<td><?php echo $row['contactLastName'] ?></td>
							</tr>
							
						<?php
				}
				echo "Data Not Found";
			}
		}
	?>

	<?php //INSERT HEARE

		if (isset($_POST['btn_insert'])) {
			
			if (empty($_POST['customerName']) && empty($_POST['contactLastName'])) {
				//echo "Required";
				echo "<script>
					alert('Required field!');
				</script>";
			}
			else
			{
				$customerName = $_POST['customerName'];
				$contactLastName = $_POST['contactLastName'];
				$insert_sql = "INSERT INTO `customers`(`customerName`, `contactLastName`) VALUES ('$customerName','$contactLastName')";
				$ins_result = mysqli_query($con, $insert_sql);
			}
		}
	?>

	

</body>
</html>