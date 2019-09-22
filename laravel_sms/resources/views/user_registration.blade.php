@extends('headerFooter')

@section('content')

    <h1>User Registration</h1>
    <span id="message"></span>
    @if ($errors->any())
        <div class="alert alert-danger appcss">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
	@endif
    <form data-parsley-validate>
    	<span id="result"></span>
        <div class="form-group">
		    <label class="control-label col-sm-2" for="user_name">Name:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter Name" required>
		    </div>
		</div>

		<div class="form-group">
		    <label class="control-label col-sm-2" for="email">Email:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" required>
		    </div>
		</div>

		<div class="form-group">
		    <label class="control-label col-sm-2" for="user_password">Password:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="user_password" id="user_password" placeholder="Enter Password" required>
		    </div>
		</div>

		<div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" id="adduser" class="btn btn-default">Submit</button>
		    </div>
		</div>
			
	</form>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#adduser').click(function(e) 
			{
				e.preventDefault();
				var userName = $('#user_name').val();
				var email = $('#email').val();
				var userPassword = $('#user_password').val();
				// var csrfToken=$("input[name*='_token']").val();

				if (userName!="" && email!="" && userPassword!="")
				{
					$.ajax({
						url: ' {{ route('saveUser') }} ',
						type: 'post',
						data: {userName:userName, email:email, userPassword:userPassword},
						success: function(response)
						{
							if(response.error)
			                {
			                	//$('#message').text('Data Error');
			                    var error_html = '';
			                    for(var count = 0; count < response.error.length; count++)
			                    {
			                        error_html += '<p>'+response.error[count]+'</p>';
			                    }
			                    $('#message').html('<div class="alert alert-danger">'+error_html+'</div>');
			                }
			                else
			                {
			                    $('#message').html('<div class="alert alert-success">'+"Data Insert Success"+'</div>');
			                    var userName = $('#user_name').val('');
								var email = $('#email').val('');
								var userPassword = $('#user_password').val('');
			                }
							/*$('#message').text('Data Insert Success');
							*/
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

@endsection
