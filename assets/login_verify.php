<?php
session_start();
include 'connection.php';

// Max attempts and time to wait in seconds (30 minutes = 1800 seconds)
$maxAttempts = 3;
$waitTime = 1800;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = md5($password);
    $ip_address = $_SERVER['REMOTE_ADDR']; // Capture user's IP address
    $attemptTime = date("Y-m-d H:i:s"); // Get current time

    // Check if there are existing attempts
    if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= $maxAttempts) {
        $timeSinceFirstAttempt = time() - $_SESSION['first_attempt_time'];

        // Check if 30 minutes have passed
        if ($timeSinceFirstAttempt < $waitTime) {
            $timeLeft = $waitTime - $timeSinceFirstAttempt;
            echo "Too many attempts. Please try again after " . ceil($timeLeft / 60) . " minutes.";
            exit();
        } else {
            // Reset attempts after 30 minutes
            $_SESSION['login_attempts'] = 0;
        }
    }

    // Prepare the statement to check if the username and password are correct
    $stmt = $conn->prepare("SELECT * FROM admin_account WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $hashedPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Successful login, reset session and record successful login event
        $_SESSION['login_attempts'] = 0;

        // Record successful login event
        $event = "Login Success";
        $log_stmt = $conn->prepare("INSERT INTO login_attempts (username, attempt_time, event, ip_address) VALUES (?, ?, ?, ?)");
        $log_stmt->bind_param("ssss", $username, $attemptTime, $event, $ip_address);
        $log_stmt->execute();
        $log_stmt->close();

        // Redirect to dashboard
        header("Location: ../dashboard.php");
    } else {
        // Login failed, increment attempt count and record the failed login attempt event
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 0;
            $_SESSION['first_attempt_time'] = time();
        }

        $_SESSION['login_attempts']++;

        // Record failed login attempt event
        $event = "Login Failed";
        $log_stmt = $conn->prepare("INSERT INTO login_attempts (username, attempt_time, event, ip_address) VALUES (?, ?, ?, ?)");
        $log_stmt->bind_param("ssss", $username, $attemptTime, $event, $ip_address);
        $log_stmt->execute();
        $log_stmt->close();

        if ($_SESSION['login_attempts'] >= $maxAttempts) {
            echo "Too many attempts. Please try again after 30 minutes.";
        } else {
            echo 'Login Failed. Attempts remaining: ' . ($maxAttempts - $_SESSION['login_attempts']);
        }
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>
