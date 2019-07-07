<!DOCTYPE html>
<html>
    <head>
        <title>JavaScript CheckBox</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <p id="pgh">Text Message Here</p>
        <input type="checkbox" class="chb" onclick="func();"/>Color Red [0]
        <input type="checkbox" class="chb" onclick="func();"/>Font Size 30px [1]
        <input type="checkbox" class="chb" onclick="func();"/>Font Weight Bold [2]
        
        <script>
    
             function func()
             {
                 var chb = document.getElementsByClassName('chb');
                 
                 if(chb[0].checked)
                 {
                     document.getElementById('pgh').style.color = '#F00';
                 }
                 if(!chb[0].checked)
                 {
                     document.getElementById('pgh').style.color = '#000';
                 }
                 
                 if(chb[1].checked)
                 {
                     document.getElementById('pgh').style.fontSize = '30px';
                 }
                 if(!chb[1].checked)
                 {
                     document.getElementById('pgh').style.fontSize = '1em';
                 }
                 
                 if(chb[2].checked)
                 {
                     document.getElementById('pgh').style.fontWeight = 'bold';
                 }
                 if(!chb[2].checked)
                 {
                     document.getElementById('pgh').style.fontWeight = 'normal';
                 }
                 
             }
    
        </script>
        
    </body>
</html>