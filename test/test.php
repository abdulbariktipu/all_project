<!DOCTYPE html>  
<html lang="en">  
   <head>  
      <meta charset="utf-8">  
      <title>jQuery UI effect Example</title>  
      <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>  
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  
      <!-- CSS -->  
      <style>  
         #box-2 {  
            height: 100px;  
            width: 100px;  
                       background: #7fffd4;  
         }  

                  #box-3 {  
            height: 100px;  
            width: 100px;  
                       background: #7fffd4;  
         }
      </style>  
      <script>  
         $(document).ready(function() {  
            $('#box-2').mouseover(function() {  
               $( "#box-2" ).effect({  
                  effect: "highlight",  
                 duration:1000  
               });  
            });  


            $('#box-3').mouseover(function() {  
               $( "#box-3" ).effect({  
                  effect: "slide",  
                 duration:1000

               });  
               $("#box-3").css("background-color", "blue");
            }); 



         });  
      </script>  


   </head>  
   <body>  
      <div id="box-2">Click here to<br/><b>Highlight Me!</b></div>  <br>

      <div id="box-3">Click here to<br/><b>Highlight Me!</b></div> 
   </body>  
</html>  

<!DOCTYPE html>
<html>
<head>
<style>
nav#nav1{ margin-top: 24px; }
</style>


<script>
    var bleep = new Audio();
    bleep.src = "Mouse Click.mp3";
    function loadContent(num){
        bleep.play(); // Play button sound now
        var div1 = document.getElementById("div1");
        div1.innerHTML = "Loaded content for section "+num;
    }


</script>


</head>
<body>
  <nav id="nav1">
    <button mouseover="loadContent(1)">Section 1</button>
    <button onclick="loadContent(2)">Section 2</button>
    <button onclick="loadContent(3)">Section 3</button>
  </nav>
  <div id="div1">Default content ...</div>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
<style>
nav#nav1{ margin-top: 24px; }
nav#nav1 > a{ background:#B9E1FF; color:#000; padding:10px; text-decoration:none; border-radius:5px; font-family:"Arial Black", Gadget, sans-serif; }
nav#nav1 > a:hover{ background: #BBEA00; }
nav#nav1 > a:active{ background: #EEFFA8; }
</style>


<script>
var bleep = new Audio();
bleep.src = 'salamisound.mp3';
</script>


</head>
<body>
  <nav id="nav1">
    <a href="#" onclick="bleep.play()">Home</a>
    <a href="#" onclick="bleep.play()">About Us</a>
    <a href="#" onclick="bleep.play()">Services</a>
    <a href="#" onmouseover="bleep.play()">Contact</a>
  </nav>
</body>
</html>