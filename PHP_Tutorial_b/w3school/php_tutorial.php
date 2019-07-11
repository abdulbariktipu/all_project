<!DOCTYPE html>
<html>
<head>
	<title>PHP Tutorial</title>
</head>
<body>





<?php
	$arr = array("Tipu","Sultan","Barik","Tania");

	$count = count($arr);
	echo $count."<br>";
	foreach($arr as $value){
		echo $value."<br>";
	}

	for($i=0;$i<$count;$i++){
		echo $i."<br>";
	}

	print_r($arr)."<br>";
	var_dump($arr)."<br>";

//===================================================================================

function myFunction(){
	echo "Test"."<br>";
}
myFunction();

//===================================================================================


function FunctionArguments($name,$age,$address,$num){
	echo "Function Arguments- Name:".$name.' Age: '.$age.' Address: '.$address."<br>";
	$sum = $age+$num;
	return $sum;
}
FunctionArguments('Tipu',33,"Village:Mirput, Post: Shotihat, Thana: Manda.",44);

//===================================================================================

//return method call
function FunctionArguments2($name,$age,$address,$num){
	echo "Function Arguments- Name:".$name.' Age: '.$age.' Address: '.$address."<br>";
	$sum = $age+$num;
	return $sum;
}
echo FunctionArguments2('Tipu',33,"Village:Mirput, Post: Shotihat, Thana: Manda.",44);


//===================================================================================
function Returningvalues($x,$y){
	$total = $x+$y;
	return $total;
}
echo Returningvalues(2,4).'<br>';
echo Returningvalues(5,6).'<br>';
echo Returningvalues(7,8).'<br>';

//===================================================================================

function Returningvalues2($x,$y){
	$out = $x / $y;
	$array = array($x,$y,$out);
	return $array;
	
}
list($x, $y, $out) = Returningvalues2(10, 2);
echo $x.'<br>';
echo $y.'<br>';
echo $out.'<br>';

//===================================================================================

function VariableScope(){
	$greet = 'Local';
	echo $greet;
	echo '<p>$greet Inside of function is: ' . $greet . '</p>';
}
VariableScope();
echo '<p>$greet outside of function is: ' . $greet . '</p>';

//===================================================================================

$greet = "Hello World!";

// Defining function
function test(){
    echo $greet;
}
test();  // Generate undefined variable error 
echo $greet; // Outputs: Hello World!

//====================Global Variable=======================

?>
	<h1>The global Keyword in function</h1>
<?

$greet = "Hello World!";
 
// Defining function
function test(){
    global $greet;
    echo $greet;
}
 
test(); // Outpus: Hello World!
echo $greet; // Outpus: Hello World!
 
// Assign a new value to variable
$greet = "Goodbye";
 
test(); // Outputs: Goodbye
echo $greet; // Outputs: Goodbye



//====================Creating Recursive Functions=======================
?>
	<h1>Creating Recursive Functions</h1>
<?
// Defining recursive function
function printValues($arr) {
    global $count;
    global $items;
    
    // Check input is an array
    if(!is_array($arr)){
        die("ERROR: Input is not an array");
    }
    
    /*
    Loop through array, if value is itself an array recursively call the
    function else add the value found to the output items array,
    and increment counter by 1 for each value found
    */
    foreach($arr as $a){
        if(is_array($a)){
            printValues($a);
        } else{
            $items[] = $a;
            $count++;
        }
    }
    
    // Return total count and values found in array
    return array('total' => $count, 'values' => $items);
}
 
// Define nested array
$species = array(
    "birds" => array(
        "Eagle",
        "Parrot",
        "Swan"
    ),
    "mammals" => array(
        "Human",
        "cat" => array(
            "Lion",
            "Tiger",
            "Jaguar"
        ),
        "Elephant",
        "Monkey"
    ),
    "reptiles" => array(
        "snake" => array(
            "Cobra" => array(
                "King Cobra",
                "Egyptian cobra"
            ),
            "Viper",
            "Anaconda"
        ),
        "Crocodile",
        "Dinosaur" => array(
            "T-rex",
            "Alamosaurus"
        )
    )
);
 
// Count and print values in nested array
$result = printValues($species);
echo $result['total'] . ' value(s) found: ';
echo implode(', ', $result['values']);


?>


<!-- ====================Factorial Program using loop in PHP======================= -->




<html>  
<head>  
<title>Factorial Program using loop in PHP</title>  
</head>  
<body>  
<form method="post">  
    Enter the Number:<br>  
    <input type="number" name="number" id="number">  
    <input type="submit" name="submit" value="Submit" />  
</form>  
<?php   
   
    if (isset($_POST['submit'])) {
    	$fact = 1;
      	$number = $_POST['number']; 
      	for ($i=1; $i <=$number; $i++) { 
      		$fact *= $i; //or $fact = $fact * $i;
      		echo $fact.'<br>';
      	}
      	echo $fact;
      }  

?>

</body>
</html>