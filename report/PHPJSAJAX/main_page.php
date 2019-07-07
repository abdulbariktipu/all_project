<!DOCTYPE html>
<html>
<head>
    <style>
        .loader{
            width:60px;
            height:60px;background:0 0;
            border:10px solid transparent;
            border-top-color:#f56;
            border-left-color:#f56;
            border-radius:50%;
            animation:loader .75s 10 ease forwards}
            @keyframes loader{100%{transform:rotate(360deg)}
        }
    </style>
    <script>
        function showHint(operation) 
        {
            if (operation.length == 0) {
                document.getElementById("showReport").innerHTML = "";
                return;
            } 
            else 
            {
                var from_date = document.getElementById('fromDate').value;
                var to_date = document.getElementById('toDate').value;
                //alert(from_date+'to'+to_date);return;
                if (operation==1)
                {
                    var data="action=customer_wise_report&search="+operation+"&from_date="+from_date+"&to_date="+to_date;
                }
                if (operation==2)
                {
                    var data="action=customer_order_wise_report&search="+operation+"&from_date="+from_date+"&to_date="+to_date;
                }
                if (operation==3)
                {
                    var data="action=month_wise_report&search="+operation+"&from_date="+from_date+"&to_date="+to_date;
                }
                if (operation==4)
                {
                    var data="action=month_wise_report2&search="+operation+"&from_date="+from_date+"&to_date="+to_date;
                }

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("showReport").innerHTML = this.responseText;
                    }
                    else {
                        document.getElementById('showReport').innerHTML = '<div class="loader"></div>';
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
<input type="date" name="fromDate" id="fromDate"> To 
<input type="date" name="toDate" id="toDate">
<button type="button" onclick="showHint(1)">Customer Wise</button>
<button type="button" onclick="showHint(2)">Customer and Order Wise</button>
<button type="button" onclick="showHint(3)">Month Wise</button>
<button type="button" onclick="showHint(4)">Month Wise</button>
</form>
<p><span id="showReport"></span></p>
</body>
</html>