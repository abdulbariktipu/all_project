<!DOCTYPE html>
<html>
<head>
	<title>PHP MYSQL user authentication</title>
</head>
<body>
	<?php
	    $server = "localhost";
	    $db_user = "root";
	    $db_pass = "";
	    $db_name = "authentication";
	    
	    $con = mysql_connect($server,$db_user,$db_pass) && mysql_select_db($db_name);
	    
	    if(!$con)
	    {
	        echo "can not be connected";
	    }
	    else{
	        //echo "connected";
	    }


	  $select=mysql_query("SELECT * FROM user order by id desc");

		  while($row=mysql_fetch_array($select))
		  
		{
			?>
			<table>
			  <tr>				
		          <td><?php echo $row['id']; ?></td>
		          <td><?php echo $row['username']; ?></td>
		          <td><?php echo $row['password']; ?></td>
	          </tr>
          </table>
          <?php      
		}

		
	?>

	<form action="" method="post">
		User Name: 
		<input type="text" name="username"><br>
		Password:
		<input type="password" name="password"><br>
		<input type="submit" name="submit" value="Login"><br>
	</form>
</body>
</html>
