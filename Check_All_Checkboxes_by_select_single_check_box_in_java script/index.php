<!DOCTYPE html>
<html>
<head>
	<title>Check All Checkboxes by select single check box in java script</title>

	<style>
		fieldset{
			margin-left: 30%;
			margin-right: 30%;
			}
	</style>

	<script>
		
		function checkall(){
			var totalelements = document.forms[0].element.length;
			//alert(totalelements);
			for(var i=0;i<totalelements;i++)
			{
				var elementname = document.forms[0].element[i].name;
				alert(elementname);
			}

		}// end of function
		
	</script>

</head>

<body>
	<h1>Check All Checkboxes by select single check box in java script</h1>

	<form action="#" method="post">
		<fieldset style="text-align: center;">
			<legend>Product Quantities</legend>
			<input type="checkbox" name="chk_all" value="" onchange="checkall()">Check All
			<hr>

			<input type="checkbox" name="chk_1" value=" ">Check 1<br>
			<input type="checkbox" name="chk_2" value=" ">Check 2<br>
			<input type="checkbox" name="chk_3" value=" ">Check 3<br>
			<input type="checkbox" name="chk_4" value=" ">Check 4<br>
			<input type="checkbox" name="chk_5" value=" ">Check 5<br>
		</fieldset>
	</form>

</body>
</html>