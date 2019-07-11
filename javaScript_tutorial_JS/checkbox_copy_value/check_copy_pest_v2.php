<!DOCTYPE html>
<html>
   <head>
     <style>
        #main { width: 100%; margin: 0 auto;}
        #outer { width: 50%; height: auto; display: block; margin: 0 auto;}
        #leftside, #rightside { width: 50%; display: block; height: auto; float: left;}
        label, input { clear: left; width: 90%; display: block;}
     </style>
     <title></title>
     <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

 <script type="text/javascript">


    function copy_value(value,field_id,i)
    {
      //alert(value+'='+field_id+'='+i);
      var rowCount = $('#tbl_consmption_cost tr').length-1;
      //alert(rowCount);
      var is_checked = $('#copy_basis').is(':checked');
      for(var j=i; j<=rowCount; j++)
      {
        if(field_id=='cons_')
        {
          if(is_checked==true)
          {
            document.getElementById(field_id+j).value=value;
          }
        }
      }
    }
  </script>
  </head>
<body>
    <div id="main">
        <div id="outer">
            <div id="rightside">
              <div id="divCheckAll" style="display: inline-block;">Check All<input type="checkbox" name="copy_basis" id="copy_basis"/></div>
              <table width="90" cellspacing="0" class="rpt_table" border="1" id="tbl_consmption_cost" rules="all">
                  <thead>
                      <tr>
                          <th width="30">SL</th>
                          <th width="30">Gmts sizes</th>
                          <th width="30">Cons</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    
                    $data_array=array(0=>'One', 1=>'Two', 2=>'Three', 3=>'Four');
                    $i=1;
                    foreach($data_array as $row)
                    {
                      ?> 
                      <tr>
                        <td width="30"><?php echo $i;?></td>
                        <td width="30">
                          <input type="text" id="cons_<?php echo $i;?>" onChange="copy_value(this.value,'cons_',<?php echo $i;?>); "  name="cons_<?php echo $i;?>" class="text_boxes_numeric" style="width:40px" />
                        </td>
                        <td width="30"><?php echo $row;?></td>
                      </tr>
                      <?php
                      $i++;
                    }

                    ?>
                  </tbody>
              </table>
            </div> 
        </div>
    </div>
</body>
</html>