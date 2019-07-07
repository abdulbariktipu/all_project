
<h1>JS</h1>
<script type="text/javascript">
    function ShowHideDiv(chkPassport) {
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = chkPassport.checked ? "block" : "none";
    }
</script>
<label for="chkPassport">
    <input type="checkbox" id="chkPassport" onclick="ShowHideDiv(this)" />
    Do you have Passport?
</label>
<hr />
<div id="dvPassport" style="display: none">
    Passport Number:
    <input type="text" id="txtPassportNumber" />
</div>

<h1>JQ</h1>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#chkPassport2").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport2").show();
            } else {
                $("#dvPassport2").hide();
            }
        });
    });
</script>
<label for="chkPassport2">
    <input type="checkbox" id="chkPassport2" />
    Do you have Passport?
</label>
<hr />
<div id="dvPassport2" style="display: none">
    Passport Number:
    <input type="text" id="txtPassportNumber2" /><br><br>
    Passport Number:
    <input type="text" id="txtPassportNumber2" />
</div>
