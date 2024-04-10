<?php
$mysqli = new mysqli('localhost', 'waph_team08', 'Pa$$w0rd', 'waph_team');
if ($mysqli->connect_errno) {
    printf("DATABASE CONNECTION FAILED: %s\n", $mysqli->connect_error);
    return FALSE;
}

function addnewuser($name,$username, $password, $email) {
    global $mysqli;
    $prepared_sql = "INSERT INTO users (name,username, password, email) VALUES (?,?, ?, ?)";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ssss",$name,$username, $password, $email);
    $stmt->execute();
    return $stmt->affected_rows == 1;
}

function checklogin_mysql($username, $password) {
    global $mysqli;
    $prepared_sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            return true; 
        } else {
            return false; 
        }
    } else {
        return false; 
    }
}

    function changepassword($username, $password) {
    global $mysqli;
    $prepared_sql = "UPDATE users SET password = ? WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ss", $hashed_password, $username);
    $stmt->execute();
    return $stmt->affected_rows == 1;
}


function getUserInfo($username) {
    global $mysqli;
    $prepared_sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function updateProfile($username, $name, $additionalEmail, $phone) {
    global $mysqli;
    $prepared_sql = "UPDATE users SET name = ?, additional_email = ?, phone = ? WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ssss", $name, $additionalEmail, $phone, $username);
    $stmt->execute();
    return $stmt->affected_rows == 1;
}

function createPost($title, $content, $posttime, $owner) {
    global $mysqli;
    $prepared_sql = "INSERT INTO posts (title, content, posttime, owner) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ssss", $title, $content, $posttime, $owner);
    $stmt->execute();
    return $stmt->affected_rows == 1;
}

function getPostsByUsername($username) {
    global $mysqli;
    $prepared_sql = "SELECT * FROM posts WHERE owner = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
