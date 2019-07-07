<?php
	/*require 'autoload_classes/class1.php';
	require 'autoload_classes/class2.php';
	require 'autoload_classes/class3.php';*/

	spl_autoload_register(function($autoload_class){
		require 'autoload_classes/'.$autoload_class.'.php';
	});

	$member_obj = new memberClass();
	echo serialize($member_obj).'<br>'; // object to string convert
	// $var = new topic();
	$var = new NotExistClass();
	print_r($var);
?>