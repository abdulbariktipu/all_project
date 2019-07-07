<!DOCTYPE html>
<html>
    <head>
                <!-- Bootstrap -->
        <link href=".css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/> 
        <link href="css/bootstrap.css" rel="stylesheet"/>    
        <link href="css/index.css" rel="stylesheet"/> 
        <title>File Upload</title>
        
        <style>
        body {
             overflow: no-display !important;
                background: url(images/bgimg.jpg)repeat-y  center top;
    
                }



table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
}
</style>
    </head>
    <body>
       
<div class="container" style="margin-left: 20%;">
    <div class="row">  
    <?php
    error_reporting(0);
    require "dbconnect.php";//Database connect
    

            
            $id=$_GET['id'];
            $res=mysql_query("select * from tolet_table where id=$id");                      
            $row=mysql_fetch_array($res);
           
               echo" 
                    <tr style='border: 1px solid black;'>
                        <td>";?><div style="margin-left: 0% " class="col-lg-3 col-sm-4 col-xs-6">                                      
                       <h2>To-Let Image</h2>
                       <a href="#"><img class="img-responsive" 
                       style="padding: 4px; background-color: #ffffff; border-radius: 4px; border: 1px solid #dddddd; width: 300px;" 
                       src="<?php echo $row["path"];?>"/></a>
                       </div> 
                   
                        <?php echo "</td> 
                         
                        </tr>
                        ";   
                        
  echo " <table  class='table table-striped' style='width:auto'>  
  
    <h2>Details</h2>
  <tr>
    <td>Name</td>
    <td>".$row['username']."</td>   
  </tr>
  
  <tr>
    <td>Email</td>
    <td>".$row['email']."</td>   
  </tr>
  
   <tr>
    <td>Entry Date</td>
    <td>".$row['created']."</td> 
  </tr>
  
  <tr>
    <td>Requard Date</td>
    <td>".$row['requard_date']."</td>   
  </tr>
  
  <tr>
    <td>Description</td>
    <td>".$row['description']."</td>   
  </tr>
  
  <tr>
    <td>Address</td>
    <td>".$row['address']."</td>   
  </tr>
  
  <tr>
    <td>description</td>
    <td>".$row['description']."</td>   
  </tr>
  ";                       
                        
                        
       ?>
                      
</div> 

</table>

<!--Insert quary start-->  
    <?php
        require "dbconnect.php";
        

            
            $id=$_REQUEST['id'];

        if(isset($_POST['insert_bt'])){
        $name=($_POST['name']);
        $phone=($_POST['phone']);
        $description=($_POST['description']);
    
        $sql = "INSERT INTO `tolet_project`.`comment` (`name`, `phone`, `description`,`created`,`tolet_id`) 
        VALUES ('$name','$phone', '$description',now(),'$id')";
   
                    mysql_query($sql);
                    
                    if($sql){
                        
                        echo"";
                        
                    }
                    else{
                        
                        echo"failed";
                        
                    }
                 
                        //header("refresh:10; url=select * from tolet_table where id=$id");
                        //$res=mysql_query("select * from tolet_table where id=$id");
                    
   
        }
    

    ?>
<!--Insert quary end-->
<div class="container" >
  <h2>Comment</h2>
  <div class="panel-group" style="width: 60%;">

<?php 
$id=$_REQUEST['id'];
    $sql = "SELECT comment.com_id, comment.name, comment.phone, comment.description
            FROM comment
            INNER JOIN tolet_table
             ON comment.tolet_id = tolet_table.id
            WHERE tolet_table.id='$id'";
            
           $result = mysql_query($sql);
           
           while($row=mysql_fetch_assoc($result)){
            
            echo "<div class='panel panel-primary'>";
             echo " <div class='panel-heading'><b>Name: </b>".$row['name']."</div>";
             echo " <div class='panel-body'><b>Phone: </b>".$row['phone']."</div>";
             echo " <div class='panel-body'><b>Description: </b>".$row['description']."</div>";      
            echo "</div><br>";

                  // echo "Name: ".$row['name']."</br>";
                  // echo "Phone: ".$row['phone']."</br>";
                  // echo "description: ".$row['description']."</br>---------------------</br>";
                   

           }
        ?> 
        <!-- Show comment -->
<!-- Input form start-->     
<form style="text-align: center; float: right;" action="" method="POST" enctype="multipart/form-data">    
        <div class="form-group row">
          <label for="example-text-input" class="col-xs-4 col-form-label">Name<samp style="color: red;">*</samp></label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input class="form-control" type="text" name="name" placeholder="Name" id="example-text-input" required="">
          </div>
        </div>
        
        <div class="form-group row">
          <label for="example-tel-input" class="col-xs-4 col-form-label">Phone No<samp style="color: red;">*</samp></label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input class="form-control" type="tel" name="phone" placeholder="Telephone" id="example-tel-input"required="">
          </div>
        </div>

        <div class="form-group row">
          <label for="example-date-input" class="col-xs-4 col-form-label">Description<samp style="color: red;">*</samp></label>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <textarea class="form-control" name="description" class="form-control input-sm" placeholder="description" id="example-date-input"required="" ></textarea>            
          </div>
        </div>      
                

      <div class="modal-footer" style="text-align: center;">
        <input type="reset" name="reset" id="reset" value="Reset" class="btn btn-primary"/>
        <input type="submit" name="insert_bt" value="Comment" class="btn btn-primary" />        
      </div>
</form>
<!-- Input form end--> 
</div>
</div>



 


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script src="js/index.js"></script>  
     <script src="js/scroll.js"></script>
    <script src="js/app.js"></script>           
    </body>
</html>