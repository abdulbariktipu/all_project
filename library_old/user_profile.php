<!DOCTYPE html>
<html>
    <head>
                <!-- Bootstrap -->
        <link href=".css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/> 
        <link href="css/bootstrap.css" rel="stylesheet"/>    
        <link href="css/index.css" rel="stylesheet"/> 
        <title>User Profile</title>
    </head>
    <body>       
    <?php
    include('dbconnect.php');//Database connect
    
    $epr='';
    $msg='';
      
      if(isset($_GET['epr']))
         $epr=$_GET['epr'];   
         
         
        //****************details record    
        if($epr=='details')
        

            
            $id=$_GET['id'];
            $res=mysql_query("select * from users where id=$id"); 
            $row=mysql_fetch_array($res);
            {
               echo"<tr>
                        <td>";?>
                       <div style="margin-right: 20%;"><b>Name:</b> <?php echo $row["username"];?><br/>
                        <b>Email:</b> <?php echo $row["username2"];?><br/>
                        <b>Phone:</b> <?php echo $row["birthdate"];?><br/>
                        <b>Insert Time:</b> <?php echo $row["email"];?><br/>
                        <b>Requard Date:</b> <?php echo $row["password"];?><br/>
                        </div>
                        <?php echo "</td>
   
                  </tr>";
            }
                   //details record end
        ?>
        
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script src="js/index.js"></script>  
     <script src="js/scroll.js"></script>
    <script src="js/app.js"></script> 
    </body>
</html>