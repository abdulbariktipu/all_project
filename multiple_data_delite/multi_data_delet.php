<!--Checkbox enable-->
<!-- <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script language="javascript">

$(function(){
$("#accept").click(function(){
if($("#clickEna").is(":enabled"))
{
$("#clickEna").prop("disabled",true);
}
else
{
$("#clickEna").prop("disabled",false);
}
});
});
</script> -->
<!--Checkbox enable-->
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
	header("refresh:1; url=multi_data_delet.php");
}
?>

<form id="enable">
<table border="1" align="center"> 
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td><input id="clickEna" type="submit" value="submit" name="submit"></td>
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

