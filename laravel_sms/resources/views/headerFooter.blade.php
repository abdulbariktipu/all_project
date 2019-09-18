<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student Management</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">


	<script type="text/javascript">
		setTimeout(function() {
		    $('#mydiv').fadeOut('fast');
		}, 1000);
	</script>

  </head>
  <body>

    <nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Student Management</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active"><a href=" {{ route('homePage') }} ">Home <span class="sr-only">(current)</span></a></li>
				<li><a href=" {{ route('userPage') }} ">Create</a></li>
				<li><a href="#">File Upload</a></li>
			</ul>
		    <div id="navbar" class="navbar-collapse collapse">
			    <ul class="nav navbar-nav navbar-right">
			    <li class="active">
			    	<a href="#">@if(isset(Auth::user()->email))
			    		<strong>Welcome {{ Auth::user()->email }}</strong><br/>
			    	</a>
			 	</li> 
			    <li><a href="{{ url('logout') }}">Logout</a>
				@else
			    	<script>window.location = "/";</script>
				@endif
			</li>
			    </ul>
			</div>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		@yield('content')
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
	</script>
  </body>
</html>