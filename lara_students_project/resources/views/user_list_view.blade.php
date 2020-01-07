
@extends('layouts.app')

@section('content')
<table class="table table-hover">
  <thead>
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
    <? 
    //echo "<pre>";
    //print_r($userList); 
    foreach ($userList as $value) 
    {
      $userName[]=$value->name;
    }
    //echo "<pre>";
    //print_r($userName);
    echo $str = implode(",", array_unique($userName));
    ?>
    @php $i = 1; @endphp
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
  </tbody>
</table>
@endsection