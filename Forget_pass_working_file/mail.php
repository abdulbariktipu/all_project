
<html>
<head>
<title>Mail.PHP</title>
</head>
<body>
<!-- https://www.youtube.com/watch?v=abQWziaCXRY -->
<!-- https://www.youtube.com/watch?v=UVnXijhwixA -->
<?php
$to = "";
mysql_connect("localhost", "root", "") or die();
mysql_select_db("library") or die();
$to = $_REQUEST["email"];
//echo $email; die();
   $query = mysql_query("select * from users where email='$to'");
   $row = mysql_fetch_array($query);
//print_r($row);die();
//echo $row["email"];
//echo $row["password"];

   //$to = 'tipu@l2nsoft.com';
   $subject = 'Forget password';
   $message = "Your mail ".$row["email"]." This is your pass:".$row["password"];
   $headers = "From: noreplaymail69@gmail.com\r\n";
   if (mail($to, $subject, $message, $headers)) {
         echo "Message Sent! <a href='index.html'>Click here to send another email</a>";
         } else {
               echo "ERROR";
               }

?>





<!-- <?php
// error_reporting(0);
// $email = "";
// mysql_connect("localhost", "root", "") or die();
// mysql_select_db("library") or die();
// $email = $_REQUEST["email"];
// //echo $email; die();
// $query = mysql_query("select * from users where email='$email'");
// $row = mysql_fetch_array($query);
// //print_r($row);die();
//echo $row["email"];

// require 'PHPMailer-master/PHPMailerAutoload.php';
// $mail = new PHPMailer();

//    //Enable SMTP debugging.
//    $mail ->SMTPDebug = 1;
//    //sET phpmAILER TO USE smtp.
//    $mail ->isSMTP();
//    //Set SMTP host name
//    $mail ->Host = "smtp.gmail.com";
//    //Set this to true if SMTP host requires authentication to send email
//    $mail ->SMTPAuth = TRUE;
//    //Provide username and password
//    $mail ->Username = "noreplaymail69@gmail.com";
//    $mail ->Password = "noreplaymail786";
//    //if SMTP requires TLS encryption then set it
//    $mail ->SMTPSecure = "false";
//    $mail ->Port = 587; // or 587
   
//    $mail ->From = "noreplaymail69@gmail.com";
//    $mail ->FromName = "noreplay";

//    $mail->addAddress($row["email"]);

//    $mail ->isHTML(true);

//    $mail->Subject = "Test mail";
//    $mail->Body = "<i>This is your password: </i>".$row["pass"];
//    $mail->AltBody = "This is the palain thest version of the email";
//    if(!$mail->send())
//    {
//        echo "Mail Not Sent" . $mail->ErrorInfo;
//    }
//    else
//    {
//        echo "Mail Sent";
//        header("refresh:2; url=index.html");
  // }
?> -->
</body>
</html>
