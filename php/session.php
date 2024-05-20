<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['name']) && isset($_POST['password'])) {
        $username = $_POST['name'];
        $password = $_POST['password'];

        // Replace '1234' with the actual password or use appropriate password hashing
        if ($username == 'rk' && $password === '1234') {
            $_SESSION['user_authenticated'] = true;
            $_SESSION['name'] = $_POST['name'];
            header('Location: index.php');
            exit(); // Make sure to exit after a header redirect
        } else {
            echo "Wrong username or password";
        }
    } else {
        echo "Invalid form data";
    }
}
?>
