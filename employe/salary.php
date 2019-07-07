<style type="text/css">
	 table td{
	 	border: 1px solid black
	 }

</style>
<table>

<?php
	
include "dbconnect.php";



$epr='';
  
  if(isset($_GET['epr']))
     $epr=$_GET['epr'];   
     
     
    //****************Delete record    
    if($epr=='oneClick')
    {
        
         $e_id  =$_GET['e_id'];
         
         $sql = "  INSERT INTO personal_info (p_id,name,country,city) 
          SELECT e_id, first_name, last_name, salary FROM employees WHERE e_id=$e_id";
          
          $inser_t=mysql_query($sql); 
          
          $sql_d = "DELETE FROM employees where e_id=$e_id";
          $sql_data=mysql_query($sql_d);
          if($sql_data){
          header("location:salary.php");
          }
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
                 <td><a href='salary.php?epr=oneClick&e_id="<?php echo $row["e_id"];?>"'>Insert & Delete</a></td>  
	        </tr>        
        <?php

    } 


             

  ?>
  
  <?php
    $query= " UPDATE employees set salary+=5000 where join_date"
  ?>
  </table>