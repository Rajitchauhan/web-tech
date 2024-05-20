<?php
if (isset($_POST['submit'])) {
  
    $password = $_POST['password'];


    echo $password;

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    echo " <br>";
    echo  $hashedPassword;
}

 ?>

<form method="post">
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" name="submit" value="Sign Up">
</form>
