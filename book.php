<?php
require 'config.php';
$sitter_id = $_GET['sitter_id'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SafePaws – Book Sitter</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Main navigation -->
<?php include 'header.php'; ?>

<main class="container" style="padding:28px 0 60px">
<h1>Book a Sitter</h1>
<form action="save_booking.php" method="post">
  <input type="hidden" name="sitter_id" value="<?= $sitter_id ?>">
  <label>Your Name</label>
  <input type="text" name="owner_name" required>
  <label>Your Email</label>
  <input type="email" name="owner_email" required>
  <label>Date</label>
  <input type="date" name="date" required>
  <label>Notes</label>
  <textarea name="notes"></textarea>
  <button class="findbtn" type="submit">Confirm Booking</button>
</form>
</main>
</body>
</html>
