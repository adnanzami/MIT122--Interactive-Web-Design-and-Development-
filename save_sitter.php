<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $services = implode(',', $_POST['services']); // Multiple select
    $bio = $_POST['bio'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO sitters (name,email,phone,city,services,bio,password) VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([$name,$email,$phone,$city,$services,$bio,$password]);

    header("Location: login.html");
}
?>
