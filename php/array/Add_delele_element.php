<?php

echo "<h2> Adding and delete elements in array </h2>";

$arr = ['rajit' , 25 ];

echo $arr[0] , " - " , $arr[1];

$arr[] = 'Software Engineer';

echo $arr[2];

echo "<h2>associated array</h2>";

$arr1 =  array('sub' => 'DSA' , 'marks' => 100 );

echo  $arr1['sub'];
echo $arr1['marks'];

$arr1['author'] = 'Rajit';

echo $arr1['author'];

// echo '<h2>array_push() and array_pop()</h2>';
//
// $stack = $arr;
// array_push($stack , 'Google');


print_r($arr);
echo "<br>remove elements<br>";

unset($arr[1]);

print_r($arr);

echo "<br>";

print_r($arr1);

echo "<br> remove marks <br>";

unset($arr1['marks']);

print_r($arr1);





 ?>
