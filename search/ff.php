<body>
<from action="index.php" method="post">
    <input name="search" type="search" autofocus><input type="submit" name="button">
</from>


<table>
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
    </thead>

    <?php
    $con = mysql_connect("localhost","root","");
    $db=mysql_select_db('employee');


    if(isset($_POST['button']))
    {
        $search=$_POST['search'];

        $query="SELECT * FROM `employees` WHERE first_name LIKE '%{$search}%' || last_name LIKE '%{$search}%'";
        $result=mysql_query($query);
    }

    else
    {
        $query="SELECT * FROM `employees`";
        $result=mysql_query($query);
    }

    while($row=mysql_fetch_array($result))
    {
        echo "<tr>
                    <td>$row[first_name]</td>
                    <td>$row[last_name]</td>
                  </tr>";
    }


    ?>
</table>

</body>












