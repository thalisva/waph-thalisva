<?php

session_set_cookie_params([
    'lifetime' => 15*60,
    'path' => '/',
    'domain' => 'waph-team08.minifacebook.com',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();


function authenticateUser() {
    $_SESSION['authenticated'] = true;
}


function logoutUser() {
    session_unset();
    session_destroy();
}


function checkSessionHijacking() {
    if (!isset($_SESSION['browser'])) {
        $_SESSION['browser'] = $_SERVER['HTTP_USER_AGENT'];
    } elseif ($_SESSION['browser'] !== $_SERVER['HTTP_USER_AGENT']) {
        logoutUser();
        echo "<script>alert('Session hijacking detected!');</script>";
        header("Location: form.php");
        exit;
    }
}


function isUserAuthenticated() {
    return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
}


function redirectToLoginPageIfNotAuthenticated() {
    if (!isUserAuthenticated()) {
        logoutUser();
        echo "<script>alert('You are not logged in. Please log in first.');</script>";
        header("Location: form.php");
        exit;
    }
}


function initializeSession() {
    redirectToLoginPageIfNotAuthenticated();
    checkSessionHijacking();

    // Generate CSRF token
    if (!isset($_SESSION['nocsrftoken'])) {
        $_SESSION['nocsrftoken'] = bin2hex(random_bytes(32));
    }
}
?>
