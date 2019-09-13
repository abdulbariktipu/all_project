

<!DOCTYPE html>
<html>
    
<head>
    <title>My Awesome Login Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
    <div class="container h-100">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal" action="{{ route('checklogin') }}" method="post" data-parsley-validate>
        {{ csrf_field() }}
      <div class="form-group">
        <label class="control-label col-sm-2" for="user_email">user_email:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Enter name" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="registration_id">user_password No:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="user_password" id="user_password" placeholder="user_password No" required>
        </div>
      </div>

      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
    </form>
    </div>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/parsley.min.js') }}"></script>
    <!-- https://parsleyjs.org/doc/ -->
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            $('#loginUser').click(function(e) 
            {
                e.preventDefault();
                var userEmail = $('#user_email').val();
                var userPassword = $('#user_password').val();
                // var csrfToken=$("input[name*='_token']").val();

                if (userEmail!="" && userPassword!="")
                {
                    $.ajax({
                        url: ' {{ route('checklogin') }} ',
                        type: 'post',
                        data: {userEmail:userEmail, userPassword:userPassword},
                        success: function(response)
                        {
                            $('#message').text('Data Insert Success');
                            var userEmail = $('#user_email').val('');
                            var userPassword = $('#user_password').val('');
                        }
                    }); 
                }
                else
                {                   
                    alert('Plz input');
                }
            });
        });
    </script>
</body>
</html>
