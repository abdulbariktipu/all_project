<!DOCTYPE html>
<html>
<head>
<script>
function showHint(operation) {
    if (operation.length == 0) {
        document.getElementById("showReport").innerHTML = "";
        return;
    } 
    else 
    {
        if (operation==1)
        {
            var data="action=customer_wise_report&search="+operation;
        }
        if (operation==2)
        {
            var data="action=customer_order_wise_report&search="+operation;
        }
        if (operation==3)
        {
            var data="action=month_wise_report&search="+operation;
        }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("showReport").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("POST", "controller/gethint.php", true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send(data); //"action=customer_order_wise_report&search="+operation+"&test="+test
        
        
        
    }
}
</script>
</head>
<body>
 
<form>
<!-- First name: <input type="text" placeholder="Press any key" onkeyup="showHint(this.value)"> -->
<button type="button" onclick="showHint(1)">Customer Wise</button>
<button type="button" onclick="showHint(2)">Customer and Order Wise</button>
<button type="button" onclick="showHint(3)">Month Wise</button>
</form>
<p><span id="showReport"></span></p>
</body>
</html>