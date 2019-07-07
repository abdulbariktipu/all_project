<?php
function add($x,$y)
{
    $sum = $x+$y;
    echo "Sum = $sum<br><br>";
}

function sub($x,$y)
{
    $sub = $x-$y;
    echo "Sub = $sub<br><br>";
}

if(isset($_POST['add']))
{
    add($_POST['first'],$_POST['second']);
}

if(isset($_POST['sub']))
{
    sub($_POST['first'],$_POST['second']);
}

?>

<form method="post">
    Enter First Num: <input type="number" name="first"/><br><br>
    Enter Second Num: <input type="number" name="second"/><br><br>
    <input type="submit" name="add" value="Addition"/>
    <input type="submit" name="sub" value="Sub"/>
</form>