<?php
$server = 'localhost';
$username = 'root';
$password = '';
$DB = 'test';

$conn = new mysqli($server , $username , $password , $DB);
//
// if($conn->connect_error){
//   die("connection failed :: " . $conn->connect_error);
// }
// else{
//   echo "<h1>Connection successful</h1>";
// }

 ?>
