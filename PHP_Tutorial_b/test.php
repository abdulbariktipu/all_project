<?php

function add(...$number)
{
	$sum = 0;
	foreach ($number as $value) {
		$sum = $sum + $value;	
		//echo $sum.'<br>';	
	}
	$row = explode(',', $sum);
	foreach ($row as $key) {
		echo $key;
	}
	//print_r($row);
	//return $sum;	
}

echo add(1,2,3,4,5);

?>