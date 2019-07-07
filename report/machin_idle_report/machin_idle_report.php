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
        function func_report_generat(operation) 
        {
            if (operation.length == 0) {
                document.getElementById("showReport").innerHTML = "";
                return;
            } 
            else 
            {
                var from_date = document.getElementById('fromDate').value;
                var to_date = document.getElementById('toDate').value;

                if (operation==1)
                {
                    var data="action=generate_report&search="+operation+"&from_date="+from_date+"&to_date="+to_date;
                }
                // alert(data);
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
                xmlhttp.open("POST", "controller/machin_idle_report_controller.php", true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send(data);
            }
        }
    </script>
</head>
<body>
<h1>Machin Idle Report</h1>
<form>
<input type="date" name="fromDate" id="fromDate"> To 
<input type="date" name="toDate" id="toDate">
<button type="button" onclick="func_report_generat(1)">Show</button>
</form>
<p><span id="showReport"></span></p>
</body>
</html>