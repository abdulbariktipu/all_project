<?php
include("DBconnect.php");

error_reporting(0);

if(isset($_POST['searchVal'])){
    $searchq=$_POST['searchVal'];
    //$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);

        $result = mysql_query("select * from users where sid='$searchq'"); //LIKE '%$searchq%'
        
        $count=mysql_num_rows($result);
        $msg="";
        if($count<0){
            $msg="no data";
            
        }
        else{
                
            while ($rs= mysql_fetch_array($result))
            {
                $username=$rs['username'];
                 $dept=$rs['dept'];
                
                
               // echo " <input type='text' value=''  />";
            }
        
        }
}
?>
Name:<input  type="text" value="<?php echo $username; ?>" readonly=""/>
<br /><br /><br /><br />
D:<input  type="text" value="<?php echo $dept; ?>" readonly=""/>

