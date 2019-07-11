<?php

	$string = "'1,2,3,4'";
	//$replace = str_replace("'","",$string);
	$str_arry = explode(",",$string);
	//print_r($str_arry);

	$vari="";
	foreach ($str_arry as $key => $value) 
	{
		if ($vari=="") 
        {
            echo $vari = $value;
        }
        else 
        {
            echo $vari = "','".$value;
        }
	}

    /*$marks = array(100, 70, 80, 90, 75,70);
    $arrUni = array_unique($marks);
    $arr_sort = sort($arrUni);

    $vari ="";
    foreach($marks as $key => $value)
    {
        if ($vari=="") 
        {
            echo $vari = $value;
        }
        else 
        {
            echo $vari = ','.$value;
        }
    }*/
    









/*function quote($str) 
{
    return sprintf("'%s'", $str);
}

$array = array('lastname', 'email', 'phone');


echo implode(',', array_map('quote', $array));*/


/*$arr = array("blue","red","green","yellow");
print_r(str_replace("red","pink",$arr,$i));
echo "<br>" . "Replacements: $i";
*/


$arr['a']['b']['fname']='tipu';
$arr['a']['b']['lname']='sultan';
foreach ($arr as $key => $value) 
{
    foreach ($value as $b_key => $b_value) 
    {
        echo $b_value['fname'].'<br>';
        echo $b_value['lname'].'<br>';
    }
}


$addr['c']['d']['city']='Dhaka';
$addr['c']['d']['area']='Gulshan';
foreach ($addr as $addr_c_key => $addr_c_value) 
{
    foreach ($addr_c_value as $addr_d_key => $addr_d_value) 
    {
        echo $addr_d_value['city'].'<br>';
        echo $addr_d_value['area'].'<br>';
    }
}



?>