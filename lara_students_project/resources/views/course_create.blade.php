@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Student Course</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger appcss">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <span id="message"></span>
                    <form role="form">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="course_code" id="course_code" class="form-control input-sm" placeholder="Course Code">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="course_name" id="course_name" class="form-control input-sm" placeholder="Course Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="credit" id="credit" class="form-control input-sm" placeholder="Credit">
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="writer_name" id="writer_name" class="form-control input-sm" placeholder="Writer Name">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="edition" id="edition" class="form-control input-sm" placeholder="Course Edition">
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" id="addData" class="btn btn-info btn-block">Submit</button>    
                    </form>                    
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student List View</div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Credit</th>
                                </tr>
                            </thead>
                            <tbody id="CourseTable">

                            </tbody>
                        </table>
                    </div>
             </div>
        </div>
    </div>
</div>
<!-- $studentsName->links() // paginate-->

<script type="text/javascript">
    $(document).ready(function(){

        fetchRecords(); // Get data from database, // Fetch records // Follow laravel_blog

        // Add record
        $('#addData').click(function(e) 
        {
            e.preventDefault();
            //alert('ok');return;
            var courseCode = $('#course_code').val();
            var courseName = $('#course_name').val();
            var credit = $('#credit').val();
            var writerName = $('#writer_name').val();
            var edition = $('#edition').val();
            var csrfToken=$("input[name*='_token']").val();

            if (courseCode!="" && courseName!="" && credit!="")
            {
                $.ajax({
                    url: ' {{ route('saveCourse') }} ',
                    type: 'post',
                    data: {"_token": "{{ csrf_token() }}", courseCode:courseCode, courseName:courseName, credit:credit, writerName:writerName, edition:edition},
                    success: function(response)
                    {
                        if(response.error)
                        {
                            //$('#message').text('Data Error');
                            var error_html = '';
                            for(var count = 0; count < response.error.length; count++)
                            {
                                error_html += '<p>'+response.error[count]+'</p>';
                            }
                            $('#message').html('<div class="alert alert-danger">'+error_html+'</div>').fadeIn(5000);
                        }
                        else
                        {
                            $('#message').html('<div class="alert alert-success">'+"Data Insert Success"+'</div>').fadeOut(5000);
                            fetchRecords();
                            $('#course_code').val('');
                            $('#course_name').val('');
                            $('#credit').val('');
                            $('#writer_name').val('');
                            $('#edition').val('');
                        }
                        /*$('#message').text('Data Insert Success');
                        */
                    }
                }); 
            }
            else
            {                   
                alert('Plz input');
            }
        });

        function fetchRecords()
        {
            $.ajax({
                url:"{{ route('getCourse') }}",
                type: 'get',
                dataType: 'json',
                success: function(response)
                {
                    // alert(response['data']);
                    // console.log(response['data']);
                    if(response['data'] != null)
                    {
                        len = response['data'].length;
                    }
                    if(len > 0)
                    {
                        var res='';
                        $.each (response['data'], function (key, value) {
                            res +=
                            "<tr>"+
                                "<input id='update_" + value.id + "' type='hidden' value='" + value.id + "'>"+
                                "<td>"+value.course_code+"</td>"+
                                "<td>"+value.course_name+"</td>"+
                                "<td>"+value.credit+"</td>"+
                            "</tr>";
                        });

                        $('#CourseTable').html(res);
                    }
                    else
                    {
                        var tr_str = "<tr class='norecord'>" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";

                        $("#CourseTable").append(tr_str);
                    }
                }
            });
        }
    });
</script>
@endsection
