<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lice Clock</title>

    <link href="css/app.css" rel="stylesheet"/>
    <script type="text/javascript" src="js/date_time.js"></script><!-- date and Time show js --> 
    
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>  
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
 
 
      <script>  
         $(document).ready(function() {  
            $('#date_time').hover(function() {  
               $( "#date_time" ).effect( "bounce", {  
                  times: 5,  
                  distance: 50  
               }, 1000, function() {  
               $( this ).css( "background", "#428bca" );  
            });  
         });  
      });  
    </script>

  </head>
  <body>
  <!-- date and Time show start -->
    <center>
        <span class="time-bold" id="date_time"></span>
        <script type="text/javascript">window.onload = date_time('date_time');</script>
    </center>
  <!-- date and Time show end -->
</body>
</html>