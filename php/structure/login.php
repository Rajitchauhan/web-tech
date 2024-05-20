<?php
session_start();

if (isset($_SESSION['authenticated_user']) && $_SESSION['authenticated_user']) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['name'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];

    if ($username === 'rk' && $password === '1234') {
        $_SESSION['authenticated_user'] = true; // Set the authenticated_user key
        $_SESSION['name'] = $username;
        header('Location: profile.php');
        exit();
    } else {
        echo "Username or password is invalid";
    }
}
?>

<form class="form-control" method="post">
    <label for="username">username</label>
    <input type="text" name="name" value="">
    <label for="password">password</label>
    <input type="password" name="password" value="">
    <input type="submit" name="" value="submit">
</form>
