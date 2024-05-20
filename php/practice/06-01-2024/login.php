<?php
session_start();
require 'config.php';

// Check if the login form is submitted
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $enteredPassword = $_POST['password'];

    // Retrieve the stored password from the database based on the username
    $sql = "SELECT name, password FROM accounts WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($name, $storedPassword);

    if ($stmt->fetch() && $enteredPassword == $storedPassword) {
        // Passwords match, login successful
        $_SESSION['authenticated_user'] = true;
        $_SESSION['name'] = $name;
        header('Location: profile.php');
        exit();
    } else {
        // Passwords do not match, login failed
        $error_message = "Invalid username or password";
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
        label {
            display: block;
        }

        .container {
            width: 50%;
            margin: auto;
            margin-top: 100px;
        }

        .message_error {
            background-color: #f2dede;
            color: #a94442;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ebccd1;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <?php if (isset($error_message)): ?>
        <div class="message_error">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <label for="name">Name</label>
        <input type="text" name="name" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
</div>

</body>
</html>
