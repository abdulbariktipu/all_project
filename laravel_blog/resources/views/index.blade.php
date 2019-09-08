<!DOCTYPE html>
<html>
  <head>
    <title>Insert Update and Delete record with AJAX in Laravel</title>
    <!-- provide the csrf token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --> <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
  </head>
  <body>

    <form method="post">
        <table border='1' id='userTable' style='border-collapse: collapse;'>
        {{csrf_field()}}
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type='text' id='name' ></td>
          <td><input type='text' id='email' ></td>
          <td><input type='button' id='adduser' value='Insert User'></td>
        </tr>
      </tbody>
      </table>
    </form>

    <!-- Script -->
    <script type='text/javascript'>
        //var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function()
        {
            // Fetch records
            fetchRecords();

            // Add record
            $('#adduser').click(function()
            {
                var name = $('#name').val();
                var email = $('#email').val();
                var CSRF_TOKEN = $("input[name*='_token']").val();

                if(name != '' && email != '')
                {
                    $.ajax({
                        // url: 'addUser',
                        url:"{{ route('addUser') }}",
                        type: 'post',
                        data: {_token: CSRF_TOKEN,name: name,email: email},
                        success: function(response)
                        {
                            if(response > 0)
                            {
                                var id = response;
                                var findnorecord = $('#userTable tr.norecord').length;

                                if(findnorecord > 0)
                                {
                                    $('#userTable tr.norecord').remove();
                                }
                                var tr_str = "<tr>"+
                                "<td align='center'><input type='text' value='" + name + "' id='name_"+id+"'></td>" +
                                "<td align='center'><input type='email' value='" + email + "' id='email_"+id+"' disabled></td>" +
                                "<td align='center'><input type='button' value='Update' class='update' data-id='"+id+"' ><input type='button' value='Delete' class='delete' data-id='"+id+"' ></td>"+
                                "</tr>";
                                //alert(tr_str);

                                $("#userTable tbody").append(tr_str);
                            }
                            else if(response == 0)
                            {
                                alert('Username already in use.');
                            }
                            /*else
                            {
                                alert(response);
                            }*/

                            // Empty the input fields
                            $('#username').val('');
                            $('#name').val('');
                            $('#email').val('');
                        }
                    });
                }
                else
                {
                    alert('Fill all fields');
                }
            });

        });

        // Update record
        $(document).on("click", ".update", function () 
        {
            //alert('Ok');
            var edit_id = $(this).data('id');
            var name = $('#name_'+edit_id).val();
            var email = $('#email_'+edit_id).val();
            var CSRF_TOKEN = $("input[name*='_token']").val();
            $.ajax({
                url: '{{ route('updateUser') }}',
                type: 'POST',
                dataType: 'json',
                data: {_token: CSRF_TOKEN,name: name,email: email},
                success: function(response)
                {
                    if(response>0)
                    {
                        alert('Data Updated Successfully');
                    }
                    else
                    {
                        alert('No Change');
                    }
                }
            });
        });

        // Delete record
        $(document).on('click', '.delete', function(){
            var del_id = $(this).data('id');
            var el = this;
            var CSRF_TOKEN = $("input[name*='_token']").val();
            $.ajax({
                url: '{{ route('deleteUser') }}',
                type: 'POST',
                dataType: 'json',
                data: {_token: CSRF_TOKEN, del_id: del_id},
                success: function(response)
                {
                    if(response>0)
                    {
                        alert('Data Delete Successfully');
                        $(el).closest( "tr" ).remove();
                    }
                    else
                    {
                        alert('No Change');
                    }
                }
            });
            
        });
        /*$(document).on("click", ".delete" , function() 
        {
            var delete_id = $(this).data('id');
            var el = this;
            $.ajax({
                url: 'deleteUser/'+delete_id,
                type: 'get',
                success: function(response)
                {
                    $(el).closest( "tr" ).remove();
                    alert(response);
                }
            });
        });*/

        // Fetch records
        function fetchRecords()
        {
            $.ajax({
                url:"{{ route('getUsers') }}",
                type: 'get',
                dataType: 'json',
                success: function(response)
                {
                    //alert(response['data']);
                    var len = 0;
                    $('#userTable tbody tr:not(:first)').empty(); // Empty <tbody>
                    if(response['data'] != null)
                    {
                        len = response['data'].length;
                    }

                    if(len > 0)
                    {
                        for(var i=0; i<len; i++)
                        {
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var email = response['data'][i].email;
                            // alert(id);
                            var tr_str = "<tr>" +
                            "<td align='center'><input type='text' value='" + name + "' id='name_"+id+"'></td>" +
                            "<td align='center'><input type='email' value='" + email + "' id='email_"+id+"' disabled></td>" +
                            "<td align='center'><input type='button' value='Update' class='update' data-id='"+id+"' ><input type='button' value='Delete' class='delete' data-id='"+id+"' ></td>"+
                            "</tr>";

                            $("#userTable tbody").append(tr_str);

                        }
                    }
                    else
                    {
                        var tr_str = "<tr class='norecord'>" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";

                        $("#userTable tbody").append(tr_str);
                    }
                }
            });
        }
    </script>

  </body>
</html>