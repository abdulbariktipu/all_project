<!DOCTYPE html>
<html>
   <head>
     <style>
        #main { width: 100%; margin: 0 auto;}
        #outer { width: 50%; height: auto; display: block; margin: 0 auto;}
        #leftside, #rightside { width: 50%; display: block; height: auto; float: left;}
        label, input { clear: left; width: 90%; display: block;}
     </style>
     <title></title>
     <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

 <script type="text/javascript">
    function check_uncheck_checkbox(isChecked) {
      if(isChecked) 
      {
        var val1=$('#right1').val();
        $('#right2').val(val1);
        $('#right3').val(val1);
        $('#right4').val(val1);
      } 
      else 
      {
        $('#right1').val('');
        $('#right2').val('');
        $('#right3').val('');
        $('#right4').val('');
      }
    }
  </script>
   </head>
<body>
    <div id="main">
        <div id="outer">
            <div id="rightside">
              <p>Right Side</p>
              <div id="divCheckAll"><input type="checkbox" onClick="check_uncheck_checkbox(this.checked);" />Check All</div>
              <input id="right1" name="right1" type="text" />
              <input id="right2" name="right2" type="text" />
              <input id="right3" name="right3" type="text" />
              <input id="right4" name="right4" type="text" />
          </div> 
    </div>
 </div>


 </body>
</html>