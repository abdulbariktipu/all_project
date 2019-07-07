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
				if (elementsname!=undefined & elementsname.indexOf("chk[]")!=-1) {
					document.forms[0].elements[i].checked = document.frm.chk_all.checked;
				}
			}
		}
	</script>

</head>
<body>



<?php
include "dbconnect.php";

$query=mysql_query("SELECT * FROM apple");

$query = mysql_query("select * from apple");
$row = mysql_num_rows($query);

if (isset($_REQUEST["submit"])) {
	$chk = $_REQUEST["chk"];
	$a = implode(",", $chk);
	//echo $a;
	mysql_query("delete from apple where id in ($a)");
	header("refresh:1; url=select_all.php");
}
?>

<form id="enable" name="frm" action="" method="post">
<table border="1" align="center"> 
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td><input type="checkbox" name="chk_all" value="" onchange="checkall()">Check All
		<input id="clickEna" type="submit" value="submit" name="submit"></td>
		<!--<td><input id="clickEna" disabled="disabled" type="submit" value="submit" name="submit"></td>-->
	</tr>

<?php
for ($i=1; $i < $row; $i++) { 
	$row = mysql_fetch_array($query);
?>

<tr>
	<td><?php echo $row['id'] ?></td>
	<td><?php echo $row['name'] ?></td>
	<td>
		<input id="accept" type="checkbox" name="chk[]" value="<?php echo $row["id"] ?>">
	</td>
</tr>


<?php
}
?>
</table>
</form>
</body>
</html>