<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management</title>
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
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
	        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Create</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<table class="table table-hover">
	    <thead>
	      <tr>
	        <th>SL</th>
	        <th>Registration No</th>
	        <th>Name</th>
	        <th>Depertment</th>
	        <th>Info</th>
	        <th>Insert Date Time</th>
	        <th>Edit</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach ($studentsName as $student)
	    <tr>
			<td>{{$student->id}}</td>
			<td>{{$student->registration_id}}</td>
			<td>{{$student->name}}</td>
			<td>{{$student->department_name}}</td>
			<td>{{$student->info}}</td>
			<td>{{$student->created_at}}</td>
			<td><a href="{{$student->id}}">Edit</a></td>
		</tr>
		@endforeach
	    </tbody>
	  </table>
		
			
	</div>
	<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>