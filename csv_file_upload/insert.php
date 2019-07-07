<?php
	$con = mysqli_connect("localhost", "root", "", "tut");

	if ($con) {
		//print_r($_FILES['csvfile']);
		$file = $_FILES['csvfile']['tmp_name'];
		$handle = fopen($file, "r");
		$i=0;
		while (($cont = fgetcsv($handle, 1000, ",")) !==false)
		{
			$table = rtrim($_FILES['csvfile']['name'], ".csv");
			if ($i==0) 
			{			
				$name = $cont[0];
				$dep = $cont[1];
				$sal = $cont[2];
				$id = $cont[3];
				$query = "CREATE TABLE $table ($name VARCHAR(50), $dep VARCHAR(10), $sal INT(5), $id INT(5));";
				echo $query."<br>";
				mysqli_query($con, $query);
			}
			else{
				$query = "INSERT INTO $table ($name, $dep, $sal, $id) VALUES ('$cont[0]', '$cont[1]', '$cont[2]', '$cont[3]');";
				echo $query."<br>";
				mysqli_query($con, $query);
			}
				$i++;
		}
	}
	else{
		echo "connection faild";
	}
?>
