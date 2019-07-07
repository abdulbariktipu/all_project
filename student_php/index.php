<?php
    include('dbconnect.php');
/** //if statment
 *     $test = (5==1)?'ok':'no';
 *     echo $test;
 */
?>
<a href="student.php">Add New</a><br /><br />
<table cellpadding="5" cellspacing="0" border="1">
    <tr>
        <th>No</th>
        <th>Student Name</th>
        <th>Address</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    
<?php
    $sql = "SELECT * FROM tb_student";
    $query = mysql_query($sql);
    if(mysql_num_rows($query)>0) 
    {
        $i=1;
        while($row = mysql_fetch_array($query))
        {
           $status = ($row['status']==1)?'Active':'Suspend';    
    
        ?>    
    
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['stu_name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $status; ?></td>
            <td>
                <a href="student.php?edited&id=<?php echo $row ['stu_id']; ?>">Edit</a> | 
                <a href="javascript:;" class="item-delete" id="student.php?deleted=1&id=<?php echo $row ['stu_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php
        }
    }
    ?>
</table>

<script src="js/jquery-1.11.1.min.js"></script>
<script>
    $(function(){
        $('.item-delete').click(function(){
          var id=$(this).attr('id');
          if(confirm('Do you want to delete this item?'))
          {
            //alert('Success');
            window.location.href=id;
          }  
        });
    });
</script>


