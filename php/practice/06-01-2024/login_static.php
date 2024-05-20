<div class="container">
  <h2>Login Form</h2>
  <form class="form-control" action="" method="post">
    <label for="username">username</label>
    <input type="text" name="name" value="">
    <br>
    <label for="password">password</label>
    <input type="password" name="password" value="">
    <br>
    <input type="submit" name="" value="submit">
  </form>
</div>


<?php
 session_start();
 require 'config.php';

 if($conn->connect_error){
   die("connection error".$conn->connect_error);
   exit();
 }

 // $sql = "select name , password from accounts";



 if(isset($_SESSION['authenticated_user'])){
   header('Location: index.php');
   exit();
 }

 if(isset($_POST['name'])){
   $username = $_POST['name'];
   $password = $_POST['password'];

   if ($username == "rk" and $password == 1234){
     $_SESSION['authenticated_user'] = true;
     $_SESSION['name'] = $_POST['name'];

     header('Location: profile.php');
     exit();
     // echo "Welcome user ".$_SESSION['name'];
   }
   else{
     echo "wrong username or password";
   }
 }


 ?>
