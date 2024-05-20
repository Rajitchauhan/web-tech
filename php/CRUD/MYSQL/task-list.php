<?php
  require 'config.php';
  // $conn = new mysqli($server , $username , $password , $DB);

  if($conn->connect_error){
    die("connection failed :: " . $conn->connect_error);
    exit();
  }

  $sql = "select * from tasks ";

  $result = $conn->query($sql);

  if($result->num_rows > 0){
    echo "<ul>";
    while($row = $result->fetch_assoc()){
      echo "<li>".$row['title']."</li>";
    }
    echo "</ul>";
  }
  else{
    echo " Data  is not present";
  }

 ?>
