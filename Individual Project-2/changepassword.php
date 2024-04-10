
<?php
require "session_auth.php";
require "database.php";

$token = $_POST['nocsrftoken'];
if (!isset($token) or $token !== $_SESSION['nocsrftoken']) {
    echo "CSRF ATTACK is detected ";
    die();
}
$username = $_SESSION['username'];
$new_password = $_REQUEST["newpassword"];


if (strlen($new_password) < 8) {
    echo "Password must be at least 8 characters long.";
    exit;
}

if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/", $new_password)) {
    echo "New password does not meet the requirements.";
    exit;
}

if (isset($username) && isset($new_password)) {
    if (changepassword($username, $new_password)) {
        echo "Password changed successfully! 
            <p><a href='form.php'>login here </a></p>";
    } else {
        echo "Change Password Failed!";
    }
} else {
    echo "No username/password provided!";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Mini Facebook</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
</body>
</html>    