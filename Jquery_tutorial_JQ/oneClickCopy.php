
<html>  
<head>  
  <meta charset="utf-8">   
<script src="https://code.jquery.com/jquery-1.10.2.js"></script> 
<script> 
/*$(document).ready(function() { 
    $("#copyOne").click(function(){
        var test = $("#copyOne").text();
        alert(test+" = The paragraph was clicked.");
    });
});*/ 

</script>
 <script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>
</head>  
    <body>
        <table border="1" style="border-collapse: collapse;">
            <th>SL</th>
            <th>Hader 1</th>
            <th>Hader 2</th>               
            <tr>
                <td id='copySl'><?php echo '1'; ?></td>
                <td id='copyOne' onclick="myFunction();" value="<?php echo 'Value 1'; ?>"></td>
                <td id='copyTwo'><?php echo 'Value 2'; ?></td>
            </tr>
        </table>
    <input type="text" value="Hello World" id="myInput">
    <button onclick="myFunction()">Copy text</button> 
    </body>  
</html>