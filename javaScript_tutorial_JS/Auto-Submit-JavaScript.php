

<form name="myForm" id="myForm" target="_myFrame" action="Auto-Submit-JavaScript.php" method="POST">
    <p>
        <input id="input_test" name="test" value="test" />
        <span id="count">Count</span>
    </p>
    <p>
        <input type="submit" value="Submit" />
    </p>
</form>

<script type="text/javascript">
    window.onload=function()
    {
        var auto2 = setTimeout(function(){ autoRefresh(); }, 100);

        function autoRefresh()
        {
           clearTimeout(auto2);
           setTimeout(function(){ submitform(); autoRefresh(); }, 10000);
        }

        function submitform()
        {
          //document.getElementById('input_test').innerHTML=
          alert('#input_test');
          document.forms["myForm"].submit();
        }

    }
</script>