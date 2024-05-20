<?php

session_start();


if(isset($_SESSION['authenticated_user'])){
  $_SESSION['authenticated_user'] = false;
  unset($_SESSION['name']);
  session_destroy();
  echo "you are logout";

  header('Location: index.php');

}
else {
  echo " Unauthenticated user :: ";
}

 ?>
