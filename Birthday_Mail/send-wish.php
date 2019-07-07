<?php
if(isset($_POST['save'])){
$wish= $_POST['wish'];
$checkbox1 = $_POST['check'];
$chk=""; 
foreach($checkbox1 as $chk1) 
{ 
$chk.= $chk1.", "; 
} 
$checkbox2 = $_POST['email'];
$chk1=""; 
foreach($checkbox2 as $chk2) 
{ 
$chk1.= $chk2.", "; 
} 
$to = $chk;
$subject = "Happy birthday";
$txt = "Happy birthday! Dear";
$headers = "From: noreplaymail69@gmail.com" . "\r\n" .//your mail id
"CC: tstipu69@gmail.com";//if any (optional)
mail($to,$subject,$txt,$headers);
echo 'Birthday Wish Send Successfully.'; }
?>