<?php
	include_once "dbconnect.php";
	//https://www.youtube.com/watch?v=8UMCg2KQcsM
?>

<!DOCTYPE html>
<html>
<head>
	<title>DropDown List</title>
	<style type="text/css">
		.country,.city{
			margin: 20px;
			text-align: center;
		}
	</style>
</head>
<body>
	
	<div class="country">
		<label>Country</label>
		<select name="country" onchange="getId($this.value);">
			<option value="">Select Country</option>
			<!--populate value using php-->
			<?php
				$query = "SELECT * FROM country";
				$results = mysqli_query($con, $query);
				//loop
				foreach ($results as $country) {
				?>
			<option value="<?php echo $country["cid"]; ?>"><?php echo $country["country"] ?></option>
			<?php
			}
			?>
		</select>
	</div>

	<div class="city">
		<label>City</label>
		<select name="city" id="cityList">				
			<option value=""></option>
		</select>
	</div>	

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> 
<script type="text/javascript">
	function getId(val) {
		//alert(val);

		//we create ajax function
		$.ajax({
			type:"POST",
			url:"getdata.php";
			data:"cid="+val,
			success:function(data){
				$(#cityList).html(data);
			}
		});
	}
</script>

</body>
</html>