<?php
session_start();

// Check if the user is already authenticated
if (isset($_SESSION['authenticated_user'])) {
    header('Location: dashboard.php');
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Replace with your authentication logic (e.g., database lookup)
    $username = 'rk';
    $password = '1234';

    if ($_POST['username'] === $username && $_POST['password'] === $password) {
        // Set session variable upon successful authentication
        $_SESSION['authenticated_user'] = $username;

        // Redirect to the dashboard
        header('Location: dashboard.php');
        exit();
    } else {
        $error_message = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
