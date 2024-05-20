<?php

if($_SERVER["REQUEST_METHOD"] == 'POST'){
  if(isset($_POST['name'])){
    $username = htmlspecialchars ($_POST['name']);

    setcookie("user" , $username , time() + 3600, "/");

    // echo "<h1>$username</h1>";
    header('Location :  index.php');
    exit();

  }
}

 ?>
