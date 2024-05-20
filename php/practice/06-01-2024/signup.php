<?php
session_start();
require 'config.php';

// Check if the signup form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Store the password securely (not recommended)
    // You might want to use additional security measures, such as salting, if you choose this approach
    $hashedPassword = md5($password);

    // Insert user information into the database
    $sql = "INSERT INTO accounts (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Registration successful
        $_SESSION['message'] = "Registration successful. You can now login.";
        header('Location: login.php');
        exit();
    } else {
        $error_message = "Error in registration: " . $stmt->error;
    }

    $stmt->close();
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
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
    <h2>Sign Up</h2>

    <?php if (isset($error_message)): ?>
        <div class="message_error">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <label for="name">Name</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" name="submit" value="Sign Up">
    </form>
</div>

</body>
</html>
