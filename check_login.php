<?php
session_start();
require 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $user_type = $_POST['user_type'] ?? 'sitter'; // Default to sitter

    if($user_type === 'sitter'){
        $stmt = $pdo->prepare("SELECT * FROM sitters WHERE email=?");
    } else { // booker
        $stmt = $pdo->prepare("SELECT * FROM bookers WHERE email=?");
    }

    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])){
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_type'] = $user_type;

        // Redirect to dashboard or bookings page
        if($user_type === 'sitter'){
            header("Location: bookings.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        // Redirect back to login.php with error message
        $error = "Invalid email or password";
        header("Location: login.php?error=" . urlencode($error));
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
