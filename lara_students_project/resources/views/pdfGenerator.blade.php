{{-- PDF Generator Tutorial: https://www.siddharthshukla.in/blog/laravel-6-generate-pdf-file/ --}}

<table class="table table-hover table-bordered table-striped table-dark">
  <thead  class="table table-dark" style="background-color: gray;">
    <tr>
      <th>SL</th>
      <th>User ID</th>
      <th>Name</th>
      <th>User Type</th>
      <th>Email</th>
      <th>Insert Date Time</th>
    </tr>    
  </thead>
  <tbody>
    @php $i = 1; @endphp
    @if(count($userList) <= 0)         
      <td style="color: red;">No Data Found</td>         
    @else
          @foreach ($userList as $row)      
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->user_type }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->created_at }}</td>
          </tr>
          @php $i++; @endphp
        @endforeach        
    @endif
    
  </tbody>
</table>