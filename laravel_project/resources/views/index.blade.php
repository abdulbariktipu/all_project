@extends('headerFooter')

@section('content')

	@if (\Session::has('success'))
	    <div id="mydiv" class="alert alert-success">
	        <p>{{ \Session::get('success') }}</p>
	    </div>
	@endif
	@if (\Session::has('updateSuccess'))
	    <div id="mydiv" class="alert alert-success">
	        <p>{{ \Session::get('updateSuccess') }}</p>
	    </div>
	@endif
	@if (\Session::has('deleteSuccess'))
	    <div id="mydiv" class="alert alert-success">
	        <p>{{ \Session::get('deleteSuccess') }}</p>
	    </div>
	@endif

	<table class="table table-hover">
	    <thead>
	      <tr>
	        <th>SL</th>
	        <th>Registration No</th>
	        <th>Name</th>
	        <th>Depertment</th>
	        <th>Info</th>
	        <th>Insert Date Time</th>
	        <th colspan="2" style="text-align: center">Action</th>
	      </tr>
	      @php $i = 0; @endphp
	    </thead>
	    <tbody>
	    @foreach ($studentsName as $row)
	    @php $i++; @endphp
	    <tr>
			<td>{{ $i }}</td>
			<td>{{ $row->registration_id }}</td>
			<td>{{ $row->name }}</td>
			<td>{{ $row->department_name }}</td>
			<td>{{ $row->info }}</td>
			<td>{{ $row->created_at }}</td>
			<td style="text-align: center">
				<a href="{{ route('edit', $row->id) }} " class="btn btn-success">Edit</a>
			</td>
			<td style="text-align: center">
				<form action="{{ route('delete', $row->id) }}" method="post">
					{{ csrf_field() }}
					<input type="submit" class="btn btn-danger" value="Delete">
				</form>
			</td>
		</tr>
		@endforeach
	    </tbody>
	</table>

	{{ $studentsName->links() }}
@endsection
