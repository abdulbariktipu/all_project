
@extends('layouts.app')

@section('content')
<div>
  <div class='inline' style="font-size: 20px;"><span class="badge badge-primary">User List View</span></div>
  <a href="/pdf-download"><div class='inline' style="font-size: 20px; float: right;"><span class="badge badge-primary">Get PDF</span></div></a>
  <a class='inline' style="font-size: 20px; float: right;" href="javascript:void()" onclick="printFunction()" class="btn button-default"><span class="badge badge-primary"><i class="fa fa-print">Print</i></span></a>
</div>
<div id="hello">
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
      <? 
      //echo "<pre>";
      //print_r($userList); 
      if (count($userList) <= 0 ) 
      {
        //echo "No Record";
      }
      else
      {
        foreach ($userList as $value) 
        {
          $userName[]=$value->name;
        }
        //echo "<pre>";
        //print_r($userName);
        //echo $str = implode(",", array_unique($userName));
      }
      ?>
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
</div>

  <script type="text/javascript">   
    function printFunction(){
        var print_div = document.getElementById("hello");
        var print_area = window.open();
        print_area.document.write(print_div.innerHTML);
        print_area.document.close();
        print_area.focus();
        print_area.print();
        print_area.close();
        // This is the code print a particular div element
    }
  </script>
@endsection