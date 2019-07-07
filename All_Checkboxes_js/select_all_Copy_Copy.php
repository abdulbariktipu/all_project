<!DOCTYPE html>
<html>
<head>
	<title>Select all checkbox</title>
	<script type="text/javascript">
		function check_all(){
			var check_all = document.getElementsById("check_all");
			var fl = document.getElementsByClassName("food_list");

			if (check_all.checked) {
				for (var i = 0; i <f1.length; i++) {
					fl[i].checked = true;
				}
			}
			else{
				for (var i = 0; i <f1.length; i++) {
					fl[i].checked = false;
				}
			}
		}
	</script>

</head>
<body>
	<h1>Street Food List</h1>
	<input type="checkbox" id="check_all" onchange="check_all()">Select All
	<br><br>
	<input type="checkbox" class="food_list" value='hotdog'>Hotdog<br>
	<input type="checkbox" class="food_list" value='fishball'>Fishball<br>
	<input type="checkbox" class="food_list" value='squidball'>Squidball<br>
	<input type="checkbox" class="food_list" value='balut'>Balut<br>
</body>
</html>