<!DOCTYPE html>
<html>
<head>
	<title>Passing Argu in JavaScript-Check a Checkbox Based on a Value</title>

	<style>
		fieldset{
			width: 160px;
		}

		#monkeyqty, #donkeyqty, #lizardqty{
			float: right;
			width: 50px;
		}
	</style>

	<script>
		
		function makeCheck(){
			if (parseInt(document.getElementById('monkeyqty').value) > 0) {
				document.getElementById('monkeycheck').checked = true;
			}// end of if statement

			if (parseInt(document.getElementById('donkeyqty').value) > 0) {
				document.getElementById('donkeycheck').checked = true;
			}// end of if statement

			if (parseInt(document.getElementById('lizardqty').value) > 0) {
				document.getElementById('lizardcheck').checked = true;
			}// end of if statement
		}// end of function
		
	</script>
</head>

<body>
	<h1>Passing Argu in JavaScript-Check a Checkbox Based on a Value</h1>

	<form action="#" method="post">
		<fieldset>
			<legend>Product Quantities</legend>

			<input type="checkbox" name="pchk1" id="monkeycheck">
			Monkey
			<input type="text" name="monkeyqty" id="monkeyqty" placeholder="Quantity" onchange="makeCheck('monkeyqty', 'monkeycheck')">
			<br><br>

			<input type="checkbox" name="pchk2" id="donkeycheck">
			Donkey
			<input type="text" name="donkeyqty" id="donkeyqty" placeholder="Quantity" onchange="makeCheck()">
			<br><br>

			<input type="checkbox" name="pchk3" id="lizardcheck">
			Lizard
			<input type="text" name="lizardqty" id="lizardqty" placeholder="Quantity" onchange="makeCheck()">
			<br><br>
		</fieldset>
	</form>

</body>
</html>