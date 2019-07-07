<?php
    $server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "classicmodels";
    
    $con = mysql_connect($server,$db_user,$db_pass) && mysql_select_db($db_name);
    
    if(!$con)
    {
        echo "can not be connected";
    }
    else{
        //echo "connected";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Book List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <style type="text/css">
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        border: 1px solid #d21d1d;
        }
        th {
            border: 1px solid orange;
            text-align: left;
            padding: 8px;
            background-color: orange;
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
<div class="container">
    	<div class="row">
			<div class="col-md-12">				
					<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="dev-table">
						<thead>
    						<tr>
    							<th>customerNumber</th>
    							<th>customerName</th>
    							<th>addressLine2</th>
    							<th>checkNumber</th>
                                <th>paymentDate</th>
                                <th>amount</th>
                                <th>Action</th>
                			</tr>
					   </thead>
    					<tbody>
                            <?php
                              //$query=mysql_query("SELECT * FROM `customers` ORDER by customerNumber DESC");
                              $query=mysql_query("SELECT `customers`.customerNumber, `customers`.customerName, `customers`.addressLine2, `payments`.checkNumber,`payments`.paymentDate,`payments`.amount
                                    FROM customers RIGHT OUTER JOIN payments
                                    ON `customers`.customerNumber=`payments`.customerNumber");
                              while($row=mysql_fetch_assoc($query))
                                { 
                                  ?>   
                                      <tr>				
                                        <td><?php echo $row['customerNumber']; ?></td>
                                        <td><?php echo $row['customerName']; ?></td>
                                        <td><?php echo $row['addressLine2']; ?></td>
                                        <td><?php echo $row['checkNumber']; ?></td>
                                        <td><?php echo $row['paymentDate']; ?></td>
                                        <td><?php echo $row['amount']; ?></td>
                                        <td>
                                            <a href='edit_file/customerJoinEdit.php?edit=<?php echo $row['customerNumber']; ?>'> Edit </a> | 
                                            <a href='delete.php?delete_id=<?php echo $row['customerNumber']; ?>'> Delete </a>
                                        </td>
                                    </div>
                                <?php      
                                   }
                                ?>                          
    					   </tbody>
					</table>
				</div>
			</div>
    </body>
</html>

