// hashedPasswordissueed
<?php
session_start();
require 'config.php';

echo $_SESSION['message'];
// Check if the login form is submitted
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];

    // Fetch user information from the database
    $sql = "SELECT * FROM accounts WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Set session variables upon successful authentication
            $_SESSION['authenticated_user'] = true;
            $_SESSION['name'] = $username;
            echo "<br>";
            echo $username;
            // Redirect to profile.php or any other page
            header('Location: profile.php');
            exit();
        } else {
            $error_message = "Invalid password";
        }
    } else {
        $error_message = "Invalid username";
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
