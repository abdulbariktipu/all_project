<html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register</title>
    <link rel="icon" href="logo/rsz_logo1.png" type="image">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    
    <link href="css/layout.css" rel="stylesheet" />
    <link href="css/menu.css" rel="stylesheet"/>
    
   
  </head>
    <body>
    
        <div id="holder">
            <div id="header"></div>
            <div id="container">
        
        
        
        <div id="containerLeft">
        <form action="" method="POST">
            Username: <input type="text" name="username" required="" /><br /><br />           
            Password : <input type="password" name="pass" required="" /><br /><br />
            <input style="margin-left: 80px;" type="submit" name="submit" value="Login" />
        </form> 
        
            <?php
                if(isset($_POST["submit"]))
                {   //User input
                    $username=$_POST["username"];
                    
                    $pass=$_POST["pass"];
                    $password_hash=md5($pass);
                    
                    //Database (connect) include or require
                    require "dbconnect.php";
                    
                    //User input in Database to show in HTML view
                    $sql2 = mysql_query("SELECT * FROM login_info WHERE username='$username' AND password='$password_hash'");
                    $numrows = mysql_num_rows($sql2);
                    if($numrows==1)
                    {
                        while($row=mysql_fetch_array($sql2))
                        {
                            $dbusername=$row['username'];
                            $dbpassword=$row['password'];
                        }
                        
                            if($username==$dbusername && $password_hash==$dbpassword)
                            {
                                //echo "Success";
                                //For session start
                                session_start();
                                $_SESSION['sess_user']=$username;
                                
                                //For session time out
                                $_SESSION['start']=time();//coment
                                $_SESSION['expire']=$_SESSION['start']+(30*60);
                                //For session time out end
                                header("refresh:5; url=page1.php");
                                echo '<img src="logo/15-Tick-icon.png" />Login success! Please wait';
                            }        
                    }            
                        else
                        {
                            echo '<img src="logo/cross.png"/><span style="color: red;"> Invalid username or password</span>';
                        }
                     
                }	
            ?>          
        </div>


                <div id="containerRight">
                    <?php
                        $image=rand(1,4);
                        switch ($image){ 
                    	case 1:$image_file = "logo/blog-thumb1.png";
                    	break;
                    
                    	case 2:$image_file = "logo/blog-thumb2.png";
                    	break;
                    
                    	case 3:$image_file = "logo/blog-thumb3.png";
                    	break;
                        
                       	case 4:$image_file = "logo/blog-thumb4.png";
                    	break;
                        
                        }
                        echo "<img src=$image_file";
                    ?>
                </div>
            </div>
    </div> 
    
        <div id="footer"> 
            <div id="FooterLeft"> <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Having problem to access MIS?
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body">
      
                    <form action="" method="POST">
                    <table >
                        <tr>
                            <td>Username</td>
                            <td>:&nbsp;</td>
                            <td><input class="form-control" type="text" name="username" placeholder="User Name" required="" /></td>                       
                         </tr>
                         <tr>
                            <td>Password</td> 
                            <td>:&nbsp;</td> 
                            <td><input class="form-control" type="password" name="pass" placeholder="Password" required="" /></td>
                         </tr>  
                         <tr>
                            <td>Re-Password</td> 
                            <td>:&nbsp;</td> 
                            <td><input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required="" /></td>
                         </tr> 
                         <tr>   
                            <td>Email</td> 
                            <td>:&nbsp;</td> 
                            <td><input class="form-control" type="email" name="email" placeholder="Email" /></td>
                         </tr>   
                         <tr>   
                            <td>Image</td> 
                            <td>:&nbsp;</td> 
                            <td><input type="file" name="file" /></td>
                         </tr>                                            
                    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Signup</button>
        </form>
        
        <?php
    if(isset($_POST["submit"]))
    {   //User input
        $username=$_POST["username"];
        $pass=$_POST["pass"];
        $password_hash=md5($pass);
        $email=$_POST["email"];
        $cpassword=$_POST["confirmpassword"];
        
        if ($_POST["pass"] == $_POST["confirmpassword"]) {
           // success!
        }
        else {
           // failed :(
        }
        
        //Database (connect) include or require
        require "dbconnect.php";
        
        //User input in Database to show in HTML view
        $sql = mysql_query("SELECT * FROM login_info WHERE username='$username'");
        $numrows = mysql_num_rows($sql);
        if($numrows==0)
        {
            $sql2 = "INSERT INTO login_info (username,password,confirmpassword,email) VALUES ('$username','$password_hash','$cpassword','$email')";
            $result = mysql_query($sql2);
            
            if($result)
            {
                echo '<img src="img/15-Tick-icon.png" /> Account Successfully Created<br/>';
                echo 'Please wait! Refreshing database';
                header("refresh:0; url=index.php");
            }else{
                echo "Failure!";
            }
        }else{
            echo '<img src="img/cross.png" /><samp style="color: red;">That username already existy! Please try again.</samp>';
        }
        
    }	
?>
        
      </div>
    </div>
  </div>
</div>
</div>

            <div id="FooterRight">powered by L2N.team </div>
            <div style="left: -1000px; top: 434px; visibility: hidden;" id="dhtmltooltip">Click to view help</div>
        </div>
  <!-- Modal -->      
        
        
           <!-- jQuery (necessary for Nivo's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script> 
    </body>
</html>