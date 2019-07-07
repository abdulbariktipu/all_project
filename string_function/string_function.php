
<?php
    $string = "";
    if(isset($_POST['submit'])){

        $string = mysql_real_escape_string($_POST['string']);
        $string = preg_replace("/[^a-zA-Z0-9-@]/", " ", $string);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>String function</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background-color: #5bc0de;">

    <form method="POST" action="">
        <input type="text" name="string" id="string" placeholder="string" >
        <input type="submit" name="submit" onchange(submit) value="Submit">
    </form>
  <?php 
    echo "real input data: ".$string."<br/>";//real input data
    echo rtrim(ltrim($string))."<br/>";//remove space
    echo trim($string)."<br/>";//remove space
    //echo  "<pre>";
    echo ucfirst($string)."<br/>";//converts the first character of each word in a string to uppercase
    echo ucwords($string)."<br/>";//converts the first character of a string to lowercase
    //echo ucfirst($string)."<br/>";//converts the first character of each word in a string to uppercase
    echo preg_replace("/[^a-zA-Z0-9-@]/", " ", $string);//how to remove special characters from a string in php
  ?>
</body>
</html>

