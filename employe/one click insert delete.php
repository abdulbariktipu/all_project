<style type="text/css">
	 table td{
	 	border: 1px solid black
	 }

</style>
<table>



<?php
	
include "dbconnect.php";

    
	
    
    
    ///////////////
    $insert = mysql_query (
      "INSERT INTO `employee`.`personal_info` (`p_id`, `name`, `country`, `city`) 
    VALUES
      ('128', 'test', 'ttt', 'DHA') ;"
    );
    
    ///////////////tipu
    //$update=mysql_query("UPDATE employees SET salary=salary+5000 WHERE join_date<= (NOW() - INTERVAL 90 DAY)");
	

       $delete=mysql_query("DELETE FROM employees WHERE e_id=128");


        if($delete)
            header("location:salary.php");
             
    }
    
    ///////////////
    $view=mysql_query("SELECT * FROM `employees`");
                            
                      
    while($row=mysql_fetch_assoc($view))                            
    {
    	?>
	    	<tr>				
		        <td><?php echo $row['e_id']; ?></td>
		        <td><?php echo $row['first_name']; ?></td>
		        <td><?php echo $row['last_name']; ?></td>
		        <td><?php echo $row['salary']; ?></td>
		        <td><?php echo $row['join_date']; ?></td>
		        <td>
		         <?php
                                            
                    $a=$row['join_date'];
                    $b=date('Y-m-d');
                    $diff =strtotime($b)- strtotime($a) ; //abs(strtotime($b)- strtotime($a));
                    
                    if($diff>0){
                    $cal_d = floor($diff / (60*60*24));
                    echo $cal_d;
                    }
                    else {
                     echo 0;
                    }
                 ?>

                 </td>
                  
	        </tr>        
        <?php

    } 


             

  ?>
  
  <?php
    $query= " UPDATE employees set salary+=5000 where join_date"
  ?>
  </table>