  <?php include "page/head.php"?>   
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Contact</title>
    <link rel="icon" href="img/arrow-down.png" type="image">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
  
    
    
    <!-- Google Map start-->
      <script src = "http://maps.googleapis.com/maps/api/js"></script>
      
      <script>
         function loadMap() {
			
            var mapOptions = {
               center:new google.maps.LatLng(23.809048,90.418536),
               zoom:15
            }
            
            var map = new google.maps.Map(document.getElementById("sample"),mapOptions);
            
            var marker = new google.maps.Marker({
               position: new google.maps.LatLng(23.809048,90.418536),
               map: map,
               draggable:true,
               icon:'img/arrow-down.png',
               
            });
            
            marker.setMap(map);
            
            var infowindow = new google.maps.InfoWindow({
               content:"Gulshan, Baridhara, Dhaka Bangladesh."
            });
				
            infowindow.open(map,marker);
         }
      </script>
  </head>
  <body onload = "loadMap()" style="margin-top: 0px !important;"><!--style="background: #E9E5DC;"-->
  <!-- Google Map end-->
  
<nav class="navbar navbar-default " style="line-height: 120px;">
  <div class="container-fluid body-width">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="img/logo.png" /> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="register.php"></span>Add Tolet</a></li>
        <li><a href="subdivision.php">Subdivision</a></li>
        <li><a href="about.php">About</a></li>
        <li class="active"><a href="contact.php">Contact</a></li> &nbsp;
        <a class="btn btn-info btn-lg" href="register.php"><span class="glyphicon glyphicon-log-out"></span>Register</a>
        <a class="btn btn-info btn-lg" href="login.php"><span class="glyphicon glyphicon-home"></span>Login</a>
      </ul>
  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

     
    <div class="container-fluid body-width" style="margin-bottom: 7px;">   
        <div class="col-xs-12" style="padding: 0px;" style="text-align: left;">            
            <h4 class="holder2">This is just a place holder</h4>
            <p class="holder-para1" style="text-align: justify;">This website template has been designed by 
            Free Website Templates for you, for free. You can replace all this text with your own text.<br /><br />
            You can remove any link to our website from this website template, you're free to use this website 
            template without linking back to us. If you're having problems editing this website template, then don't 
            hesitate to ask for help on the Forums.<br /> </p>            
        </div>     
        
        <div class="col-xs-12" style="padding: 0px;" style="text-align: left; ">            
            <p class="holder-para1 E-mail">E-mail: forum<br />
           <span style="margin-left: 50px;">Call or e-mail us for help with any aspect of your purchase, online or offline.</span></p>
            <p class="holder-para1 phone">
            Call toll-free: 877 000 0000<br />
            Call toll-free: 866 000 0000<br />
            Toll-free fax: 877 000 0000            
            </p>                       
        </div>  
          
        <div class="col-xs-12" style="padding: 0px;" style="text-align: left; ">            
            <p class="holder-para1 phone">
            Tree Valley<br />
            250 Lorem Ipsum Street<br />
            Jaofanr, Caknan 109935<br />
            Kiangab.          
            </p>                       
        </div> 
        
<?php
error_reporting(0);     
    $image=rand(1,4);
    switch ($image){ 
	case 1:$image_file = "img/blog-thumb1.png";
	break;

	case 2:$image_file = "img/blog-thumb2.png";
	break;

	case 3:$image_file = "img/blog-thumb3.png";
	break;
    
   	case 4:$image_file = "img/blog-thumb4.png";
	break;
    
    }
    echo "<img src=$image_file";
?>
        
        <!-- Google Map -->
        <img src="img/mid-nav_01.gif" />
        <div id="sample" class="col-xs-12" style="height:380px; margin-bottom: 200px;"></div>
        <!-- Google Map -->
        
        
      
      
      
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
                <form action="" method="POST">
            Username: <input type="text" name="username" required="" /><br /><br />           
            Password : <input type="password" name="pass" required="" /><br /><br />
            <input style="margin-left: 80px;" type="submit" name="submit" value="Login" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
      

      
      
         
</div>
                                    
    
    
    
    
  <?php include'page/footer.php'?>

</body>