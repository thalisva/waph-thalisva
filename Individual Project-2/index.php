<?php
session_set_cookie_params(15*60, "/", "waph-team08.minifacebook.com", TRUE, TRUE);
session_start();
require "database.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {
    
    if (checklogin_mysql($_POST["username"], $_POST["password"])) {
        $_SESSION["authenticated"] = TRUE;
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["browser"] = $_SERVER['HTTP_USER_AGENT'];
    } else {
        
        session_destroy();
        echo "<script>alert('Invalid username/password');window.location='form.php';</script>";
        die();
    }
}


if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true){
    session_destroy();
    echo "<script>alert('You have not logged in. Please log in first');</script>";
    header("Refresh:0; url=form.php");
    die();
}
  

if ($_SESSION["browser"] != $_SERVER["HTTP_USER_AGENT"]){
    session_destroy();
    echo "<script>alert('Session hijacking is detected!');</script>";
    header("Refresh:0; url=form.php");
    die();
}   


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["title"]) && isset($_POST["content"])) {
    
    $title = $_POST["title"];
    $content = $_POST["content"];
    $posttime = date("Y-m-d H:i:s");
    
    
    $username = $_SESSION["username"];

    
    if (createPost($title, $content, $posttime, $username)) {
        echo "<script>alert('Post created successfully');</script>";
    } else {
        echo "<script>alert('Failed to create post');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="index_styles.css">
</head>
<body>
    <div class="container">
        
        <h1>Home Page</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" class="text_field" required><br>

            <label for="content">Content:</label><br>
            <textarea id="content" name="content" class="text_field" rows="4" required></textarea><br><br>

            <button type="submit" class="button">Create Post</button>
        </form>

        <a href="view_posts.php" class="view-posts-link">View your posts</a> <!-- Updated view posts link -->
        <button onclick="window.location.href='index.php'" class="another-post-button"> + </button> <!-- Updated "+" button -->

        
       
        <p> <a href="profile.php" class="link">Edit your profile</a> </p>
        <p> <a href="changepasswordform.php" class="link">Change password</a> </p>
        <p> <a href="logout.php" class="link">Logout</a> </p>
    </div>
</body>
</html>
