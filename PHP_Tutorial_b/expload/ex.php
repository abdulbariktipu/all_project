<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$string = "tipu,sultan,tania,barik";
		$arr = explode(',', $string);
		//print_r($arr);
		$decs = '';
		foreach ($arr as $key => $value) {
			if ($decs=='') {
				$decs .= "'".$value."'";
			}else{
				$decs .= ",'".$value."'";
			}
		}
		echo $decs;
	?>
</body>
</html>