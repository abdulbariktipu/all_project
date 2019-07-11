<!DOCTYPE html>
<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script>
      function countChar(val) {
        var len = val.value.length;
        if (len > 10) 
        {
          val.value = val.value.substring(0, 10);
        } 
        else 
        {
          $('#charNum').text(10 - len);
        }
      };
    </script>
  </head>

  <body>
    <textarea id="field" onkeyup="countChar(this)"></textarea>
    <div id="charNum"></div>
  </body>

</html>