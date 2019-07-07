
<?php
    $string = "";
    if(isset($_POST['submit'])){

        $string = mysql_real_escape_string($_POST['string']);
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
        <input type="text" name="string" id="mySelect" onchange="myFunction()" placeholder="string" >
        <input type="submit" name="submit" value="Submit">
    </form>
    
  <?php 
    echo "real input data:";
    echo $string."<br/>";//real input data
    echo "remove space:"."<br/>";
    echo rtrim(ltrim($string))."<br/>";//remove space
    echo  "<pre>";
    
    echo "converts the first character of each word in a string to uppercase each word:";
    $eachWord = strtolower($string);
    echo ucwords($eachWord)."<br/>";//converts the first character of each word in a string to uppercase
    echo "converts the first character of a string to lowercase:";
    //$ucwords = strtolower($string);
    echo strtolower($string)."<br/>";//converts the first character of a string to lowercase
    
    echo "converts the first character of each word in a string to uppercase:";
    echo strtoupper($string)."<br/>";//converts the first character of each word in a string to uppercase
    echo "how to remove special characters from a string in php:";
    echo 'preg_replace:'. preg_replace("/[^a-zA-Z0-9]/", " ", ucfirst($string));//how to remove special characters from a string in php
  ?>





<?php
$lowCas = strtolower($string);
echo "<strong>".ucwords($lowCas)."</strong><br>";
?>



<p>Select a new car from the list.</p>
<input type="text" name="string" id="mySelect" onchange="myFunction()">
<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>
</body>
</html>
