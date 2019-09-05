@extends('headerFooter')

@section('content')
	<h1>Create New Student</h1>
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<form class="form-horizontal" action="{{ route('store') }}" method="post" data-parsley-validate>
		{{ csrf_field() }}
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="student_name">Name:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="student_name" id="student_name" placeholder="Enter name" required>
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="registration_id">Registration No:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="registration_id" id="registration_id" placeholder="Registration No" required>
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="department_name">Depertment:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="department_name" id="department_name" placeholder="Enter Depertment" required>
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="info">Info:</label>
	    <div class="col-sm-10">
	      <textarea type="text" class="form-control" name="info" id="info" rows="10" placeholder="Enter Info"></textarea> 
	    </div>
	  </div>

	  <div class="form-group"> 
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Submit</button>
	    </div>
	  </div>
	</form>
@endsection