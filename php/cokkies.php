<?php
// Set a cookie with the user's name that expires in 1 hour
setcookie("user", "John Doe", time() + 3600, "/");

echo "Cookie is set.";
?>

<?php
// Check if the "user" cookie is set
if (isset($_COOKIE["user"])) {
    // Retrieve the value of the "user" cookie
    $username = $_COOKIE["user"];
    echo "Welcome back, $username!";
} else {
    echo "Cookie not set.";
}
?>

<?php
// Delete the "user" cookie by setting its expiration time to the past
setcookie("user", "", time() - 3600, "/");
echo "Cookie is deleted.";
?>
