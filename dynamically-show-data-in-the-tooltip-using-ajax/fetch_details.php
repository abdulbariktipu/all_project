<?php

include "config.php";

$userid = $_POST['userid'];

$select_query = "SELECT * FROM users WHERE id=".$userid;

$result = mysqli_query($con,$select_query);

$html = '<div>';
while($row = mysqli_fetch_array($result))
{
    $userid = $row['id'];
    $name = $row['name'];
    $email = $row['email'];

    $html .= "<span class='head'>User ID : </span><span>".$userid."</span><br/>";
    $html .= "<span class='head'>Name : </span><span>".$name."</span><br/>";
    $html .= "<span class='head'>Email : </span><span>".$email."</span><br/>";
}
$html .= '</div>';

echo $html;