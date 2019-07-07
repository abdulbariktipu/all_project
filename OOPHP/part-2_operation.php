<?php

	class Calculation{
		function add($a, $b){
			echo "Summation = ".($a + $b)."<br>";
			echo "Subtraction = ".($a - $b)."<br>";
			echo "Multiplication = ".($a * $b)."<br>";
			echo "Division = ".($a / $b)."<br>";
			echo "Mod = ".($a % $b)."<br>";
		}
	}
?>