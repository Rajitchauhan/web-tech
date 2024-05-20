<?php

require 'config.php';

$sql = 'select * from projects order by title';

$result = $conn->query($sql);

// check if data is exists or not
if($result->num_rows > 0){
  echo "<ul>";
 while($row = $result->fetch_assoc()){
   echo "
      <li>".$row['title']."</li>";
 }
 echo "</ul>";
}
 else{
   echo " <h2> No Data found </h2>";

 }
 $conn->close();


 ?>
