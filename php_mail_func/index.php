<?php
    require_once('PHPMailer/PHPMailerAutoload.php');
    
    $mail = new PHPMailer();
    $mail -> isSMTP();
    $mail -> SMTPAuth = true;
    $mail -> SMTPSecure = 'ssl';
    $mail -> Host = 'smtp.gmail.com';
    $mail -> Port = '465';
    $mail ->isHTML();
    $mail ->Username = 'tstipu69@gmail.com';
    $mail ->Password = 'uitstipu786';
    $mail ->SetFrom('no-reply@howcode.org');
    $mail ->Subject = 'Hello world';
    $mail ->Body = 'A text email!';
    $mail ->AddAddress('tstipu69@gmail.com');
    
    $mail ->Send();
?>