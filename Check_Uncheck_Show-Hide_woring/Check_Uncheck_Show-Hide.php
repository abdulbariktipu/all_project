<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select/Deselect All Checkboxes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

<!-- Check/Uncheck (Select/Deselect) All Checkboxes Form Start -->
    <div class="container" style="margin:45px auto;">
      <div class="checkbox">
        <label>
          <input type="checkbox" id="checkall" onclick="ShowHideDiv7(this)" name=""> Check/Uncheck
        </label>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-2">
          <div class="checkbox">
            <label>
              <input type="checkbox" class="checkitem" name=""> Item 1
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" class="checkitem" name=""> Item 2
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" class="checkitem" name=""> Item 3
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" class="checkitem" name=""> Item 4
            </label>
          </div>
        </div>
        <div class="col-md-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" class="checkitem" name=""> Item 5
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" class="checkitem" name=""> Item 6
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" class="checkitem" id="chkPassport7" onclick="ShowHideDiv7(this)" name=""> Item 7
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" class="checkitem" id="chkPassport" onclick="ShowHideDiv8(this)" name=""> Item 8
            </label>
          </div>          
        </div>
      </div>
    </div>
<!-- Check/Uncheck (Select/Deselect) All Checkboxes Form End -->

<!-- Show/Hide Start Input field-->
    <hr />
    <div id="dvPassport7" style="display: none">
      <h1>Do you have Item 7</h1><br>
        Item 7:
        <input type="text" id="txtPassportNumber7" />
    </div>
    <div id="dvPassport8" style="display: none">
      <h1>Do you have Item 8</h1><br>
        Item 8:
        <input type="text" id="txtPassportNumber8" />
    </div>
<!-- Show/Hide end Input field-->

<!-- Check/Uncheck (Select/Deselect) All Checkboxes Using jQuery Start -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      $("#checkall").change(function(){
        $(".checkitem").prop("checked", $(this).prop("checked"))
      })
      $(".checkitem").change(function(){
        if ($(this).prop("checked")==false){
          $("#checkall").prop("checked", false)
        }
        if ($(".checkitem:checked").length == $(".checkitem").length){
          $("#checkall").prop("checked", true)
        }
      })
    </script>
<!-- Check/Uncheck (Select/Deselect) All Checkboxes Using jQuery End -->

<!-- Show/Hide Start JS-->
      <script type="text/javascript">
        function ShowHideDiv7(chkPassport7) {
            var dvPassport7 = document.getElementById("dvPassport7");
            dvPassport7.style.display = chkPassport7.checked ? "block" : "none";
        }
        function ShowHideDiv8(chkPassport8) {
            var dvPassport8 = document.getElementById("dvPassport8");
            dvPassport8.style.display = chkPassport8.checked ? "block" : "none";
        }
      </script>
<!-- Show/Hide End JS-->
  </body>
</html>