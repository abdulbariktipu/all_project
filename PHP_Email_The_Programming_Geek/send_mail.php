<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loading Pages</title>
<script src="jquery-1.8.3.js"></script><!--loading_spinner js-->


</head>
<body>


<?php
    $mailto = $_POST['mail_to'];
    $mailSub = $_POST['mail_sub'];
    $mailMsg = $_POST['mail_msg'];
    // Message
      $message = '
      <body>
        <p>Here are the birthdays upcoming in August!</p>
        <table>
          <tr>
            <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
          </tr>
          <tr>
            <td>Johny</td><td>10th</td><td>August</td><td>1970</td>
          </tr>
          <tr>
            <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
          </tr>
        </table>
      ';
   $hedar = " <h1>Test Mail</h1>";

   require 'PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 587; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "14310026@uits.edu.bd";
   $mail ->Password = "uitstipu";
   $mail ->SetFrom("14310026@uits.edu.bd", "Dont replay");
   $mail ->Subject = $mailSub;
   $mail ->Body = $hedar.$mailMsg.$message;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
       header("refresh:2; url=index.html");
   }
?>
</body>
</html>
