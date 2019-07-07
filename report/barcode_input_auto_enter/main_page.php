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
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>  <!-- Jquery user for barcode function -->
<script>
    $(document).ready(function() {
        // var company = $('#company_name').var();

        $('#barcode_no').keyup(function() 
        {
            var char = event.which || event.keyCode;
            //alert(char);
            if (char==65) // 32 is space, 13 is enter, 65 is a
            {
                showHint(4);
            }
            else{
                alert('Problem');
            }
        });
    });
    function showHint(operation)
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

        if (operation==4)
        {
            var company = document.getElementById("company_name").value;
            var barcode_no = document.getElementById("barcode_no").value;
            if (company=="")
            {
                alert('Please select company');
                return;
            }
            var data="action=barcode_report&search="+operation+"&barcode_no="+barcode_no;
            //alert(data);
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
</script>
</head>
<body>
 
<form>
<!-- Input Barcode: <input type="text" placeholder="Input Barcode" onkeyup="showHint(this.value)"> -->

<button type="button" onclick="showHint(1)">Customer Wise</button>
<button type="button" onclick="showHint(2)">Customer and Order Wise</button>
<button type="button" onclick="showHint(3)">Month Wise</button>
Company Name : <input type="text" id="company_name" name="company_name" placeholder="Input company name">
Input Barcode: <input type="text" id="barcode_no" name="barcode_no" placeholder="Input Barcode" autocomplete="off">
</form>
<p><span id="showReport"></span></p>
</body>
</html>