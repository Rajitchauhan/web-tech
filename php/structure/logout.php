<?php
session_start();

if (isset($_SESSION['authenticated_user']) && $_SESSION['authenticated_user']) {
    unset($_SESSION['name']); // Corrected: use unset to remove a session variable
    session_destroy(); // Corrected: use session_destroy to end the session
    echo "You are logged out";
} else {
    echo "Unauthenticated user";
}
?>
