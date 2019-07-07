<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
th {
    border: 1px solid orange;
    text-align: left;
    padding: 8px;
    background-color: #242729;
}
td{
    border: 1px solid orange;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
  <body>
    <form action="" method="post">

      <input name="search" type="search" autofocus>
      <input type="submit" name="button">

    </form><br>
  </body>
</html>

<?php

$con=mysql_connect('localhost', 'root', '');
$db=mysql_select_db('rasoft');

if(isset($_POST['button'])){  //trigger button click

  $search=$_POST['search'];

  $query=mysql_query("select * from multy where sdate like '%{$search}%'"); //|| last_name like '%{$search}%' 
    echo "<table>
             <tr>
                <th>Course</th>
                <th>Ddate</th>
              </tr>";

if (mysql_num_rows($query) > 0) {
  while ($row = mysql_fetch_array($query)) {
    echo "  <tr>
              <td>" .$row['course']. "</td>
              <td>" .$row['sdate']. "</td>
            </tr>";
  }
    echo "</table>";
}else{
    $mess = "No data Found. <br><br>";
  }

}else{                          //while not in use of search  returns all the values
  $query=mysql_query("select * from multy");
    echo "<table>
             <tr>
                <th>Course</th>
                <th>Ddate</th>
              </tr>";
  while ($row = mysql_fetch_array($query)) {
    echo "  <tr>
              <td>" .$row['course']. "</td>
              <td>" .$row['sdate']. "</td>
            </tr>";
  }
    echo "</table>";
}

    mysql_close();
?>



