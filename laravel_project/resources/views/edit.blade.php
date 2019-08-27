@extends('headerFooter')

@section('content')
	<h1>Create New Student</h1>
	<form class="form-horizontal" action="{{ route('update', $studentId->id) }}" method="post">
		{{ csrf_field() }}
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="name">Name:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="name" id="name" value="{{ $studentId->name }}">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="registration_id">Registration No:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="registration_id" id="registration_id" value="{{ $studentId->registration_id }}">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="department_name">Depertment:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="department_name" id="department_name" value="{{ $studentId->department_name }}">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="info">Info:</label>
	    <div class="col-sm-10">
	      <textarea type="text" class="form-control" name="info" id="info" rows="10"> {{ $studentId->info }} </textarea> 
	    </div>
	  </div>

	  <div class="form-group"> 
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Submit</button>
	    </div>
	  </div>
	</form>
@endsection