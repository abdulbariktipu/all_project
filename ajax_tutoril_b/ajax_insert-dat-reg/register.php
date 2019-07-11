<script>
	$(function(){
		$('#exit').css('color', 'red');
		$('#success').css('color', 'green');
	});
</script>

<?php
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$mail = $_POST["mail"];
	
		$con = mysqli_connect("localhost", "root", "", "ajaxdata");
		$query = mysqli_query($con, "SELECT id FROM users WHERE username='$user' OR email='$mail'");// || email='$user' 
		$num = mysqli_num_rows($query);

		if (!$user & !$pass & !$mail) 
		{
			echo "All Fields required.";
		}
		else
			if (!$user) 
			{
				echo "Enter a username";
			}
			else 
				if (!$mail) 
				{
					echo "Enter a Email";
				}
				else
					if ($num == 1) 
					{
						echo "<p id='exit'>User name or email is already exit</p>";
					}
					else
						if (!$pass) 
						{
							echo "Enter a password";
						}
						else
						{
							//echo "Success";
							$insert = mysqli_query($con, "INSERT INTO users (username, password, email) VALUES ('$user', '$pass', '$mail')");
							$id = mysqli_insert_id($con);
							if (!$insert) 
							{
								echo "Registration Error";
							}
							else
							{
								echo "<p id='success'>Registration success, username is: $user, your id is: $id</p>";
							}
						}

?>