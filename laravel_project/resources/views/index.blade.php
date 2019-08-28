@extends('headerFooter')

@section('content')
	<table class="table table-hover">
	    <thead>
	      <tr>
	        <th>SL</th>
	        <th>Registration No</th>
	        <th>Name</th>
	        <th>Depertment</th>
	        <th>Info</th>
	        <th>Insert Date Time</th>
	        <th width="30%">Action</th>
	      </tr>
	      @php $i = 0; @endphp
	    </thead>
	    <tbody>
	    @foreach ($studentsName as $student)
	    @php $i++; @endphp
	    <tr>
			<td>{{ $i }}</td>
			<td>{{ $student->registration_id }}</td>
			<td>{{ $student->name }}</td>
			<td>{{ $student->department_name }}</td>
			<td>{{ $student->info }}</td>
			<td>{{ $student->created_at }}</td>
			<td>
				<a href="{{ route('edit', $student->id) }} " class="btn btn-success">Edit</a>
				<form action="{{ route('delete', $student->id) }}" method="post">
					{{ csrf_field() }}
					<input type="submit" class="btn btn-danger" value="Delete">
				</form>
			</td>
			
		</tr>
		@endforeach
	    </tbody>
	</table>
@endsection