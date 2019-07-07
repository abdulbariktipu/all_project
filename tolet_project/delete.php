<?php
include('dbconnect.php');//Database connect

$epr='';
$msg='';
  
  if(isset($_GET['epr']))
     $epr=$_GET['epr'];   
     
     
    //****************Delete record    
    if($epr=='delete')
    {
        
        $id=$_GET['id'];
        $delete=mysql_query(" DELETE FROM tolet_table where id=$id");
        
        
        
        if($delete)
            header("location:tolet_post.php");
              
            else
            $msg='Error:'.mysql_error();
                    
    } 
    //Delete record end
?>