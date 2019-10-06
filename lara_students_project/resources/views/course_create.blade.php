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
                        <input type="hidden" name="updateId" id="updateId">
                        <button type="submit" id="addData" class="btn btn-info btn-block addedClass">Submit</button>   
                        <button type="submit" id="updateData" class="btn btn-info btn-block updateClass displayClass">Update</button>
                        <button type="submit" id="deleteData" class="btn btn-info btn-block deleteClass displayClass">Delete</button>  
                    </form>                    
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student List View</div>
                    <div class="card-body" style="height: 300px; overflow: auto;">
                        <table class="table table-bordered table-hover" id="table_id">
                            <thead>
                                <tr>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Credit</th>
                                    <th>Writer Name</th>
                                    <th>Edition</th>
                                </tr>
                            </thead>
                            <tbody id="CourseTable" style="cursor: pointer;">
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

        // Update Record
        $('#updateData').click(function(e)
        {
            e.preventDefault();
            //alert('ok');return;
            var courseCode = $('#course_code').val();
            var courseName = $('#course_name').val();
            var credit = $('#credit').val();
            var writerName = $('#writer_name').val();
            var edition = $('#edition').val();
            var csrfToken=$("input[name*='_token']").val();
            var updateId = $('#updateId').val();

            if (courseCode!="" && courseName!="" && credit!="")
            {
                $.ajax({
                    url: ' {{ route('saveCourse') }} ',
                    type: 'post',
                    data: {"_token": "{{ csrf_token() }}", courseCode:courseCode, courseName:courseName, credit:credit, writerName:writerName, edition:edition, updateId:updateId},
                    success: function(response)
                    {
                        //alert(response);
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
                        else if (response==2)
                        {
                            $('#message').html('<div class="alert alert-success">'+"Data Update Success"+'</div>').fadeOut(5000);
                            fetchRecords();
                            $('#course_code').val('');
                            $('#course_name').val('');
                            $('#credit').val('');
                            $('#writer_name').val('');
                            $('#edition').val('');
                            $('#updateId').val('');
                            $('#course_code').prop("disabled", false);

                            $('.addedClass').removeClass('displayClass');
                            $('.updateClass').addClass('displayClass');
                            $('.deleteClass').addClass('displayClass');
                            $('.addedClass').attr('id', 'addData');
                            $('.updateClass').attr('id', 'remove');
                        }
                    }
                }); 
            }
            else
            {                   
                alert('Plz input');
            }
        });
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
                        //alert(response);
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
                        else{
                            $('#message').html('<div class="alert alert-success">'+"Data Insert Success"+'</div>').fadeOut(5000);
                            fetchRecords();
                            $('#course_code').val('');
                            $('#course_name').val('');
                            $('#credit').val('');
                            $('#writer_name').val('');
                            $('#edition').val('');
                            $('#updateId').val('');
                            $('#course_code').prop("disabled", false);
                        }
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
                    //alert(len);
                    if(len > 0)
                    {
                        var res='';
                        $.each (response['data'], function (key, value) {
                            //alert(response['data']);
                            res +=
                            "<tr>"+                                
                                "<td id='course_code_"+value.id+"'>"+value.course_code+"</td>"+
                                "<td id='course_name_"+value.id+"'>"+value.course_name+"</td>"+
                                "<td id='credit_"+value.id+"'>"+value.credit+"</td>"+
                                "<td id='writer_name_"+value.id+"'>"+value.writer+"</td>"+
                                "<td id='edition_"+value.id+"'>"+value.edition+"</td>"+
                                "<td style='display: none;' id='updateId_"+value.id+"'>"+value.id+"</td>"+
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

                    var tableData = document.getElementById('table_id');
                
                    for(var i = 1; i < tableData.rows.length; i++)
                    {
                        //alert(i);
                        tableData.rows[i].onclick = function()
                        {
                            document.getElementById("course_code").value    = this.cells[0].innerHTML;
                            document.getElementById("course_name").value    = this.cells[1].innerHTML;
                            document.getElementById("credit").value         = this.cells[2].innerHTML;
                            document.getElementById("writer_name").value    = this.cells[3].innerHTML;
                            document.getElementById("edition").value        = this.cells[4].innerHTML;
                            document.getElementById("updateId").value       = this.cells[5].innerHTML;
                            $('#course_code').prop('disabled', true);
                            
                            $('.addedClass').addClass('displayClass');
                            $('.updateClass').removeClass('displayClass');
                            $('.deleteClass').removeClass('displayClass');
                            $('.addedClass').attr('id', 'remove');
                            $('.updateClass').attr('id', 'addData');
                        };
                    }
                }
            });
        }

        // Delete Data
        $('#deleteData').click(function(e)
        {
            e.preventDefault();
            // alert('ok');return;
            var csrfToken=$("input[name*='_token']").val();
            var deleteId = $('#updateId').val();

            $.ajax({
                url: ' {{ route('deleteCourse') }} ',
                type: 'post',
                data: {"_token": "{{ csrf_token() }}", deleteId:deleteId},
                success: function(response)
                {
                    if(response>0)
                    {
                        $('#message').html('<div class="alert alert-success">'+"Data Delete Successfully"+'</div>').fadeOut(5000);
                        fetchRecords();
                        $('#course_code').val('');
                        $('#course_name').val('');
                        $('#credit').val('');
                        $('#writer_name').val('');
                        $('#edition').val('');
                        $('#updateId').val('');
                        $('#course_code').prop("disabled", false);

                        $('.addedClass').removeClass('displayClass');
                        $('.updateClass').addClass('displayClass');
                        $('.deleteClass').addClass('displayClass');
                        $('.addedClass').attr('id', 'addData');
                        $('.updateClass').attr('id', 'remove');
                    }
                    else
                    {
                        $('#message').html('<div class="alert alert-danger">'+"Data Delete Is Not Successfully"+'</div>').fadeIn(5000);
                    }
                }
            }); 
            
        });
    });
</script>
@endsection
