<?php
	include_once('db.php');

	if(isset($_POST['name']))
	{
	  $name = $_POST['name'];

	  if(mysql_query("INSERT INTO apple VALUES('','$name')"))
		echo "Successful Insertion!";
	  else
		echo "Please try again";
	}


	$rs = mysql_query("SELECT count(*) FROM apple");
	$rw = mysql_fetch_array($rs);

	if( !(isset($_GET['page'])) )
	    $start = $rw[0] - 5;
	else
	    $start = $rw[0] - ($_GET['page'] * 5);


	$res = mysql_query("SELECT * FROM apple LIMIT $start, 5") or Die("More entries coming, stay tuned!");


?>
<html>
<head>

<style type="text/css">
 li { list-style-type: none; display: inline; padding: 10px; text-align: center;}
 li:hover { background-color: yellow; }
</style>

</head>
<body>
<form action="." method="POST">
Name: <input type="text" name="name"/><br />
<input type="submit" value=" Enter "/>
</form>

<h1>List of companies ..</h1>
<ul>
<?php
	while( $row = mysql_fetch_array($res) )
	  echo "<li>$row[name] 
                <li><a href='edit.php?edit=$row[id]'>edit</a></li>
                <li><a href='delete.php?del=$row[id]'>delete</a></li><br />";

?>
</ul>
<ul>
<li><a href="index.php?page=<?php 
  if(isset($_GET['page'])) 
     $next = $_GET['page'] -1; 
  else 
     $next=2; 
  echo $next; ?>">Pre</a>
</li>
<li><a href="index.php?page=1">1</a></li>
<li><a href="index.php?page=2">2</a></li>
<li><a href="index.php?page=3">3</a></li>
<li><a href="index.php?page=<?php 
  if(isset($_GET['page'])) 
     $next = $_GET['page'] +1; 
  else 
     $next=2; 
  echo $next; ?>">next</a>
</li>
</ul>
</body>
</html>