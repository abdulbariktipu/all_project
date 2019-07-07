<!DOCTYPE html>
<html>
    <head>
        <style>
            table tr td, table tr th{
                border: black 1px solid;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <?php
        # connect to mysql server
        # and select the database, on which
        # we will work.
        $conn = mysql_connect('', 'root', '');
        $db   = mysql_select_db('test');

        # Query the data from database.
        $query  = 'SELECT * FROM test_work ORDER BY ename, sal';
        $result = mysql_query($query);

        # $arr is array which will be help ful during 
        # printing
        $arr = array();

        # Intialize the array, which will 
        # store the fetched data.
        $sal = array();
        $emp = array();

        #%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%#
        #     data saving and rowspan calculation        #
        #%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%#

        # Loop over all the fetched data, and save the
        # data.
        while($row = mysql_fetch_assoc($result)) 
        {
            array_push($emp, $row['ename']);
            array_push($sal, $row['sal']);

            if (!isset($arr[$row['ename']])) 
            {
                $arr[$row['ename']]['rowspan'] = 0;
            }
            $arr[$row['ename']]['printed'] = 'no';
            $arr[$row['ename']]['rowspan'] += 1;
        }


        #%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        #        DATA PRINTING             #
        #%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%#
        echo "<table cellspacing='0' cellpadding='0'>
                <tr>
                    <th>Sl</th>
                    <th>Ename</th>
                    <th>Sal</th>
                </tr>";

        $j=1;
        for($i=0; $i < sizeof($sal); $i++) 
        {
            $empName = $emp[$i];
            echo "<tr>";
            echo "<td>".$j."</td>";
            # If this row is not printed then print.
            # and make the printed value to "yes", so that
            # next time it will not printed.
            if ($arr[$empName]['printed'] == 'no') 
            {
                echo "<td rowspan='".$arr[$empName]['rowspan']."'>".$empName."</td>";
                $arr[$empName]['printed'] = 'yes';
            }
            echo "<td>".$sal[$i]."</td>";
            echo "</tr>";
            $j++;
        }
        echo "</table>";
        ?>
    </body>
</html>