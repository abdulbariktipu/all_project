

<!DOCTYPE html>
<html>
<head>
	<title>
		

		
	</title>
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
 <script type="text/javascript">
    include("DBconnect.php");
     function searchq(){
        
      var searchText= $("input[name='search']").val(); 
      
      $.post("select.php",{searchVal:searchText},function(output) {
        
        
        $("#output").html(output);
        
        });  

    } 
</script>
    
</head>
<body>
SID:<input type="text" name="search" onkeyup="searchq();" />

<div id="output">

Name:<input type="text" value=""/>
<br />
D:<input type="text" value=""/>

</div>

</body>
</html>