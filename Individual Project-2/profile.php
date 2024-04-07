<?php
session_start();

if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    header("Location: form.php");
    exit;
}

require "database.php";
$username = $_SESSION['username'];
$userInfo = getUserInfo($username);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = isset($_POST["name"]) ? $_POST["name"] : $userInfo['name'];
    $additionalEmail = isset($_POST["additional_email"]) ? $_POST["additional_email"] : $userInfo['additional_email'];
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : $userInfo['phone'];

    
    if (updateProfile($username, $name, $additionalEmail, $phone)) {
        echo "<script>alert('Profile updated successfully');</script>";
        
        $userInfo = getUserInfo($username); 
    } else {
        echo "<script>alert('Failed to update profile');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit your profile</title>
    <style>
        /* Your CSS styles here */
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="container">
    <h1>Edit your profile</h1>
    <h2>Welcome back <?php echo htmlentities($_SESSION['username']); ?></h2>
    <div id="digit-clock"></div>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo isset($userInfo['name']) ? $userInfo['name'] : ''; ?>"><br>

        <label for="additional_email">Add another Email:</label><br>
        <input type="email" id="additional_email" name="additional_email" value="<?php echo isset($userInfo['additional_email']) ? $userInfo['additional_email'] : ''; ?>"><br>

        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo isset($userInfo['phone']) ? $userInfo['phone'] : ''; ?>"><br><br>

        <button type="submit">Update your profile</button>
    </form>

    
    <a href="changepasswordform.php">Change password</a> | <a href="form.php">Login</a> |  <a href="logout.php">Logout</a>
</div>
</body>
</html>
