@extends('headerFooter')

@section('content')

    <h1>User Registration</h1>
    <form  data-parsley-validate>
        <table border='1' id='userTable' style='border-collapse: collapse;'>
	        {{csrf_field()}}

	        <div class="form-group">
			    <label class="control-label col-sm-2" for="user_name">Name:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter Name" required>
			    </div>
			</div>

			<div class="form-group">
			    <label class="control-label col-sm-2" for="user_email">Email:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Enter Email" required>
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
			
		</table>
	</form>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#adduser').click(function() 
			{
				var userName = $('#user_name').val();
				var userEmail = $('#user_email').val();
				var userPassword = $('#user_password').val();
				var csrfToken=$("input[name*='_token']").val();

				if (userName!="" && user_email!="" && userPassword!="")
				{
					$.ajax({
						url: '{{ route('saveUser') }}',
						type: 'post',
						data: {_token: 'csrfToken', userName:userName, userEmail:userEmail, userPassword:userPassword},
						success: function(response)
						{
							alert('OK');
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
