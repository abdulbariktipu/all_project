<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Login</title>
        
        <!-- Bootstrap -->
        <link href=".css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/> 
        <link href="css/bootstrap.css" rel="stylesheet"/>    
        <link href="css/app.css" rel="stylesheet"/> 
       
    </head>
    <body>
        <div>
        <?php
            mysql_connect("localhost","root","");
            mysql_select_db("pagination");
            
            
                //paging1
                $per_page = 6;
                $pages_queqry = mysql_query("SELECT COUNT('id') FROM paging_table");
                $pages = ceil(mysql_result($pages_queqry, 0) / $per_page);
                
                $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                $start = ($page -1) * $per_page;
                
                $query=mysql_query("select * from paging_table limit $start,$per_page");
            
                
                //data show
                echo "<center>";                
                echo 
                    "<table cellpadding='10' cellspacing='0' border='1'>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>";
                    
                while($row=mysql_fetch_assoc($query))
                {
                
                ?>
                      <tr style='width: 80%; align:center; bgcolor:FFFF00; text-align: center;'>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td>
                                <a href="student.php?edited&id=<?php echo $row ['stu_id']; ?>">Edit</a> | 
                                <a href="javascript:;" class="item-delete" id="student.php?deleted=1&id=<?php echo $row ['stu_id']; ?>">Delete</a>
                            </td>
                        </tr>
               
                <?php
                }
                echo  "</table>".'<br/>';
                
                
                //pagging2
                $prev = $page - 1;
                $next = $page + 1;
                
                if(!($page <= 1)){
                    echo "<a href='pagination.php?page=$prev'><span style='color:green;'>Prev </span></a>";
                }
                
                
                if($pages >= 1){
                    for($x=1;$x<=$pages;$x++)
                    {
                        echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
                    }
                }
                
                
                if(!($page>=$pages)){
                        echo "<a href='pagination.php?page=$next'><span style='color:green;'> Next</span></a>";
                    }

                 echo "</center>";
                 ;
           ?>     
           
           
           <style>
           table{
            width: 90%;
            border: 1px solid black;
           }
            th{
                width: 20%;
                background-color: gray;
                border: 1px solid black;
            }
            a{
                text-decoration: none;
            }
            
           </style>
