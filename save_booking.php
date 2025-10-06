<?php
require 'config.php';

$sitter_id = $_POST['sitter_id'];
$owner_name = $_POST['owner_name'];
$owner_email = $_POST['owner_email'];
$date = $_POST['date'];
$notes = $_POST['notes'];

$stmt = $pdo->prepare("INSERT INTO bookings (sitter_id, owner_name, owner_email, date, notes, status) VALUES (?, ?, ?, ?, ?, 'Pending')");
$stmt->execute([$sitter_id, $owner_name, $owner_email, $date, $notes]);

header("Location: bookings.php");
exit;
?>
