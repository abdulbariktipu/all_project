<html><head><title>Creating a Table</title></head>
<body>
<?php	
$self = $_SERVER['PHP_SELF'];
$fields = null;
$db = null;

if(isset($_POST['field_submit'])) {
  $fields = $_POST['fields'];
}
else if(isset($_POST['db_submit'])) {
  $db =     $_POST['db'];
  $name =   $_POST['name'];
  $table =  $_POST['table'];
  $type =   $_POST['type'];
  $size =   $_POST['size'];
}

if( !$fields and !$db )
{
  $form ="<form action=\"$self\" method=\"post\">";
  $form.="How many fields are needed in the new table?<br>";
  $form.="<input type=\"text\" name=\"fields\" size=\"5\">";
  $form.="<input type=\"submit\" name=\"field_submit\" value=\"Submit\">";
  echo($form);
}
else if( !$db )
{ 
  $form ="<form action=\"$self\" method=\"post\">";
  $form.="Database:     <input type=\"text\" name=\"db\"><br>";
  $form.="Table Name:  <input type=\"text\" name=\"table\" size=\"10\"><br> ";
  for ($i = 0 ; $i <$fields; $i++) 
  {
    $form.="Column Name:<input type=\"text\" name=\"name[$i]\" size=\"10\"> ";
    $form.="Type: <select name=\"type[$i]\">";
    $form.="<option value=\"char\">char</option>";	
    $form.="<option value=\"varchar\">varchar</option>";
    $form.="<option value=\"int\">int</option>";
    $form.="<option value=\"float\">float</option>";
    $form.="<option value=\"timestamp\">timestamp</option>";
    $form.="</select> ";
    $form.="Size:<input type=\"text\" name=\"size[$i]\" size=\"5\"><br>";
  }
  $form.=" <input type=\"submit\" name=\"db_submit\" value=\"Submit\"></form>";
  echo($form);
}
else
{
  /*$conn = mysql_connect("localhost", "", "","ajaxdata")
	or die("Could not connect.");

  $rs = mysql_select_db($db, $conn)
	or die("Could not select database.");*/
	$server = "localhost";
	$db_user = "root";
	$db_pass = "";
	// $db_name = "ajaxdata";

	$conn = @mysql_connect($server,$db_user,$db_pass) && @mysql_select_db($db);

	if(!$conn)
	{
	    echo"can not be connected";
	}
	else{
	    echo "connected";
	}
	
  $num_columns = count($name);

  $sql = "create table $table (";
  for ($i = 0; $i < $num_columns; $i++) 
  {
    $sql .= "$name[$i] $type[$i]";
    if(($type[$i] =="char") or ($type[$i] =="varchar"))
    {
      if($size[$i] !="" ){ $sql.= "($size[$i])"; }
    }
    if(($i+1) != $num_columns){ $sql.=","; }
  }
  $sql .= ")";

  echo("SQL COMMAND: $sql <hr>");

  $result = mysql_query($sql)
	or die("Could not execute SQL query");

  if ($result) {     
	echo("RESULT: table \"$table\" has been created");
  }
}
?>
</body></html>