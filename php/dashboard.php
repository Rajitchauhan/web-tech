<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['authenticated_user'])) {
    header('Location: sessionHome.php');
    exit();
}

$username = $_SESSION['authenticated_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard, <?php echo $username; ?>!</h1>
    <p>This is a protected page.</p>
    <a href="logoutSession.php">Logout</a>
</body>
</html>
