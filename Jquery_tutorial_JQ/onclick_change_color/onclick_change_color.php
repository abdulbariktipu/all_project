<!DOCTYPE html>  
<html lang="en">  
<head>  
  <meta charset="utf-8">  
  <title>bind demo</title>  
<script src="https://code.jquery.com/jquery-1.10.2.js"></script> 
<script> 
$(document).ready(function() {
    $(document).on('click','#intro',function(){
        if($(this).hasClass('greencolor'))
         {
           $(this).addClass('whitecolor');
           $(this).removeClass('greencolor');
         }
         else
         {
           $(this).addClass('greencolor');
           $(this).removeClass('whitecolor');
         }
    });
}); 
</script> 

<style>  
.whitecolor{
	background: white;
        cursor: pointer;
} 
.greencolor{
	background: green;
        cursor: pointer;
}
table th{
    background: gray;
    border: 1px solid black;
}
</style>  
 
</head>  
    <body>
        <table border="1" style="border-collapse: collapse;">
            <th>SL</th>
            <th>Hader 1</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
            <th>Hader 2</th>
        <?php
            $arrayName = array(1=>1,2=>2,3=>3,4=>4,5=>5);
            foreach ($arrayName as $key => $value) 
            {
                ?>                
                    <tr id='intro'> 
                        <td><?php echo $value; ?></td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                        <td>Value 2</td>
                    </tr>
                
                <?php
            }
        ?>
        </table>
    
    </body>  
</html>