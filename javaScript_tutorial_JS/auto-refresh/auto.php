<html>
<head>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript">
    setInterval("my_function();",1000); 
    function my_function(){
      $('#refresh').load('#refresh');
    }
  </script>
</head>
<body> 
  <div id="refresh">
    <?php echo date('H:i:s');?>
  </div>  
</body>
</html>