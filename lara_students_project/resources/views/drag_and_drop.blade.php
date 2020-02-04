
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
        <th>Name</th>
        <th>User Type</th>
        <th>Email</th>
      </tr>    
    </thead>
    <tbody>
      @php $i = 1; @endphp
      @if(count($drag_and_dropList) <= 0)         
        <td style="color: red;">No Data Found</td>         
      @else
            @foreach ($drag_and_dropList as $row)      
            <tr{{ $row->id }}>
              <td>{{ $i }}</td>
              <td>{{ $row->title }}</td>
              <td>{{ substr($row->description,0,50).'...' }}</td>
              <td>{{ $row->author }}</td>
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