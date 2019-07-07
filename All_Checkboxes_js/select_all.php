<!DOCTYPE html>
<html>
<head>
	<title>Select all checkbox</title>
	<script type="text/javascript">
		function checkall(){
			var totalelement = document.forms[0].elements.length;
			//alert(totalelement);
			for (var i=0; i<totalelement; i++) {
				var elementsname = document.forms[0].elements[i].name;
				//alert(elementsname);
				if (elementsname!=undefined & elementsname.indexOf("chk_")!=-1) {
					document.forms[0].elements[i].checked = document.frm.chk_all.checked;
				}
			}
		}
	</script>

</head>
<body>
	<form action="" method="post" name="frm">
		<input type="checkbox" name="chk_all" value="" onchange="checkall()">Check All
		<hr>
		<input type="checkbox" name="chk_1" value="">Check1
		<input type="checkbox" name="chk_2" value="">Check2
		<input type="checkbox" name="chk_3" value="">Check3
		<input type="checkbox" name="chk_4" value="">Check4
		<input type="checkbox" name="chk_5" value="">Check5
	</form>
</body>
</html>