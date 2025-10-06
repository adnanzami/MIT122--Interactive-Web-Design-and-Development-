<?php
session_start();
require 'config.php'; // contains $pdo = new PDO(...)

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user_type = $_POST['user_type'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if($user_type && $email && $password){
        // Determine table
        $table = $user_type === 'sitter' ? 'sitters' : 'bookers';

        $stmt = $pdo->prepare("SELECT * FROM $table WHERE email = :email LIMIT 1");
        $stmt->execute(['email'=>$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])){
            // Set session
            $_SESSION['user_type'] = $user_type;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            // Redirect based on type
            if($user_type === 'sitter'){
                header("Location: bookings.php");
            } else {
                header("Location: index.php"); // Pet owners go to homepage or dashboard
            }
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Please fill all fields.";
    }
}

if(isset($error)) {
    echo "<p style='color:red;'>$error</p>";
}
