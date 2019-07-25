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

    <style type="text/css">
        body{
            font-family: 'Arial';
        }
        .dlg-container{
            position: absolute;
            left: 50%;
            top: -30%;
            transform: translateX(-50%) translateY(-50%);
            width: 400px;
            background: #fff;
            padding: 10px;
            border: 2px solid #ddd;
            box-shadow: 1px 1px 5px 1px #ccc;
            border-radius: 10px;
            opacity: 0;
            transition: all 0.3s linear 0s;
        }
        .dlg-header{
            padding: 10px;
            font-weight: bold;
            background: #575757;
            color: #f6f7f8;
        }
        .dlg-body{
            padding: 10px;
            line-height: 30px;
        }
        .dlg-footer{
            text-align: center;
            background: #f5f5f2;
            padding: 3px 0;
        }
        .dlg-footer a{
            display: inline-block;
            width: 100px;
            padding: 5px 0;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: #eee;
            cursor: pointer;
        }
        .dlg-footer a:active{
            box-shadow: inset 2px 2px 4px 0 #ccc;
            color: #666;
        }
    </style>

    <script type="text/javascript">
        var CustomAlert = new function(){

            this.show = function(msg){
                var dlg = document.getElementById('dialogCont');
                var dlgBody = dlg.querySelector('#dialogBody');
                dlg.style.top = '30%';
                dlg.style.opacity = 1;
                dlgBody.textContent = msg;
            }

            this.close = function(){
                var dlg = document.getElementById('dialogCont');
                var dlgBody = dlg.querySelector('#dialogBody');
                dlg.style.top = '-30%';
                dlg.style.opacity = 0;
            }
        }
    </script>

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
                if (from_date=="" || to_date=="") 
                {
                    CustomAlert.show('Please Selet Date.');return;
                }
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
<div id="dialogCont" class="dlg-container">
    <div class="dlg-header">Custom Alert Dialog</div>
    <div id="dialogBody" class="dlg-body"></div>
    <div class="dlg-footer">
        <a onclick="CustomAlert.close();">OK</a>
    </div>
</div>
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