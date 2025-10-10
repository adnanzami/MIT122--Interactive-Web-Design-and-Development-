<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $user_type = $_POST['user_type'] ?? 'sitter'; // from login form select

    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
        header("Location: login.php?error=" . urlencode($error));
        exit;
    }

    // Determine table and query based on user type
    if ($user_type === 'booker') {
        $stmt = $pdo->prepare("SELECT * FROM bookers WHERE email = ?");
    } else {
        $stmt = $pdo->prepare("SELECT * FROM sitters WHERE email = ?");
    }

    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // --- Login successful ---
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_type'] = $user_type;

        // --- Additional specific variables ---
        if ($user_type === 'sitter') {
            $_SESSION['sitter_id'] = $user['id'];
            $_SESSION['sitter_name'] = $user['name'];
            $_SESSION['sitter_email'] = $user['email'];
            $_SESSION['sitter_city'] = $user['city'] ?? '';
            $_SESSION['sitter_img'] = $user['img'] ?? 'images/default.png';
            header("Location: dashboard.php");
        } else {
            $_SESSION['booker_id'] = $user['id'];
            $_SESSION['booker_name'] = $user['name'];
            $_SESSION['booker_email'] = $user['email'];
            header("Location: index.php");
        }
        exit;

    } else {
        // --- Invalid credentials ---
        $error = "Invalid email or password.";
        header("Location: login.php?error=" . urlencode($error));
        exit;
    }

} else {
    header("Location: login.php");
    exit;
}
?>
