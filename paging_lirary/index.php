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
        <!-- update section end -->
        <center>
  	<form action="index.php" method="post">
    
    <!--   
        <select name="search">
            <option>book_name</option>
            <option>Math</option>
            <option>AI</option>
        </select>      
    -->

  	     <input type="text" name="search" placeholder="Search" />	
         <input type="submit" name="button"/>
	</form> <br />
</center>

	

        <?php
            mysql_connect("localhost","root","");
            mysql_select_db("library");

                //paging1
                $per_page = 2;
                $pages_queqry = mysql_query("SELECT COUNT('id') FROM book_entry");
                $pages = ceil(mysql_result($pages_queqry, 0) / $per_page);
                
                $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                $start = ($page -1) * $per_page;
                

                
        //search         
        if(isset($_POST['button'])){
		
		$search=$_POST['search'];		
		$query=mysql_query("SELECT * FROM book_entry WHERE book_name LIKE '%$search%' || writer_name LIKE '%$search%'");
		
        if (mysql_fetch_assoc($query)) {
                
                //data show
                echo "<center>";                
                echo 
                    "<table cellpadding='10' cellspacing='0' border='1'>
                        <tr>
                            <th>No</th>
                            <th>book_name</th>
                            <th>iso_no</th>
                            <th>writer_name</th>
                            <th>book_code</th>
                            <th>rack_no</th>
                            <th>no_of_copy</th>
                            <th>return_date</th>
                            <th>due</th>
                            <th>Action</th>
                        </tr>";
            
            
  
                     
            while($row=mysql_fetch_assoc($query))
            {

			
                
                echo "<tr>
                        <td>$row[book_id]</td>
                        <td>$row[book_name]</td>
                        <td>$row[iso_no]</td>
                        <td>$row[writer_name]</td>
                        <td>$row[book_code]</td>
						<td>$row[rack_no]</td>
						<td>$row[no_of_copy]</td>
			
			
						<td>".$row['return_date'].'<br>';
						$a=$row['return_date'];
						$b=date('Y-m-d');
						$diff =strtotime($b)- strtotime($a) ; //abs(strtotime($b)- strtotime($a));

                        if($diff>0){
                            $cal_d = floor($diff / (60*60*24));
                        }
                    echo "</td>
							<td>";

                if($diff>0){
                    $cal_d = floor($diff / (60*60*24));
                    echo "Due ".$cal_d."*10 = ".$cal_d*10;

                } else {
                   echo "Due= ".'0';
                }
                //echo  "Due ".$cal_d."*10 = ".$cal_d*10;
                "</td>";
				
                       echo "<td align='center'>";
						//if($access==1)
                          //  {
								echo "<a href='book_list.php?epr=delete&book_id=".$row['book_id']."'>Delete</a> |
                            		  <a href='book_list.php?epr=update&book_id=".$row['book_id']."'>Update</a>";

						//	};

                                 
                       echo "</td>
			                   
                    </tr>";
            
            }
            
        
                echo  "</table>".'<br/>';
                
              
              
    }else
        {
            echo "No employee Found<br><br>";
        }
        
}else
    {    //while not in use of search  returns all the values
        $query=mysql_query("select * from book_entry limit $start,$per_page");

                //data show
                echo "<center>";                
                echo 
                    "<table class='table-hover' cellpadding='10' cellspacing='0' border='1'>
                        <tr>
                            <th>No</th>
                            <th>book_name</th>
                            <th>iso_no</th>
                            <th>writer_name</th>
                            <th>book_code</th>
                            <th>rack_no</th>
                            <th>no_of_copy</th>
                            <th>return_date</th>
                            <th>due</th>
                            <th>Action</th>
                        </tr>";
            
            
  
                     
            while($row=mysql_fetch_assoc($query))
            {

			
                
                echo "<tr>
                        <td>$row[book_id]</td>
                        <td>$row[book_name]</td>
                        <td>$row[iso_no]</td>
                        <td>$row[writer_name]</td>
                        <td>$row[book_code]</td>
						<td>$row[rack_no]</td>
						<td>$row[no_of_copy]</td>
			
			
						<td>".$row['return_date'].'<br>';
						$a=$row['return_date'];
						$b=date('Y-m-d');
						$diff =strtotime($b)- strtotime($a) ; //abs(strtotime($b)- strtotime($a));

                        if($diff>0){
                            $cal_d = floor($diff / (60*60*24));
                        }
                    echo "</td>
							<td>";

                if($diff>0){
                    $cal_d = floor($diff / (60*60*24));
                    echo "Due ".$cal_d."*10 = ".$cal_d*10;

                } else {
                   echo "Due= ".'0';
                }
                //echo  "Due ".$cal_d."*10 = ".$cal_d*10;
                "</td>";
				
                       echo "<td align='center'>";
						//if($access==1)
                          //  {
								echo "<a href='book_list.php?epr=delete&book_id=".$row['book_id']."'>Delete</a> |
                            		  <a href='book_list.php?epr=update&book_id=".$row['book_id']."'>Update</a>";

						//	};

                                 
                       echo "</td>
			                   
                    </tr>";
            
            }
            
        
                echo  "</table>".'<br/>';
    }      
              
              
              
              
              
              
                
                //pagging2
                $prev = $page - 1;
                $next = $page + 1;
                
                if(!($page <= 1)){
                    echo "<a class='btn btn-primary padd' href='index.php?page=$prev'> Prev </a>";
                }
                
                
                if($pages >= 1){
                    for($x=1;$x<=$pages;$x++)
                    {
                        echo ($x == $page) ? '<b><a class="btn btn-primary" href="?page=' .$x. '">' .$x. '</a></b> ' : '<a class="btn btn-primary" href="?page=' .$x. '">' .$x. '</a> ';
                    }
                }
                
                
                if(!($page>=$pages)){
                        echo "<a class='btn btn-primary' href='index.php?page=$next'> Next </a>";
                        
                    }

                 echo "</center>";
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
            .bgcolor
            {
                background-color: yellow;
                color: black;
            }
            .bgcolor:hover 
            {
                background-color: red;
                color: white;
            }
            .padd{
                padding-right: 5px !important;
            }
            
           </style>