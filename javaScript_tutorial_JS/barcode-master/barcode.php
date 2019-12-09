<?
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "classicmodels";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	include 'barcode128.php';
?>

<html>
<head>
	<style>
		p.inline {display: inline-block;}
		span { font-size: 13px;}
	</style>
	<style type="text/css" media="print">
	    @page 
	    {
	        size: auto;   /* auto is the initial value */
	        margin: 0mm;  /* this affects the margin in the printer settings */

	    }
	</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php
		$sql = "SELECT productCode, productName, buyPrice FROM products";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) 
		{
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) 
		    {
		    	$productName=$row["productName"];
		    	$productCode=$row["productCode"];
		    	$buyPrice=$row["buyPrice"];
				echo "<p class='inline'><span ><b>Product Name: $productName</b></span>".bar128(stripcslashes($productCode))."<span ><b>Price: ".$buyPrice." </b><span></p>&nbsp&nbsp&nbsp&nbsp";       
		    }
		} 
		else 
		{
		    echo "0 results";
		}

		mysqli_close($conn);
		?>
	</div>
</body>
</html>