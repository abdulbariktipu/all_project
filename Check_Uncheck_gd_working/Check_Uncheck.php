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

    <div class="container" style="margin:45px auto;">
      <div class="checkbox">
        <label>
          <input type="checkbox" id="checkall" name=""> Check/Uncheck
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
              <input type="checkbox" class="checkitem" name=""> Item 7
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" class="checkitem" name=""> Item 8
            </label>
          </div>          
        </div>
      </div>
    </div>

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
  </body>
</html>