
<?php 
	$data = array('1,2,3,4,5,6,7,8','31,33,45','','56,31,32,33','21,22','11,12,12,13,14,15,16');
	//echo "<pre>";
	//print_r($data );
	$max_arr = array();
	$max = 0;
	foreach($data as $value)
	{
	  $value = trim($value);
	  if (!empty($value))
	  {
	      $arr = explode(",",$value);
	      $max_count = count($arr);
	      if($max_count>$max)
	      {
	        $max=$max_count;
	      }
	  }
	}

	//$max;
	$NewArr = explode(",",$max);

	for($i=0;$i<$max;$i++)
	{
	  echo $i;
	}



?>