<?php

function start_secure_session() {
    session_start();

    $session_timeout = 1800; // 30 minutes in seconds

    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)) {
        // Session expired, destroy it
        session_unset();
        session_destroy();

        // Redirect to login page
        header("Location: ../users/login.php");
        exit();
    } else {
        // Update last activity time
        $_SESSION['last_activity'] = time();
    }

    // Set a secure, HTTP-only cookie
    if (!isset($_COOKIE['my_session_cookie'])) {
        $session_id = bin2hex(random_bytes(32)); // Generate a secure session ID
        setcookie('my_session_cookie', $session_id, time() + $session_timeout, '/', '', true, true); // Set the cookie
        $_SESSION['user_id']; // Replace 1 with your actual user ID or user data
    }
}

?>
