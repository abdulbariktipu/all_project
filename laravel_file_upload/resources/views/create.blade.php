<html lang="en">
<head>
  <title>Laravel Multiple File Upload Example</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    
 
    <div class="container">
        
        <h3 class="jumbotron">Laravel Multiple File Upload</h3>

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form method="post" action="{{url('file')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            
            <div class="input-group control-group increment" id="incrementDiv">
                <input type="file" name="filename[]" class="form-control">
                <div class="input-group-btn">
                    <button class="btn btn-success" id="adds" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                </div>
            </div>
            <div class="clone hide" id="copyDiv">
                <div class="control-group input-group" style="margin-top:10px" id="parentsDiv">
                    <input type="file" name="filename[]" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-danger" id="removeDive" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
            
        </form>
    </div>
 
 
    <script type="text/javascript"> 

        $(document).ready(function() {
     
          $("#adds").click(function(){ 
              var copy = $("#copyDiv").html();
              $("#incrementDiv").after(copy);
          });
            
          $("body").on("click","#removeDive",function(){ 
              $(this).parents("#parentsDiv").remove();
          });
     
        });     

    </script>
     
 
</body>
</html>