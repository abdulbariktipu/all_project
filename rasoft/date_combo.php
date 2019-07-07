
<?php
    
     require "dbconnect.php";//connect to database

    error_reporting(0);

    if(isset($_POST['insert'])){
        $eng=mysql_real_escape_string($_POST['english']);
        $hin=mysql_real_escape_string($_POST['hindi']);
        $guj=mysql_real_escape_string($_POST['gujarati']);
        $tam=mysql_real_escape_string($_POST['tamil']);
        $country=mysql_real_escape_string($_POST['country']);
		    $datepic=mysql_real_escape_string($_POST['datepic']);

       
        $sql = "INSERT INTO `date` (english,hindi,gujarati,tamil,country,datepic) 
        					VALUES ('$eng','$hin','$guj','$tam','$country','$datepic')";
        					
        $inser_t=mysql_query($sql);
            if ($inser_t) {
              echo "Insert successfull";
            }else {
              echo "Error";
            }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Date Pic</title>

    <!-- Bootstrap -->
    <!--<link href="style.css" rel="stylesheet" type="text/css"/>-->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    
    
    <!-- STYLE CSS autocomplete start-->
      <link rel="stylesheet" href="jquery/css/jquery-ui-1.8.2.custom.css" />    
      <!-- JAVASCRIPT autocomplete-->  
      <script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
      <script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script>
    
    
    <!-- Date picker start http://www.daterangepicker.com/#ex3-->
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
      <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>  
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  
      <!-- Javascript -->  
      <script>  
         $(function() {  
           $( "#datepic" ).datepicker({
                 dateFormat:"dd-mm-yy",
                   duration:"slow",
                 showAnim:"show"
                    });  
                 });  
      </script> 
  </head>
<body>
  
    <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
            
    
    <div class="panel panel-primary" style="margin:20px;">

      <div class="panel-body">
      <form role="form"  method="POST" action="date_combo.php">
        <div class="col-md-12 col-sm-12">
  	       <div class="form-group col-md-6 col-sm-6">
              <label for="name">Languages</label>
              <input type="checkbox" name="english" class="form-control input-sm" value="English">English
              <input type="checkbox" name="hindi" class="form-control input-sm" value="Hindi">Hindi
              <input type="checkbox" name="gujarati" class="form-control input-sm" value="Gujarati">Gujarati
              <input type="checkbox" name="tamil" class="form-control input-sm" value="Tamil">Tamil<br>
            </div>

            <div class="form-group col-md-6 col-sm-6">
              Country name: <select class="form-control input-sm" name="country">
                <option value="">Select Country:</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="India">India</option>
                <option value="Nepal">Nepal</option>
            </select>
            </div>

        		<div class="form-group col-md-6 col-sm-6">
              <label for="pincode">Date Pic</label>
              <input type="text" name="datepic" class="form-control input-sm" id="datepic" placeholder="datepic" >
            </div>       			
          </div>

        	<div class="col-md-12 col-sm-12">
          	<div class="form-group col-md-3 col-sm-3 pull-right" >
          			<input type="submit" name="insert" class="btn btn-primary" value="Submit"/>
          	</div>
          </div>
      </form>
</div>
</div> 
</div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>   
          
  </body>
</html>