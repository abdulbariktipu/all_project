<?php
	// echo "Posting...";

	$con = mysqli_connect("localhost", "root", "", "ajaxdata");

	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']))  
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];

		$query = mysqli_query($con, "SELECT * FROM students WHERE email='$email'");
		if($row = mysqli_num_rows($query) > 0 ) 
		{
			echo "Username already exists!";
		}
		else
		{ 
			$insert = mysqli_query($con, "INSERT INTO students (name, email, contact) VALUES ('$name', '$email', '$contact')"); 
			$id = mysqli_insert_id($con);
			if (!$insert) 
			{
				echo "Registration Error";
			}
			else
			{
				echo "<p id='success'>Registration success, username is: $name, your id is: $id</p>";
			}
		}
	}	
?>