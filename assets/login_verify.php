<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = md5($password);

    $stmt = $conn->prepare("SELECT * FROM admin_account WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $hashedPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
       header("Location: ../dashboard.php");
    } else {
        echo 'Login Failed.';
        echo 'Username' . $username;
        echo 'Password' . $password;
        
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>
