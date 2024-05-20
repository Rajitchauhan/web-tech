<?php

$greet = function($name){
  echo "hello : $name";
};

$greet("Shiva");


function performOperation($num, $operation) {
    return $operation($num);
}

// Anonymous function for squaring a number
$square = function ($x) {
    return $x * $x;
};

// Anonymous function for doubling a number
$double = function ($x) {
    return $x * 2;
};

// Use anonymous functions as callbacks
$result1 = performOperation(5, $square);  // Computes 5 * 5 = 25
$result2 = performOperation(3, $double);  // Computes 3 * 2 = 6

echo "Result 1: $result1, Result 2: $result2";

 ?>
