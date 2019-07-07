<?php
//$conn=mysql_connect("localhost","root","","team44"); // Error show

    $server = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "team44";

	$db = mysql_connect($server,$db_user,$db_pass) && mysql_select_db($db_name);
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pagination</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table style="border: 1px #000000 solid;" width="400" cellspacing="2" cellpadding="2" align="center">
<?php

$perpage = 5;

if(isset($_GET["page"])){
	$page = intval($_GET["page"]);
}
else {
$page = 1;
}
$calc = $perpage * $page;
$start = $calc - $perpage;
$result = mysql_query("select * from post Limit $start, $perpage");

$rows = mysql_num_rows($result);

if($rows){
	$i = 0;
	while($post = mysql_fetch_assoc($result)) {
?>
<tbody>
<tr style="background-color: #cccccc;">

	<td style="font-weight: bold;font-family: arial;"><?php echo $post["title"]; ?></td>

</tr>

<tr>

<td style="font-family: arial;padding-left: 20px;"><?php echo $post["detail"]; ?></td>

</tr>
<?php
}
}
?>

</tbody>
</table>

<table width="400" cellspacing="2" cellpadding="2" align="center">
<tbody>
<tr>
<td align="center">

<?php

if(isset($page))

{

$result = mysql_query("select count(*) As Total from post");

$rows = mysql_num_rows($result);

if($rows)

{

$rs = mysql_fetch_assoc($result);

$total = $rs["Total"];

}

$totalPages = ceil($total / $perpage);

if($page <=1 ){

echo "<span id='page_links' style='font-weight: bold;'>Prev</span>";

}

else

{

$j = $page - 1;

echo "<span><a id='page_a_link' href='pagination.php?page=$j'>< Prev</a></span>";

}

for($i=1; $i <= $totalPages; $i++)

{

if($i<>$page)

{

echo "<span><a id='page_a_link' href='pagination.php?page=$i'>$i</a></span>";

}

else

{

echo "<span id='page_links' style='font-weight: bold;'>$i</span>";

}

}

if($page == $totalPages )

{

echo "<span id='page_links' style='font-weight: bold;'>Next ></span>";

}

else

{

$j = $page + 1;

echo "<span><a id='page_a_link' href='pagination.php?page=$j'>Next</a></span>";

}

}

?></td>
<td></td>
</tr>
</tbody>
</table>


</body>
</html>