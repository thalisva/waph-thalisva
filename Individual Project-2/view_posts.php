<?php
session_start();
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    header("Location: form.php");
    exit;
}
require "database.php";
$username = $_SESSION['username'];
$posts = getPostsByUsername($username);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Posts</title>
    
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}
.container {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 80%;
    margin: 20px auto;
}

h1 {
    font-size: 28px;
    margin-bottom: 20px;
    text-align: center;
    color: #333333;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 10px;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #eeeeee;
}

a {

    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    background-color: #4caf50;
    color: #ffffff;
    border: 1px solid #4caf50;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

a:hover {
    background-color: #45a049;
    border-color: #45a049;
}
    </style>
</head>
<body>
<div class="container">
    <h1>View your posts</h1>

    <?php if ($posts): ?>
        <table>
            <thead>
                <tr>
                    <th>Post ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Post Time</th>
                    <th>Owner</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?php echo $post['postID']; ?></td>
                        <td><?php echo $post['title']; ?></td>
                        <td><?php echo $post['content']; ?></td>
                        <td><?php echo $post['posttime']; ?></td>
                        <td><?php echo $post['owner']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No posts found.</p>
    <?php endif; ?>

    <a href="index.php">Home page</a> 
</div>
</body>
</html>
